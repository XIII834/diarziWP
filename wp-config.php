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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'diarzi');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'v*o1<p!EO`?D(tfYPJQi2qs(J(%=A=58E#4c`oiws)2Eko{:c}2Vj,%Y#7g57qNQ');
define('SECURE_AUTH_KEY',  'h.hhVyJeM(>|_qxKgI%~89 k$o3O^FQh?y#kSz%5%hg/hrl&pi)~J2X}hS<]At^<');
define('LOGGED_IN_KEY',    'B301*9WoBt;3+-cS&82UKH#*Csyb.j|#,1ehH/<Yusp@YMEj+wb7lu_9EA@2Agc`');
define('NONCE_KEY',        'jq)f(/CbUU#ThxR`L`4kux_[*QnFfj~w}8?&u*sf5tb|N]|Dcg=^C*{y/nMQfDXZ');
define('AUTH_SALT',        ']vDh;i+q#$Hh;5hT,cnd^AeP;d@dy#oz$8^%3-M`la-O28V[~OW7Lt6u,+NNW_W)');
define('SECURE_AUTH_SALT', '`ayYEbzmwWo<t6Up~-K5rm0AW{*PyS+S$>YZ0<jT%v,3Y^S/?uF!>lv2(23OtDI0');
define('LOGGED_IN_SALT',   'qvMKx!Y@9(;+MB_u?[T!J$.4`}{;Ls*InzAO14Qw<TjD9v82 S>[dbjOYk~<<tkc');
define('NONCE_SALT',       '^8~Z|uP+h3|D5(GpaY.D~pZ5YS]f%>1qpffDdb*3NNzt!a1F;_GRmjU7$SOdojP&');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'dz_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
