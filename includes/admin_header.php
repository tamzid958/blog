<?php
$author = getauthor();
$categories = getcategories();
$posts = getallposts();
$subs = getallsubs();
if ($_SESSION["username"] == md5($author[0]["author_mail"])) {
} else {
    header("Location: ./controller/log_out.php");
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="author.php">
        <img src="/images/logo/<?php echo $site_details[0]["author_img"] ?>" id="author" class="d-inline-block align-middle rounded-circle author" alt="" loading="lazy">
        <?php echo $site_details[0]["author_name"] ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav_admin" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav_admin">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="/tmailer.php">T-mail</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/analytics.php">Analytics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/post.php">Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/categories.php">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/add_new_post.php">Add New Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/controller/log_out.php">Log Out</a>
            </li>
        </ul>
    </div>
</nav>