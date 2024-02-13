<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via web
 * puoi copiare questo file in «wp-config.php» e riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni del database
 * * Chiavi segrete
 * * Prefisso della tabella
 * * ABSPATH
 *
 * * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Impostazioni database - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define( 'DB_NAME', 'progettosettimana14' );

/** Nome utente del database */
define( 'DB_USER', 'root' );

/** Password del database */
define( 'DB_PASSWORD', '' );

/** Hostname del database */
define( 'DB_HOST', 'localhost' );

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Il tipo di collazione del database. Da non modificare se non si ha idea di cosa sia. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chiavi univoche di autenticazione e di sicurezza.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 *
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tutti i cookie esistenti.
 * Ciò forzerà tutti gli utenti a effettuare nuovamente l'accesso.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '::[V0)sAPwv@{=$.n#qh%e0oQ^J[psv7d@/p2n[YXk~tk 605?X=2wdxKP?iZ8EJ' );
define( 'SECURE_AUTH_KEY',  '^dDUsMnM(+O 9^A)]at3_)6PC6Dxcs_yM63L;V#$46[X_:Il$p4fxEUxG%0z7RWi' );
define( 'LOGGED_IN_KEY',    'yEyshsF-z{cV,z]47c-5%!be7@$a1x[kfq+xOJ@p/;!$3rUuuTi>JDU9+%5$,.J<' );
define( 'NONCE_KEY',        'c=K2dI^#/]-=N2)j}mc*9N-LRX7xkoox0=ERLF!]cBp;KqDYts<R$Zi`=buQ=lA)' );
define( 'AUTH_SALT',        '{fX4>WNyBk:a^XZd./=&.,b}nQLp8#;FEF30=9=qM*n}B$kSGutwLPek*ld!xsT~' );
define( 'SECURE_AUTH_SALT', 'kY6Y0M0@uFo=p4~4*X}5r23gp`{:J 7ZYHY{)f,Uo46;IWUdT_?kf)m>=}sASubL' );
define( 'LOGGED_IN_SALT',   '6[V =^qy1`NAnUG{c_<>%8U0&vc@y(Y)e`*BR[ZZfTf #99~R%}/zxHO($Vx-zhW' );
define( 'NONCE_SALT',       'k)ig#IzN~Z8=I$X_J U`qd@waoUDAS$WQ=hpt0M&eVoFczexIUv?|)2{nw-Jz4JB' );

/**#@-*/

/**
 * Prefisso tabella del database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco. Solo numeri, lettere e trattini bassi!
 */
$table_prefix = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi durante lo sviluppo
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 *
 * Per informazioni sulle altre costanti che possono essere utilizzate per il debug,
 * leggi la documentazione
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Aggiungere qualsiasi valore personalizzato tra questa riga e la riga "Finito, interrompere le modifiche". */



/* Finito, interrompere le modifiche! Buona pubblicazione. */

/** Path assoluto alla directory di WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Imposta le variabili di WordPress ed include i file. */
require_once ABSPATH . 'wp-settings.php';
