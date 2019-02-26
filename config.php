<?php

// ĐỊNH NGHĨA ĐƯỜNG DẪN ĐẾN CÁC THƯ MỤC CẦN THIẾT
define('DS', DIRECTORY_SEPARATOR); 
define('ROOT_DIRECTORY', __DIR__); // --> Định nghĩa đường dẫn đến thư mục gốc
// ĐỊNH NGHĨA DẪN ĐẾN CÁC THƯ MỤC ADMIN
define('ADMIN_DIRECTORY', ROOT_DIRECTORY . DS . "admin"); // --> định nghĩa đường dẫn đến thư mục admin
define('ADMIN_CONTROLLER_DIRECTORY', ADMIN_DIRECTORY . DS . "controllers"); // --> định nghĩa đường dẫn đến thư mục controller admin
define('ADMIN_MODEL_DIRECTORY', ADMIN_DIRECTORY . DS . "models"); //--> định nghĩa đường dẫn đến thư mục model admin
define('ADMIN_VIEW_DIRECTORY', ADMIN_DIRECTORY . DS . "views"); //--> định nghĩa đường dẫn đến thư mục view admin
// DẪN ĐẾN CÁC THƯ MỤC TRANG GỐC
define('HOME_CONTROLLER_DIRECTORY', ROOT_DIRECTORY . DS . "controllers"); // --> định nghĩa đường dẫn đến thư mục controller admin
define('HOME_MODEL_DIRECTORY', ROOT_DIRECTORY . DS . "models"); //--> định nghĩa đường dẫn đến thư mục model admin
define('HOME_VIEW_DIRECTORY', ROOT_DIRECTORY . DS . "views"); //--> định nghĩa đường dẫn đến thư mục view admin

define('ROOT_URL', (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/tour');
define('ROOT_HOME_URL', (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']);
define('ROOT_ADMIN_URL', ROOT_URL . "/admin");

// ĐỊNH NGHĨA SỬ DỤNG TEMPLATE
define('TEMPLATE_ADMIN_URL', ROOT_ADMIN_URL . "/templates");
define('TEMPLATE_DIRECTORY', ADMIN_DIRECTORY . DS . "templates");

define('TEMPLATE_HOME_URL', ROOT_URL . "/templates");
define('TEMPLATE_HOME_DIRECTORY', ROOT_DIRECTORY . DS . "templates");

define('UPLOAD_UPLOAD_URL', ROOT_ADMIN_URL . "/uploads");
define('UPLOAD_FILE_URL', ROOT_ADMIN_URL . "/uploads/file");
define('UPLOAD_IMAGE_URL', ROOT_ADMIN_URL . "/uploads/images");
define('UPLOAD_HOME_DIRECTORY', ROOT_DIRECTORY . DS . "uploads");
define('MAX_FILE_SIZE', 1048576);
define('PHP_EXCEL_DIRECTORY', ROOT_DIRECTORY . DS . "plugin" . DS . "PHPExcel.php");
define('FPDF_DIRECTORY', ROOT_DIRECTORY . DS . "plugin" . DS . "Fpdf" . DS . "fpdf.php");
define('PHP_MAILER', ROOT_DIRECTORY . DS . "admin" . DS . "plugin" . DS . "PHPMailer" . DS . "PHPMailerAutoload.php");


define('REPORT_DIRECTORY', ROOT_DIRECTORY . DS . "reports");

define("SOTRANG", 50);
define("IS_SHOW_SQL", false);

define("CATEGORY_KIND_BAIVIET", 2);
define("CATEGORY_KIND_PRODUCT", 1);

define("DEFAULT_NO_IMAGE", "no_images.png");
define("COMPANY_ID", "d1fa9230-0fba-11e7-99d7-00ffd6ea7b14");
define("FORMAT_URL_POST", ROOT_URL . "/tin-tuc/{POST_ALIAS}.html");
define("FORMAT_URL_CATEGORY_POST", ROOT_URL . "/nhom-tin/{CATEGORY_POST_ALIAS}.html");
define("FORMAT_URL_CATEGORY_PRODUCT", ROOT_URL . "/nganh-nghe/{CATEGORY_PRODUCT_ALIAS}.html");



define('HOST', "localhost");
//define('DATABASE', "tourduonganh");
define('DATABASE', "tourduonganh");
define('USERNAME', "root");
define('PASSWORD', "");



