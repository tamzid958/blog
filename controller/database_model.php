<?php
include 'config.inc.php';

$mysqli = new mysqli($servername, $db_username, $db_password);

$check_database_exist_or_not = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$db_name'";

$db_create = "CREATE DATABASE $db_name; ";
$db_remove = "DROP DATABASE $db_name; ";

$init_sqls = array(
    "CREATE TABLE author (`id` int(1) NOT NULL,`author_name` varchar(50) NOT NULL,`author_tel` varchar(50) NOT NULL,`author_mail` varchar(50) NOT NULL,`password` varchar(100) NOT NULL,`biography` text NOT NULL,`adsense_code` mediumtext NOT NULL,`site_name` varchar(10) NOT NULL,`site_logo` varchar(100) NOT NULL,`author_img` varchar(100) NOT NULL,`site_favicon` varchar(40) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
    "CREATE TABLE `category` (`category_id` int(100) NOT NULL,`category_name` varchar(100) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; ",
    "CREATE TABLE `comments` (`id` int(255) NOT NULL,`commenter` varchar(100) NOT NULL,`comment` text NOT NULL,`post_id` int(255) NOT NULL,`commented_at` timestamp NOT NULL DEFAULT current_timestamp()) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; ",
    "CREATE TABLE `post` (`post_id` int(255) NOT NULL,`post_slug` varchar(100) NOT NULL,`post_heading` varchar(100) NOT NULL,`post_body` longtext NOT NULL,`category_id` int(100) DEFAULT NULL,`post_img` varchar(1000) DEFAULT NULL,`post_alt` varchar(1000) NOT NULL, `feature_category` varchar(10) NOT NULL,`created_at` varchar(255) DEFAULT NULL,`updated_at` timestamp NOT NULL DEFAULT current_timestamp(),`post_view` bigint(255) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; ",
    "CREATE TABLE `subscriber` (`id` int(255) NOT NULL, `email` varchar(50) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; ",
    "ALTER TABLE `author` ADD PRIMARY KEY (`id`); ",
    "ALTER TABLE `category` ADD PRIMARY KEY (`category_id`); ",
    "ALTER TABLE `comments` ADD PRIMARY KEY (`id`), ADD KEY `post_id` (`post_id`); ",
    "ALTER TABLE `post` ADD PRIMARY KEY (`post_id`), ADD UNIQUE KEY `post_slug` (`post_slug`), ADD KEY `category_id` (`category_id`); ",
    "ALTER TABLE `subscriber` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`); ",
    "ALTER TABLE `comments` ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);",
    "ALTER TABLE `post` ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);",
    "INSERT INTO `author` (`id`, `author_name`, `author_tel`, `author_mail`, `password`, `biography`, `adsense_code`, `site_name`, `site_logo`, `author_img`, `site_favicon`) VALUES ('1', 'admin', '0000000', 'admin@example.com', '21232f297a57a5a743894a0e4a801fc3', '', '', 'dummy', 'logo.png', 'author.png', 'favicon.ico');",
    "INSERT INTO `category` (`category_id`, `category_name`) VALUES ('1', 'Uncategorized');"
);


if ($mysqli === false) {
    echo "no server connection";
    exit;
}

if (getArrayforDatabaseCheck($check_database_exist_or_not) == null) {
    try {
        $booting_message = "Default Login Details: \\nmail: admin@example.com \\npass: admin";
        executeforfirsttime($db_create);
        foreach ($init_sqls as $init_sql) {
            execute($init_sql);
        }
        echo "<script type='text/javascript'> alert('$booting_message'); window.location.href = '/login.php'; </script>";
        $booting_message = null;
    } catch (Exception $e) {
        executeforfirsttime($db_remove);
        echo "Something went wrong: " . $e->getMessage();
    }
}

function getArrayforDatabaseCheck($check_database_exist_or_not)
{
    global $servername, $db_username, $db_password;
    $conn = mysqli_connect($servername, $db_username, $db_password);
    $data = array();
    $result = mysqli_query($conn, $check_database_exist_or_not);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}

function executeforfirsttime($init_sql)
{ //this one is for insert, update ,delete,
    global $servername, $db_username, $db_password;
    $conn = mysqli_connect($servername, $db_username, $db_password);
    mysqli_query($conn, $init_sql);
}
