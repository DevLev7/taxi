<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'baza3_taxi' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'baza3_taxi' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '4ux%%m&T' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'jT0iJSCR^k-E-87Pyjhlc8bZquo?`.t;_Cr[J)q{{ r_W4Ee4Z_z7b<R8fxc++s<' );
define( 'SECURE_AUTH_KEY',  '.-B1_>_}He/RQCIngOm(FH8}g1W[/Lo0cVBCBafsv2Rp}t{h1R%/#h9x][Ftw7#)' );
define( 'LOGGED_IN_KEY',    'YPtg 2N*5,dNGS,Tg6qS(+By:#p>v_3yCYE+cg2|mqNUTLiRZk@p;yn(wRb>N-<3' );
define( 'NONCE_KEY',        'K6ri14G`*J1#I`Id9tK{/p%MV9DG{~PNt<ck-|dw>L8}Ziq?B.fx`[p[sDr  IdM' );
define( 'AUTH_SALT',        '`+avrou+(OfQ])3.&{7{A+t<~+-!X GN9C2H3k6N]E[}Ng>QcJ*1NmQXZ/yrGLNF' );
define( 'SECURE_AUTH_SALT', '{Y)_kwyR19~|3@L^8+f!>qYX;4uv6>F3}TE1GT*3r#u2CtyxdQBg|:G~r{p!gZa2' );
define( 'LOGGED_IN_SALT',   'i/@wD1@QeVA8a4@Bjdfo2&bSv^%CB(.:.v|%%|)]XCVW1P|HVpP*WT{YpKf$?<8>' );
define( 'NONCE_SALT',       '(,pgBL$ZR3rZ+8c@SeP!/0tP@r*@9jG!(b1UtObYMV!Yep17AN=%Sdx*vvuNVg#I' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'milk_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
