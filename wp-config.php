<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
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
define( 'DB_NAME', 'manufae1_way' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'manufae1_way' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'H*qlXT3b' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'uO~poXG#E3W~{M3M&/B Bx;7IX#M4s/fU#<WU]K2QdSi6cxjHSDzxvO#?9yXfju(' );
define( 'SECURE_AUTH_KEY',  '%lj-Iz!&jYw{#OqgVnP[t[$WG:2]O[{bS7/t!}mfMBBpel|Ih-}KxR2H+@|>*rrq' );
define( 'LOGGED_IN_KEY',    'jXiiQf#2ieZpfk_/R>8A<x^qz8 M!<chwP0 (jb0m36oFl7`gDTG}0WV!R5,G@{V' );
define( 'NONCE_KEY',        'r(>A=d/MY)>INq<j8X2,hg@tEut_g6&sEpeunS%D,BM1GRVs8,3BCY 4x.?,5I<i' );
define( 'AUTH_SALT',        'b.n(/1H;FiQ]@q5#7*TFPli?*+yB/Id99U(Zy M1BzefpuvwrSGw=x--ATs~$Q4D' );
define( 'SECURE_AUTH_SALT', 'Az[tJ39i0 H$q&9,jDJhL>o,>K`(2NtK^)>c<ZFm`$P9GwP%L%Vm$tq?.T?vd#/X' );
define( 'LOGGED_IN_SALT',   'P3WOe<k`9I_hD{|6a450-&SzPyHe9l+-_{j}$4+B:O7(rr/%DILz~~z$QJyNN?5w' );
define( 'NONCE_SALT',       'm16PKwivKyi3t!_Al{[4iZt]P#_=6)0%nV95]RRPy1W3QzxnOY28?0} nPI)q@g-' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

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

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
