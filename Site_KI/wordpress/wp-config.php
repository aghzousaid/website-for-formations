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
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '+>f^v|cg u2I?wO*6t2vWg8t_)bO|Q$=t<PnDufa{ruy]n[lwYJz48#/K}siy}i~');
define('SECURE_AUTH_KEY',  'L[bJ2m,k4%Dh7TDdyKk%1!oM>7Ja04$B/W4VHyXJt.@vtL[LFQ8R`}qB[eHZmO02');
define('LOGGED_IN_KEY',    '%8P(8y&utBvkdnZnqnL%1N17h8W8iThk>^m7=T{eY28=%=/n*]5~#y7CIXWD^$ c');
define('NONCE_KEY',        '5<L=eQ9U$3^z=r.mSCCA!Bc*W)qZdISMuHH7yl%HWq< hJ|X!e(Jsuv&XgD(FQa$');
define('AUTH_SALT',        'ke|UW*|qc+SEh.`z)!Atk^{y-Vka@KZ|hJ{P_I voN;n^QgEK|+$}0zbG`8[X0jm');
define('SECURE_AUTH_SALT', '`tQ/W5|%W6?Q}9$}-Du<aN]0f8FF/RsQ?b`Rm[R~)%l5W>aby7~j3d[RcT&t2CQ7');
define('LOGGED_IN_SALT',   '`Wo.k+&1|am|10L$u91w2V*~Rxm%XRPvC(o=[5`T0DANfA$bVguxY(^0H7#fmMOA');
define('NONCE_SALT',       'E|>%z1~X,-|ocC`~,_#.op^5+Dv@t<c&:bomN*Q;@x~F/2A4+:y+0tT3PY#4&u(E');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

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

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');