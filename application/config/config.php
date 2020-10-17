<?php

/* ERROR */

error_reporting(E_ALL);
ini_set("display_errors", 1);

/* INFORMATION */

define('URL', 'http://40.74.60.100/gaudesp/');
define('CONTACT_EMAIL', 'gaudespro@gmail.com');
define('SITE_NAME', 'Gaudesp');

/* PAGINATION */

define('ARTICLES_PER_PAGE', 3);
define('EXPERIENCES_PER_PAGE', 3);
define('FORMATIONS_PER_PAGE', 3);
define('PROJECTS_PER_PAGE', 3);

/* BDD */

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'gaudesp_bdd');
define('DB_USER', 'root');
define('DB_PASS', 'Maxou%*1');

/* MAIL */

define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_PORT', 587);
define('MAIL_USER', 'mail.ubuntu.server@gmail.com');
define('MAIL_PASS', 'Sr84Ty12%*45');

/* CONFIG */

define('EDIT_CONFIG', 'application/views/config/edit.php');

define('CONFIG', 'application/config/config.ini');

/* ABOUT */

define('INDEX_ABOUT', 'application/views/about/index.php');

/* CONTACT */

define('INDEX_CONTACT', 'application/views/contact/index.php');

/* TEMPLATE */

define('HEAD', 'application/views/_templates/header.php');
define('MENU', 'application/views/_templates/menu.php');
define('FOOT', 'application/views/_templates/footer.php');
define('ASIDE_TOP', 'application/views/_templates/modules/aside-top.php');
define('ASIDE_BOT', 'application/views/_templates/modules/aside-bot.php');

/* ADMINS */

define('INDEX_ADMINS', 'application/views/admins/index.php');
define('LOGOUT_ADMINS', 'application/views/admins/modules/logout.php');

/* ARTICLES */

define('ADD_ARTICLES', 'application/views/articles/add.php');
define('EDIT_ARTICLES', 'application/views/articles/edit.php');
define('INDEX_ARTICLES', 'application/views/articles/index.php');
define('READ_ARTICLES', 'application/views/articles/read.php');

define('PAGINATION_ARTICLES', 'application/views/articles/modules/pagination.php');
define('LAST_ARTICLES', 'application/views/articles/modules/last.php');
define('BACK_ARTICLES', 'application/views/articles/modules/back.php');

/* FORMATIONS */

define('ADD_FORMATIONS', 'application/views/formations/add.php');
define('EDIT_FORMATIONS', 'application/views/formations/edit.php');
define('INDEX_FORMATIONS', 'application/views/formations/index.php');
define('READ_FORMATIONS', 'application/views/formations/read.php');

define('PAGINATION_FORMATIONS', 'application/views/formations/modules/pagination.php');
define('LAST_FORMATIONS', 'application/views/formations/modules/last.php');
define('BACK_FORMATIONS', 'application/views/formations/modules/back.php');

/* EXPERIENCES */

define('ADD_EXPERIENCES', 'application/views/experiences/add.php');
define('EDIT_EXPERIENCES', 'application/views/experiences/edit.php');
define('INDEX_EXPERIENCES', 'application/views/experiences/index.php');
define('READ_EXPERIENCES', 'application/views/experiences/read.php');

define('PAGINATION_EXPERIENCES', 'application/views/experiences/modules/pagination.php');
define('LAST_EXPERIENCES', 'application/views/experiences/modules/last.php');
define('BACK_EXPERIENCES', 'application/views/experiences/modules/back.php');

/* PROJECTS */

define('ADD_PROJECTS', 'application/views/projects/add.php');
define('EDIT_PROJECTS', 'application/views/projects/edit.php');
define('INDEX_PROJECTS', 'application/views/projects/index.php');
define('READ_PROJECTS', 'application/views/projects/read.php');

define('PAGINATION_PROJECTS', 'application/views/projects/modules/pagination.php');
define('LAST_PROJECTS', 'application/views/projects/modules/last.php');
define('BACK_PROJECTS', 'application/views/projects/modules/back.php');

/* HOME */

define('INDEX_HOME', 'application/views/home/index.php');
define('CV', 'application/views/home/modules/cv.php');
define('LINKEDIN', 'application/views/home/modules/linkedin.php');
define('YOUTUBE', 'application/views/home/modules/youtube.php');