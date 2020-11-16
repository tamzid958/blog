<?php
session_start();
ob_start();
$cookie_name = "user";
if (file_exists("./controller/controller.php")) {
    require_once "./controller/controller.php";
} else {
    require_once "../controller/controller.php";
}
$site_details = sitedetails();
$categories = getcategories();
$postsindex = getallposts();
$featureposts = featuredpost();
$popularposts = popularpostsforfront();
$postcount =  postcount();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--  <link rel="stylesheet" type="text/css" href="/css/bootstrap.material.min.css" /> -->
    <link href="/css/mdb.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/fontawesome.min.css" />
    <!-- <link href="/fonts/roboto.min.css?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="/fonts/opensans.min.css?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
      <link href="/fonts/dosisfont.min.css?family=Dosis:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="/fonts/font.css">
    <link rel="stylesheet" type="text/css" href="/css/chart.min.css" />
    <link rel="shortcut icon" href="/images/logo/<?php echo $site_details[0]["site_favicon"] ?>" type="image/x-icon">
    <link rel="icon" href="/images/logo/<?php echo $site_details[0]["site_favicon"] ?>" type="image/x-icon">
    <?php echo base64_decode($site_details[0]["adsense_code"]) ?>
    <meta name="theme-color" content="#343a40">
    <link rel="stylesheet" type="text/css" href="/css/style.min.css">
    <!--  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.3.2/styles/default.min.css"> -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="/images/logo/<?php echo $site_details[0]["site_logo"] ?>" width="50" height="35" class="d-inline-block align-top" alt="" loading="lazy">
                    <?php echo $site_details[0]["site_name"] ?>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/index.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" data-toggle="modal" data-target="#staticSearchBackdrop" style="cursor:pointer;">Search</a>
                        </li>
                </div>
            </div>
        </nav>

    </header>


    <!-- Modal -->
    <div class="modal fade" id="staticSearchBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-body">
                        <input class="form-control form-control-lg" name="searchPost" type="text" placeholder="Which post you want to find?" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" name="searchPostBtn" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>