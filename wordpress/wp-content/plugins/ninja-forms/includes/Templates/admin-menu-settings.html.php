<div class="wrap">

    <h1><?php esc_html_e( 'Settings',  'ninja-forms' ); ?>
    <a href="https://ninjaforms.com/docs/plugin-settings/?utm_source=Ninja+Forms+Plugin&utm_medium=Settings&utm_campaign=Documentation&utm_content=Plugin+Settings+Documentation" target="_blank">
        <img src="<?php echo Ninja_Forms::$url . 'assets/img/help_icon.png'; ?>" alt="Documentation Link" width="25" height="25"></a>
    </h1>

    <h2 class="nav-tab-wrapper">
        <?php foreach( $tabs as $tab => $name ): ?>
            <?php if( $tab == $active_tab ): ?>
                <span class="nav-tab nav-tab-active"><?php echo $name ?></span>
            <?php else: ?>
                <a href="<?php echo esc_url( add_query_arg( 'tab', $tab ) ); ?>" target="" class="nav-tab "><?php echo $name ?></a>
            <?php endif; ?>
        <?php endforeach; ?>
    </h2>

    <div id="poststuff">
    <?php if( 'settings' != $active_tab ): ?>

        <?php do_meta_boxes('nf_settings_' . $active_tab, 'advanced', NULL ); ?>

    <?php else: ?>
        <form action="" method="POST">

            <?php if( $errors ): ?>
                <?php foreach( $errors as $error_id => $error ): ?>
                    <?php $message = $error . " <a href='#$error_id'>" . esc_html__( 'Fix it.', 'ninja-forms' ) . '</a>'; ?>
                    <?php Ninja_Forms::template( 'admin-notice.html.php', array( 'class' => 'error', 'message' => $message ) ); ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php foreach( $grouped_settings as $group => $settings ) : ?>
                <div id="ninja_forms_metabox_<?php echo $group; ?>_settings" class="postbox">
                <span class="item-controls">
                    <a class="item-edit metabox-item-edit" id="edit_id" title="<?php esc_html_e( 'Edit Menu Item', 'ninja-forms' ); ?>" href="#"><?php esc_html_e( 'Edit Menu Item', 'ninja-forms' ); ?></a>
                </span>
                    <h3 class="hndle"><span><?php echo $groups[ $group ][ 'label' ]; ?></span></h3>
                    <div class="inside" style="">
                        <table class="form-table">
                            <tbody>
                            <?php foreach( $settings as $key => $setting ) : ?>

                            <?php if( 'prompt' == $setting[ 'type' ] ) continue; ?>

                            <tr id="row_<?php echo $setting[ 'id' ]; ?>">
                                <th scope="row">
                                    <label for="<?php echo $setting[ 'id' ]; ?>"><?php echo $setting[ 'label' ]; ?></label>
                                </th>
                                <td>
                                    <?php
                                    switch ( $setting[ 'type' ] ) {
                                        case 'html':
                                            echo $setting[ 'html'];
                                            break;
                                        case 'desc' :
                                            echo $setting[ 'value' ];
                                            break;
                                        case 'textbox' :
                                            echo "<input type='text' class='code widefat' name='{$setting['id']}' id='{$setting['id']}' value='" . esc_attr($setting['value']) . "'>";
                                            break;
                                        case 'password' :
                                            echo "<input type='password' class='code widefat' name='{$setting['id']}' id='{$setting['id']}' value='" . esc_attr($setting['value']) . "'>";
                                            break;
                                        case 'checkbox' :
                                            $checked = ( $setting[ 'value' ] ) ? 'checked' : '';
                                            echo "<input type='hidden' name='{$setting['id']}' value='0'>";
                                            echo "<input type='checkbox' name='{$setting['id']}' value='1' id='{$setting['id']}' class='widefat' $checked>";
                                            break;
                                        case 'select' :
                                            echo "<select name='{$setting['id']}' id='{$setting['id']}'>";
                                            foreach( $setting['options'] as $option ) {
                                                $selected = ( $setting['value'] == $option['value'] ) ? 'selected="selected"' : '';
                                                echo "<option value='{$option['value']}' {$selected}>{$option['label']}</option>";
                                            }
                                            echo "</select>";
                                            break;
                                    }
                                    if( isset( $setting[ 'desc' ] ) ) {
                                        echo "<p class='description'>" . $setting[ 'desc' ] . "</p>";
                                    }
                                    ?>
                                    <?php
                                    if( isset( $setting[ 'errors' ] ) ){
                                        foreach( $setting[ 'errors' ] as $error_id => $error ){
                                            echo "<div id='$error_id' class='error'><p>$error</p></div>";
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>

            <input type="hidden" name="update_ninja_forms_settings_nonce" value="<?php echo wp_create_nonce( "ninja_forms_settings_nonce" ); ?>">
            <input type="hidden" name="update_ninja_forms_settings">
            <input type="submit" class="button button-primary" value="<?php echo $save_button_text; ?>">

        </form>
    <?php endif; ?>
    </div>

</div>
