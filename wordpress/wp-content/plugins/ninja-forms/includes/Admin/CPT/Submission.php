<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class NF_Admin_CPT_Submission
 */
class NF_Admin_CPT_Submission
{
    protected $cpt_slug = 'nf_sub';

    public $screen_options;
    /**
     * Constructor
     */
    public function __construct()
    {
        // Register our submission custom post type.
        add_action( 'init', array( $this, 'custom_post_type' ), 5 );

        add_action( 'admin_print_styles', array( $this, 'enqueue_scripts' ) );

        // Filter Post Row Actions
        add_filter( 'post_row_actions', array( $this, 'post_row_actions' ), 10, 2 );

        // Change our submission columns.
        add_filter( 'manage_nf_sub_posts_columns', array( $this, 'change_columns' ) );

        // Add the appropriate data for our custom columns.
        add_action( 'manage_posts_custom_column', array( $this, 'custom_columns' ), 10, 2 );

        // Save our metabox values
        add_action( 'save_post', array( $this, 'save_nf_sub' ), 10, 2 );

        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ), 10, 1 );
        add_action( 'add_meta_boxes', array( $this, 'remove_meta_boxes' ) );

        // Filter our submission capabilities
        add_filter( 'user_has_cap', array( $this, 'cap_filter' ), 10, 3 );

        // Filter our hidden columns by form ID.
        add_action( 'wp', array( $this, 'filter_hidden_columns' ) );

        // Save our hidden columns by form id. Ajax call handed in 'hide_columns' in this file
        add_action( 'wp_ajax_nf_hide_columns', array( $this, 'hide_columns' ) );
        
        add_action( 'trashed_post', array( $this, 'nf_trash_sub' ) );
    }

    /**
     * Custom Post Type
     */
    function custom_post_type() {

        $labels = array(
            'name'                => esc_html_x( 'Submissions', 'Post Type General Name', 'ninja-forms' ),
            'singular_name'       => esc_html_x( 'Submission', 'Post Type Singular Name', 'ninja-forms' ),
            'menu_name'           => esc_html__( 'Submissions', 'ninja-forms' ),
            'name_admin_bar'      => esc_html__( 'Submissions', 'ninja-forms' ),
            'parent_item_colon'   => esc_html__( 'Parent Item:', 'ninja-forms' ),
            'all_items'           => esc_html__( 'All Items', 'ninja-forms' ),
            'add_new_item'        => esc_html__( 'Add New Item', 'ninja-forms' ),
            'add_new'             => esc_html__( 'Add New', 'ninja-forms' ),
            'new_item'            => esc_html__( 'New Item', 'ninja-forms' ),
            'edit_item'           => esc_html__( 'Edit Item', 'ninja-forms' ),
            'update_item'         => esc_html__( 'Update Item', 'ninja-forms' ),
            'view_item'           => esc_html__( 'View Item', 'ninja-forms' ),
            'search_items'        => esc_html__( 'Search Item', 'ninja-forms' ),
            'not_found'           => $this->not_found_message(),
            'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'ninja-forms' ),
        );
        $args = array(
            'label'               => esc_html__( 'Submission', 'ninja-forms' ),
            'description'         => esc_html__( 'Form Submissions', 'ninja-forms' ),
            'labels'              => $labels,
            'supports'            => false,
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => false,
            'menu_position'       => 5,
            'show_in_admin_bar'   => false,
            'show_in_nav_menus'   => false,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
//            'rewrite'             => false,
            'capability_type' => 'nf_sub',
            'capabilities' => array(
                'publish_posts' => 'nf_sub',
                'edit_posts' => 'nf_sub',
                'edit_others_posts' => 'nf_sub',
                'delete_posts' => 'nf_sub',
                'delete_others_posts' => 'nf_sub',
                'read_private_posts' => 'nf_sub',
                'edit_post' => 'nf_sub',
                'delete_post' => 'nf_sub',
                'read_post' => 'nf_sub',
            ),
        );
        register_post_type( $this->cpt_slug, $args );
    }
    
    public function nf_trash_sub( $post_id )
    {   
        // If this isn't a submission...
        if ( 'nf_sub' != get_post_type( $post_id ) ) {
            // Exit early.
            return false;
        }
        global $pagenow;
        // If we were on the post.php page...
        if ( 'post.php' == $pagenow ) {
            // Redirect the user to the submissions page for the form that submission belonged to.
            wp_safe_redirect( admin_url( 'edit.php?post_status=all&post_type=nf_sub&form_id=' . get_post_meta( $post_id, '_form_id', true ) ) );
            exit;
        }
        
    }

    public function enqueue_scripts()
    {
        global $pagenow, $typenow;
        // Bail if we aren't on the edit.php page or we aren't editing our custom post type.
        if ( ( $pagenow != 'edit.php' && $pagenow != 'post.php' ) || $typenow != 'nf_sub' )
            return false;

        $form_id = isset ( $_REQUEST['form_id'] ) ? absint( $_REQUEST['form_id'] ) : '';

        wp_enqueue_script( 'subs-cpt',
            Ninja_Forms::$url . 'lib/Legacy/subs-cpt.min.js',
            array( 'jquery', 'jquery-ui-datepicker' ) );

        wp_localize_script( 'subs-cpt', 'nf_sub', array( 'form_id' => $form_id ) );
    }

    public function post_row_actions( $actions, $sub )
    {
        if ( $this->cpt_slug == get_post_type() ){
            unset( $actions[ 'view' ] );
            unset( $actions[ 'inline hide-if-no-js' ] );
            $export_url = add_query_arg( array( 'action' => 'export', 'post[]' => $sub->ID ) );
            $actions[ 'export' ] = sprintf( '<a href="%s">%s</a>', esc_url( $export_url ), esc_html__( 'Export', 'ninja-forms' ) );
        }

        return $actions;
    }

    public function change_columns( $columns )
    {
        if( ! isset( $_GET[ 'form_id' ] ) ) return $columns;

        $form_id = absint( $_GET[ 'form_id' ] );

        static $columns;

        if( $columns ) return $columns;

        $columns = array(
            'cb'    => '<input type="checkbox" />',
            'id' => esc_html__( '#', 'ninja-forms' ),
        );

        $form_fields = Ninja_Forms()->form( $form_id )->get_fields();

        foreach( $form_fields as $field ) {

            if( is_object( $field ) ) {
                $field = array(
                    'id' => $field->get_id(),
                    'settings' => $field->get_settings()
                );
            }

            $hidden_field_types = apply_filters( 'nf_sub_hidden_field_types', array() );
            if( in_array( $field[ 'settings' ][ 'type' ], array_values( $hidden_field_types ) ) ) continue;

            $id = $field[ 'id' ];
            
            if('repeater'!==$field[ 'settings' ][ 'type' ]){
                
                $label = isset( $field[ 'settings' ][ 'label' ] ) ? $field[ 'settings'][ 'label' ] : '';
                $columns[ $id ] = ( isset( $field[ 'settings' ][ 'admin_label' ] ) && $field[ 'settings' ][ 'admin_label' ] ) ? $field[ 'settings' ][ 'admin_label' ] : $label;
            }else{
                $fieldsetLabels= Ninja_Forms()->fieldsetRepeater->getFieldsetLabels($field['id'],$field['settings'], true);

                foreach ($fieldsetLabels as $fieldsetId => $fieldsetLabel) {
                    $columns[$fieldsetId] = $fieldsetLabel;
                }
            }
        }

        $columns['sub_date'] = esc_html__( 'Date', 'ninja-forms' );

        return $columns;
    }

    public function custom_columns( $column, $sub_id )
    {
        if( 'nf_sub' != get_post_type() ) {
            return;
        }
        
        static $fields;

        $sub = Ninja_Forms()->form()->get_sub( $sub_id );

        if( 'id' == $column ) {
            echo apply_filters( 'nf_sub_table_seq_num', $sub->get_seq_num(), $sub_id, $column );
        }

        $form_id = absint( $_GET[ 'form_id' ] );

        if(Ninja_Forms()->fieldsetRepeater->isRepeaterFieldByFieldReference($column)){
               
            if( ! isset( $fields[ $column ] ) ) {
                
                $parsedField = Ninja_Forms()->fieldsetRepeater
                        ->parseFieldsetFieldReference($column);
                
                $fields[$column] = Ninja_Forms()->form( $form_id )->get_field( $parsedField['fieldId'] );
            }
            
            $field = $fields[$column];
            
            $fieldType = Ninja_Forms()->fieldsetRepeater->getFieldtype($column, $field->get_settings());

            $arrayListTypes = array('listcheckbox');
            
            if(!in_array($fieldType,$arrayListTypes)){
                
            $value =implode('<br />',array_column(unserialize($sub->get_field_value($column)),'value'));
            }else{
                $optionsByRepetition = array_column(unserialize($sub->get_field_value($column)),'value');
                
                foreach($optionsByRepetition as &$repetition){
                    $repetition = implode(', ',$repetition);
                }
                $value = implode('<br />',$optionsByRepetition);
            }

            echo apply_filters( 'ninja_forms_custom_columns', $value, $field, $sub_id );
        }elseif( is_numeric( $column ) ){
            $value = $sub->get_field_value( $column );

            if( ! isset( $fields[ $column ] ) ) {
                $fields[$column] = Ninja_Forms()->form( $form_id )->get_field( $column );
            }
            $field = $fields[$column];
            echo apply_filters( 'ninja_forms_custom_columns', $value, $field, $sub_id );
        }

    }

    public function save_nf_sub( $nf_sub_id, $nf_sub )
    {
        global $pagenow;

        if ( ! isset ( $_POST['nf_edit_sub'] ) || $_POST['nf_edit_sub'] != 1 )
            return $nf_sub_id;

        // verify if this is an auto save routine.
        // If it is our form has not been submitted, so we dont want to do anything
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return $nf_sub_id;

        if ( $pagenow != 'post.php' )
            return $nf_sub_id;

        if ( $nf_sub->post_type != 'nf_sub' )
            return $nf_sub_id;

        /* Get the post type object. */
        $post_type = get_post_type_object( $nf_sub->post_type );

        /* Check if the current user has permission to edit the post. */
        if ( !current_user_can( $post_type->cap->edit_post, $nf_sub_id ) )
            return $nf_sub_id;

        $sub = Ninja_Forms()->form()->sub( $nf_sub_id )->get();

        if (isset($_POST['fields'])) {
            $post_fields = WPN_Helper::esc_html($_POST['fields']);
            foreach ( $post_fields as $field_id => $user_value ) {
                $user_value = apply_filters( 'nf_edit_sub_user_value', $user_value, $field_id, $nf_sub_id );
                $sub->update_field_value( $field_id, $user_value );
            }
        }

        $sub->save();
    }

    /**
     * Meta Boxes
     */
    public function add_meta_boxes( $post_type )
    {
        add_meta_box(
            'nf_sub_fields',
            esc_html__( 'User Submitted Values', 'ninja-forms' ),
            array( $this, 'fields_meta_box' ),
            'nf_sub',
            'normal',
            'default'
        );

        add_meta_box(
            'nf_sub_info',
            esc_html__( 'Submission Info', 'ninja-forms' ),
            array( $this, 'info_meta_box' ),
            'nf_sub',
            'side',
            'default'
        );
    }

    /**
     * Fields Meta Box
     *
     * @param $post
     */
    public function fields_meta_box( $post )
    {
        $form_id = get_post_meta( $post->ID, '_form_id', TRUE );

        $sub = Ninja_Forms()->form()->get_sub( $post->ID );

        $fields = Ninja_Forms()->form( $form_id )->get_fields();

        $hidden_field_types = apply_filters( 'nf_sub_hidden_field_types', array() );

        Ninja_Forms::template( 'admin-metabox-sub-fields.html.php', compact( 'fields', 'sub', 'hidden_field_types' ) );
    }

    public static function sort_fields( $a, $b )
    {
        if ( $a->get_setting( 'order' ) == $b->get_setting( 'order' ) ) {
            return 0;
        }
        return ( $a->get_setting( 'order' ) < $b->get_setting( 'order' ) ) ? -1 : 1;
    }

    /**
     * Info Meta Box
     *
     * @param $post
     */
    public function info_meta_box( $post )
    {
        $sub = Ninja_Forms()->form()->sub( $post->ID )->get();

        $seq_num = $sub->get_seq_num();

        $status = ucwords( $sub->get_status() );

        if ($sub->get_user()) {
            $user = apply_filters('nf_edit_sub_username', $sub->get_user()->data->user_nicename, $post->post_author);
        } else {
            $user = esc_html__( 'Anonymous', 'ninja-forms' );
        }

        $form_title = $sub->get_form_title();

        $sub_date = apply_filters( 'nf_edit_sub_date_submitted', $sub->get_sub_date( 'm/d/Y H:i' ), $post->ID );

        $mod_date = apply_filters( 'nf_edit_sub_date_modified', $sub->get_mod_date( 'm/d/Y H:i' ), $post->ID );

        Ninja_Forms::template( 'admin-metabox-sub-info.html.php', compact( 'post', 'seq_num', 'status', 'user', 'form_title', 'sub_date', 'mod_date' ) );
    }

    /**
     * Remove Meta Boxes
     */
    public function remove_meta_boxes()
    {
        // Remove the default Publish metabox
        remove_meta_box( 'submitdiv', 'nf_sub', 'side' );
    }

    public function cap_filter( $allcaps, $cap, $args )
    {
        $sub_cap = apply_filters('ninja_forms_admin_submissions_capabilities', 'manage_options');
        if (!empty($allcaps[$sub_cap])) {
            $allcaps['nf_sub'] = true;
        }
        return $allcaps;
    }

    /**
     * Filter our hidden columns so that they are handled on a per-form basis.
     *
     * @access public
     * @since 2.7
     * @return void
     */
    public function filter_hidden_columns() {
        global $pagenow;
        // Bail if we aren't on the edit.php page, we aren't editing our custom post type, or we don't have a form_id set.
        if ( $pagenow != 'edit.php' || ! isset ( $_REQUEST['post_type'] ) || $_REQUEST['post_type'] != 'nf_sub' || ! isset ( $_REQUEST['form_id'] ) )
            return false;
        // Grab our current user.
        $user = wp_get_current_user();
        // Grab our form id.
        $form_id = absint( $_REQUEST['form_id'] );
        // Get the columns that should be hidden for this form ID.
        $hidden_columns = get_user_option( 'manageedit-nf_subcolumnshidden-form-' . $form_id );

        // Checks to see if hidden columns are in the format expected for 2.9.x and converts formatting.
        if(  ! empty( $hidden_columns ) && strpos( $hidden_columns[ 0 ], 'form_'  ) !== false  ) {
            $hidden_columns = $this->convert_hidden_columns( $form_id, $hidden_columns );
        }

        if ( $hidden_columns === false ) {
            // If we don't have custom hidden columns set up for this form, then only show the first five columns.
            // Get our column headers
            $columns = get_column_headers( 'edit-nf_sub' );
            $hidden_columns = array();
            $x = 0;
            foreach ( $columns as $slug => $name ) {
                if ( $x > 5 ) {
                    if ( $slug != 'sub_date' )
                        $hidden_columns[] = $slug;
                }
                $x++;
            }
        }
        update_user_option( $user->ID, 'manageedit-nf_subcolumnshidden', $hidden_columns, true );
    }

    /**
     * Convert Hidden Columns
     * Looks for 2.9.x hidden columns formatting and converts it to the formatting 3.0 expects.
     * @param $form_id
     * @param $hidden_columns
     * @return mixed
     */
    private function convert_hidden_columns( $form_id, $hidden_columns )
    {
        $id = 'form_' . $form_id . '_field_';
        if( 'sub_date' !== $hidden_columns ) {
            $hidden_columns = str_replace( $id, '', $hidden_columns );
        }
        return $hidden_columns;
    }


    /**
     * Save our hidden columns per form id.
     *
     * @access public
     * @since 2.7
     * @return void
     */
    public function hide_columns() {
        // Grab our current user.
        $user = wp_get_current_user();
        // Grab our form id.
        $form_id = absint( $_REQUEST['form_id'] );
        $hidden = isset( $_POST['hidden'] ) ? explode( ',', esc_html( $_POST['hidden'] ) ) : array();
        $hidden = array_filter( $hidden );
        $hidden = array_map( function($field) {
            if( is_numeric($field) ) {
                $field = absint($field);
            }
            return $field;
        }, $hidden );
        update_user_option( $user->ID, 'manageedit-nf_subcolumnshidden-form-' . $form_id, $hidden, true );
        die();
    }

    /*
     * PRIVATE METHODS
     */

    private function not_found_message()
    {
        if ( ! isset ( $_REQUEST['form_id'] ) || empty( $_REQUEST['form_id'] ) ) {
            return esc_html__( 'Please select a form to view submissions', 'ninja-forms' );
        } else {
            return esc_html__( 'No Submissions Found', 'ninja-forms' );
        }
    }

}

