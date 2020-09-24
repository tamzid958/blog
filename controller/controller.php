<?php

require_once "config.inc.php";

$err_invalid = "";

if (isset($_POST["enc_password"])) {

    oldPasswordCheck($_POST["enc_password"]);
}

if (isset($_POST["author-img-upload"])) {
    $file = $_FILES['author-img'];
    $fileName = $_FILES['author-img']['name'];
    $fileTmpName = $_FILES['author-img']['tmp_name'];
    $fileError = $_FILES['author-img']['error'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            $fileNameNew = "author" . "." . $fileActualExt;
            $fileDestination = './images/logo/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            updateauthorimg($fileNameNew);
        }
    }
}

if (isset($_POST["site-logo-upload"])) {
    $file = $_FILES['author-site-logo-img'];
    $fileName = $_FILES['author-site-logo-img']['name'];
    $fileTmpName = $_FILES['author-site-logo-img']['tmp_name'];
    $fileError = $_FILES['author-site-logo-img']['error'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('png');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            $fileNameNew = "logo" . "." . $fileActualExt;
            $fileDestination = './images/logo/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
        }
    }
}


if (isset($_POST["site-favicon-upload"])) {
    $file = $_FILES['author-site-favicon'];
    $fileName = $_FILES['author-site-favicon']['name'];
    $fileTmpName = $_FILES['author-site-favicon']['tmp_name'];
    $fileError = $_FILES['author-site-favicon']['error'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('ico');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            $fileNameNew = "favicon" . "." . $fileActualExt;
            $fileDestination = './images/logo/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
        }
    }
}

if (isset($_POST["author_details_change_a"])) {
    updateauthorbio($_POST["site_name"], $_POST["author_name"], $_POST["author_tel"], $_POST["author_email"], $_POST["author_confirm"], $_POST["author_bio"], $_POST["author_adsense_code"]);
}

if (isset($_POST["category_del_id"])) {
    deletecategory($_POST["category_del_id"]);
}

if (isset($_POST["category_edit_id"])) {
    getcategory($_POST["category_edit_id"]);
}

if (isset($_POST["category_update_id"])) {
    updatecategory($_POST["category_update_id"], $_POST["category_update_name"]);
}

if (isset($_POST["new_category_name"])) {
    insertcategory($_POST["new_category_name"]);
}
function getauthor()
{
    $query = "SELECT * FROM `author` WHERE `id` = '1'";
    $author = getArray($query);
    return $author;
}

function oldPasswordCheck($enc_password)
{
    $query = "SELECT `password` FROM `author` WHERE `id` = '1'";
    $enc_password = getArray($query);
    echo json_encode($enc_password[0]);
}

function sitedetails()
{
    $query = "SELECT `author_name`, `adsense_code`, `site_name`,`site_logo`,`author_img`,`site_favicon` FROM `author` WHERE `id` = '1'";
    $site_details = getArray($query);
    return $site_details;
}
function updateauthorimg($author_img)
{
    $query = "UPDATE `author` SET `author_img`= '$author_img'";
    execute($query);
}
function updateauthorbio($site_name, $author_name, $author_tel, $author_email, $author_confirm, $authorbio, $author_ad_sense_code)
{
    $authorbio = wordwrap('"' . $authorbio . '"');
    $author_ad_sense_code = wordwrap("'" .  $author_ad_sense_code . "'");
    if (empty($author_confirm)) {

        $query = "UPDATE `author` SET `author_name`='$author_name',`author_tel`='$author_tel',`author_mail`='$author_email',`biography`= {$authorbio} ,`adsense_code`={$author_ad_sense_code} ,`site_name`='$site_name' WHERE `id`='1' ";

        execute($query);
    } else {
        $author_confirm = md5($author_confirm);

        $query = "UPDATE `author` SET `author_name`='$author_name',`author_tel`='$author_tel',`author_mail`='$author_email',`password`='$author_confirm',`biography`={$authorbio} ,`adsense_code`={$author_ad_sense_code},`site_name`='$site_name' WHERE `id`='1' ";

        execute($query);
    }
}
function getcategories()
{

    $query = "SELECT * FROM `category`";
    $categories = getArray($query);
    return $categories;
}
function deletecategory($category_id)
{
    $query = "DELETE FROM `category` WHERE `category_id`= $category_id";
    execute($query);
}

function getcategory($category_id)
{
    $query = "SELECT * FROM `category` WHERE `category_id`= $category_id";
    $category = getArray($query);
    echo json_encode($category);
}
function updatecategory($category_id, $category_name)
{
    $query = "UPDATE `category` SET `category_name`= '$category_name' WHERE  `category_id`= $category_id";
    execute($query);
}
function insertcategory($new_category_name)
{
    $query = "INSERT INTO `category`(`category_id`, `category_name`) VALUES (NULL,'$new_category_name')";
    execute($query);
}
function getallposts()
{
    $query = "SELECT * FROM `post` ORDER BY `post_id` DESC";
    $posts = getArray($query);
    return $posts;
}
function getpost($slug)
{
    $query = "SELECT * FROM `post` WHERE `post_slug` ='$slug'";
    $post = getArray($query);
    return $post;
}
