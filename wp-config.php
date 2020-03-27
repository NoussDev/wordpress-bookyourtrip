<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'cZEVld]Gjf!~k/?0CWKy.@H|1RZm6ltD0N7bW0@N6N $[IK@aoD]f>;|V9=g]ZxK' );
define( 'SECURE_AUTH_KEY',  'WBsj6%Pd9,t`>fJ=}RVby{Fj$L[r$K44wDf>%$>|;g=*)E`? 18M/}kd-Jf;hH:8' );
define( 'LOGGED_IN_KEY',    '$P_^;B|G}u!d,Hn{hB!-xUwFr<9oCY1GT+!]j^I1uw!%)>n#RL`p:CB!][ezAk|Z' );
define( 'NONCE_KEY',        'xOw>g(9hx? Uy[Ylc8:p3w)HNu4+0r#m)+G9*j}HT`7.1WxY^>qanzcnpaj*qv|U' );
define( 'AUTH_SALT',        '?&yhc*UuIn?L6Y@u<Ke|:0ACDZ.k0;q%!hE ) }EcTSdkBx&{_XNeUS{,s.WL2|5' );
define( 'SECURE_AUTH_SALT', ' d?Cu+><*9kBQAvqRn38P^6ch!Kn`*.Xd$^z0R80(BR81AtkO]tY[cV>af8R|83E' );
define( 'LOGGED_IN_SALT',   'oLaPt3q>w>_qR8**5 2D]u;59 p]1[cRlMe]%gWPc-ucl?pe+C)T&y4_yD]a=8L,' );
define( 'NONCE_SALT',       '(H=aYc`z.3m~G>/$2jY79#iY;E|R(7QP<$:c@_@VXG342uv>Les@)D9C*!E7zOum' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
