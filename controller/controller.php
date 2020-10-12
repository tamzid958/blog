<?php
require_once "config.inc.php";

$err_invalid = "";
$has_error = false;

if (isset($_POST["enc_password"])) {

    oldPasswordCheck($_POST["enc_password"]);
}

if (isset($_POST["author-img-upload"])) {
    $file = $_FILES['author-img'];
    $old_file_name = searchauthorimg();
    $fileName = $_FILES['author-img']['name'];
    $fileTmpName = $_FILES['author-img']['tmp_name'];
    $fileError = $_FILES['author-img']['error'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            @unlink('./images/logo/' . $old_file_name);
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
            @unlink('./images/logo/' . "logo.png");
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
            @unlink('./images/logo/' . "favicon.ico");
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
if (isset($_POST["login"])) {
    if (authenticate($_POST["author_email"], $_POST["author_password"])) {
        header("Location: posts.php");
    } else {
        $err_invalid = "Wrong Email or Password";
    }
}
if (isset($_POST["edit_post_btn_e"])) {

    $dupli_error = duplicateurlsearchwhileedit($_POST["post_id"], $_POST["post-slug"]);
    if ($dupli_error > 0) {
        $err_invalid = "DUPLICATE URL FOUND";
    } else {
        $post_img_old = searchimg($_POST["post_id"]);
        $post_img_old_without_exec = $without_extension = substr($post_img_old, 0, strrpos($post_img_old, "."));
        $file = $_FILES['post-featured-img-edit'];
        $fileName = $_FILES['post-featured-img-edit']['name'];
        $fileTmpName = $_FILES['post-featured-img-edit']['tmp_name'];
        $fileError = $_FILES['post-featured-img-edit']['error'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png');
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                @unlink('./images/' . $old_file_name);
                $fileNameNew = $post_img_old_without_exec . "." . $fileActualExt;
                $fileDestination = './images/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            }
        } else {
            $fileNameNew = $post_img_old;
        }
        updatepost($_POST["post_id"], $_POST["post-slug"], $_POST["post-heading"], $_POST["post-body"], $_POST["post-cateogry"], $fileNameNew, $_POST["post-featured-img-alt"], $_POST["post-featured-cateogry"]);
    }
}


if (isset($_POST["comment_del_id"])) {
    deletecomment($_POST["comment_del_id"]);
}
if (isset($_POST["sub_mail"])) {
    $dupli_error =  searchduplicatemail($_POST["sub_mail"]);
    if ($dupli_error == 0) {
        insertmail($_POST["sub_mail"]);
    }
}

function deletecomment($comment_id)
{

    $query = "DELETE FROM `comments` WHERE `id`= '$comment_id'";
    execute($query);
}


if (isset($_POST["add_new_post"])) {
    $dupli_error = duplicateurlsearch($_POST["post-slug"]);
    if ($dupli_error > 0) {
        $err_invalid = "DUPLICATE URL FOUND";
    } else {
        $file = $_FILES['post-featured-img'];
        $fileName = $_FILES['post-featured-img']['name'];
        $fileTmpName = $_FILES['post-featured-img']['tmp_name'];
        $fileError = $_FILES['post-featured-img']['error'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png');
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = './images/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                insertpost($_POST["post-slug"], $_POST["post-heading"], $_POST["post-body-add"], $_POST["post-category"], $fileNameNew, $_POST["post-featured-img-alt"], $_POST["post-featured-category"]);
            }
        }
    }
}
if (isset($_POST["post_id_del"])) {
    deletepost($_POST["post_id_del"]);
}
if (isset($_POST["tmail_id"])) {

    gettmail($_POST["tmail_id"]);
}
if (isset($_POST["edit_mail_id"])) {
    $dupli_error = searchduplicatemailwhiteedit($_POST["edit_email"], $_POST["edit_mail_id"]);
    if ($dupli_error > 0) {
        $err_invalid = "This Email Already in Database";
    } else {
        updatetmail($_POST["edit_mail_id"], $_POST["edit_email"]);
    }
}
if (isset($_POST["delete_tmail"])) {
    deletetmail($_POST["delete_tmail"]);
}
if (isset($_POST["addnew_mail"])) {
    $dupli_error = searchduplicatemail($mail);
    if ($dupli_error > 0) {
        $err_invalid = "This Email Already in Database";
    } else {
        insertmail($_POST["addnew_mail"]);
    }
}
if (isset($_POST["bulk-mail"])) {
    if (bulkmailer($_POST["mail-subject"], $_POST["mail-body"])) {
        $err_invalid = "Something Seriously Wrong";
    }
}
if (isset($_POST["cmnt-btn"])) {
    insertcomment($_POST["post_id"], $_POST["comment-name"], $_POST["comment-mail"], $_POST["comment-body"]);
}
if (isset($_POST["new_comment_body"])) {
    insertcomment($_POST["post_id_cmnt"], $_POST["commenter"], $_POST["post_mail_cmnt"], $_POST["new_comment_body"]);
}
if (isset($_POST["comment_edit_id_a"])) {
    getcommentforedit($_POST["comment_edit_id_a"]);
}
if (isset($_POST["contact_btn"])) {
    contactform($_POST["contact_name"], $_POST["contact_mail"], $_POST["contact_body"]);
}

function contactform($name, $mail, $body)
{
    $dupli_error = searchduplicatemail($mail);
    if ($dupli_error == 0) {
        $query = "INSERT INTO `subscriber`(`id`, `email`) VALUES (NULL,'$mail')";
        execute($query);
    }
    $email_subject = "NEW ENTRY CONTACT FORM BY " . $name;
    $to = "tamjidahmed958@gmail.com";
    mail($to, $email_subject, " Email: \n $mail \n Message:\n $body \n ");
}

function getcommentforedit($id)
{
    $query = "SELECT * FROM `comments` WHERE `id`='$id'";
    $comments = getArray($query);
    echo json_encode($comments[0]);
}
function getpost_id_for_comment($post_id)
{
    $query = "SELECT * FROM `comments` WHERE `post_id`='$post_id'";
    $comments = getArray($query);
    echo json_encode($comments);
}

function insertcomment($p_id, $commenter, $comment_mail, $comment_body)
{
    $query = "INSERT INTO `comments`(`id`, `commenter`, `comment`, `post_id`) VALUES (NULL, '$commenter', '$comment_body','$p_id')";
    execute($query);
    $dupli_error = searchduplicatemail($comment_mail);
    if ($dupli_error == 0) {
        $query = "INSERT INTO `subscriber`(`id`, `email`) VALUES (NULL,'$comment_mail')";
        execute($query);
    }
}

function duplicateurlsearchwhileedit($post_id, $post_slug)
{
    $query = "SELECT COUNT('post_slug') AS COUNT FROM `post` WHERE `post_slug` = '$post_slug' AND `post_id` != '$post_id'";
    $duplicateurl = getArray($query);
    $duplicateurl = $duplicateurl[0]["COUNT"];
    return $duplicateurl;
}
function bulkmailer($subject, $mailbody)
{

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";
    $headers .= 'From: Tamzid Ahmed' . "\r\n";

    $email_subject = $subject;
    $mailbody = "'" . $mailbody . "'";


    $query = "SELECT `email` FROM `subscriber`";
    $recipentsmail = getArray($query);

    $total_mail = [];
    foreach ($recipentsmail as $recipentmail) {
        $total_mail[] = ($recipentmail["email"] . ", ");
    }
    $all_mails = implode(', ', $total_mail);

    mail($all_mails, $email_subject, $mailbody, $headers);
}
function searchduplicatemailwhiteedit($mail, $id)
{
    $query = "SELECT COUNT('email') AS COUNT FROM `subscriber` WHERE `email` = '$mail' AND `id` != '$id'";
    $dupli_mail = getArray($query);
    $dupli_mail = $dupli_mail[0]["COUNT"];
    return $dupli_mail;
}

function searchduplicatemail($mail)
{
    $query = "SELECT COUNT('email') AS COUNT FROM `subscriber` WHERE `email` = '$mail'";
    $dupli_mail = getArray($query);
    $dupli_mail = $dupli_mail[0]["COUNT"];
    return $dupli_mail;
}

function insertmail($mail)
{
    $query = "INSERT INTO `subscriber`(`id`, `email`) VALUES (NULL,'$mail')";
    execute($query);
}

function deletetmail($id)
{
    $query = "DELETE FROM `subscriber` WHERE `id`= '$id'";
    execute($query);
}
function updatetmail($mail_id, $mail)
{
    $query = "UPDATE `subscriber` SET `email`='$mail' WHERE `id`='$mail_id'";
    execute($query);
}
function gettmail($tmail_id)
{
    $query = "SELECT * FROM `subscriber` WHERE `id`= '$tmail_id'";
    $subs = getArray($query);
    echo json_encode($subs[0]);
}
function deletepost($post_id)
{
    $query = "DELETE FROM `comments` WHERE `post_id`= '$post_id'";
    execute($query);
    $query = "DELETE FROM `post` WHERE `post_id`= '$post_id'";
    execute($query);
}
function insertpost($post_slug, $post_heading, $post_body_add, $post_category, $post_featured_img, $post_featured_img_alt, $post_featured_category)
{
    $post_body = base64_encode($post_body_add);
    $created_at = gmdate("Y-m-d H:i:s", time());
    $query = "INSERT INTO `post`(`post_id`, `post_slug`, `post_heading`, `post_body`, `category_id`, `post_img`, `post_alt`, `feature_category`, `created_at`, `updated_at`, `post_view`) VALUES (NULL,'$post_slug','$post_heading','$post_body','$post_category','$post_featured_img','$post_featured_img_alt','$post_featured_category','$created_at',NULL,'0')";
    execute($query);
}

function duplicateurlsearch($post_slug)
{
    $query = "SELECT COUNT('post_slug') AS COUNT FROM `post` WHERE `post_slug` = '$post_slug'";
    $duplicateurl = getArray($query);
    $duplicateurl = $duplicateurl[0]["COUNT"];
    return $duplicateurl;
}
function searchauthorimg()
{
    $query = "SELECT `author_img` FROM `author` WHERE `id` = '1'";
    $author_old_img = getArray($query);
    return $author_old_img[0]["author_img"];
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
    $authorbio = base64_encode($authorbio);
    $author_ad_sense_code =  base64_encode($author_ad_sense_code);
    if (empty($author_confirm)) {

        $query = "UPDATE `author` SET `author_name`='$author_name',`author_tel`='$author_tel',`author_mail`='$author_email',`biography`= '$authorbio' ,`adsense_code`='$author_ad_sense_code' ,`site_name`='$site_name' WHERE `id`='1' ";

        execute($query);
    } else {
        $author_confirm = md5($author_confirm);

        $query = "UPDATE `author` SET `author_name`='$author_name',`author_tel`='$author_tel',`author_mail`='$author_email',`password`='$author_confirm',`biography`='$authorbio' ,`adsense_code`='$author_ad_sense_code',`site_name`='$site_name' WHERE `id`='1' ";

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
    $query = "UPDATE `post` SET `category_id` = '1' WHERE `category_id` = '$category_id' ";
    execute($query);
    $query = "DELETE FROM `category` WHERE `category_id`= $category_id";
    execute($query);
}

function getcategory($category_id)
{
    $query = "SELECT * FROM `category` WHERE `category_id`= '$category_id'";
    $category = getArray($query);
    echo json_encode($category);
}
function updatecategory($category_id, $category_name)
{
    $query = "UPDATE `category` SET `category_name`= '$category_name' WHERE  `category_id`= '$category_id'";
    execute($query);
}
function insertcategory($new_category_name)
{
    $query = "INSERT INTO `category`(`category_id`, `category_name`) VALUES (NULL,'$new_category_name')";
    execute($query);
}
function getallposts()
{
    $query = "SELECT * FROM `post`,`category` WHERE post.category_id = category.category_id ORDER BY `post_id` DESC";
    $posts = getArray($query);
    return $posts;
}
function getpost($slug)
{
    $query = "SELECT * FROM `post` WHERE `post_slug` ='$slug'";
    $post = getArray($query);
    return $post;
}

function authenticate($email, $password)
{
    $password = md5($password);
    $query = "SELECT `author_mail` from `author` WHERE `author_mail`='$email' AND `password`='$password'";
    $author = getArray($query);

    if ($author) {
        $_SESSION["username"] = md5($author[0]["author_mail"]);
    }
    return $author;
}

function searchimg($post_id)
{
    $query = "SELECT `post_img` FROM `post` WHERE `post_id`= '$post_id'";
    $pic_name_q = getArray($query);
    $pic_name_q = $pic_name_q[0]["post_img"];
    return $pic_name_q;
}
function updatepost($post_id, $post_slug, $post_heading, $post_body, $category_id, $post_img, $post_alt, $feature_category)
{

    $post_body = base64_encode($post_body);

    $query = "UPDATE `post` SET `post_slug`='$post_slug',`post_heading`='$post_heading',`post_body` ='$post_body',`category_id`='$category_id',`post_img`='$post_img',`post_alt`='$post_alt',`feature_category`='$feature_category' WHERE `post`.`post_id`='$post_id'";
    execute($query);
}
function postsbycategory($category_id)
{
    $query = "SELECT * FROM `post` WHERE `category_id`='$category_id'";
    $postsbycategory = getArray($query);
    return $postsbycategory;
}
function featuredpost()
{
    $query = "SELECT * FROM `post` WHERE `feature_category`='Featured'";
    $featuredpost = getArray($query);
    return  $featuredpost;
}
function getallsubs()
{
    $query = "SELECT * FROM `subscriber` ORDER BY `id` DESC LIMIT 10";
    $subs = getArray($query);
    return $subs;
}
function countview($post_url)
{
    $query = "UPDATE `post` SET `post_view`=`post_view`+1 WHERE `post_slug`='$post_url'";
    execute($query);
}
function getcommentsforpost($post_id)
{
    $query = "SELECT * FROM `comments` WHERE `post_id` = '$post_id' ORDER BY `comments`.`id` DESC";
    $comments = getArray($query);
    return $comments;
}
function getpostincomment($id)
{
    $query = "SELECT `post_heading` FROM `post` WHERE `post_id`='$id'";
    $comment = getArray($query);
    return $comment;
}
function postcount()
{
    $query = "SELECT COUNT('post_id') AS COUNT FROM `post`";
    $post_count = getArray($query);
    $post_count = $post_count[0]["COUNT"];
    return $post_count;
}
function popularposts()
{
    $query = "SELECT `post_id`, `post_heading`, `post_view`,`created_at` FROM `post` GROUP BY `post_id` ORDER BY `post_view` DESC LIMIT 5";
    $popularposts = getArray($query);
    return $popularposts;
}

function fixposts()
{
    $query = "SELECT `post_id`, `post_heading`, `post_view`,`created_at` FROM `post` GROUP BY `post_id` ORDER BY `post_view` ASC LIMIT 5";
    $fixposts = getArray($query);
    return $fixposts;
}
function chart1title()
{
    $query = "SELECT `post_id`,`post_view` FROM `post` GROUP BY `post_id` ORDER BY `post_view` DESC LIMIT 5";
    $popularposts = getArray($query);
    return $popularposts;
}
function chart2engaging()
{
    $query = "SELECT COUNT(post_id) AS COUNT FROM `post` WHERE `post_view` > 100";
    $engagingposts = getArray($query);
    return $engagingposts[0]["COUNT"];
}
function chart2notengaging()
{
    $query = "SELECT COUNT(post_id) AS COUNT FROM `post` WHERE `post_view` < 100";
    $notengagingposts = getArray($query);
    return $notengagingposts[0]["COUNT"];
}
function sitemap()
{
    $query = "SELECT `post_slug` FROM `post` ";
    $sitemap = getArray($query);
    return  $sitemap;
}
