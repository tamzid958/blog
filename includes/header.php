<?php
session_start();
ob_start();
if (file_exists("./controller/controller.php")) {
    include "./controller/controller.php";
} else {
    include "../controller/controller.php";
}
$site_details = sitedetails();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/all.min.css" />
    <link rel="stylesheet" href="/css/fontawesome.min.css" />
    <link href="/fonts/dosisfont.css?family=Dosis:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/chart.css" />
    <link rel="shortcut icon" href="/images/logo/<?php echo $site_details[0]["site_favicon"] ?>" type="image/x-icon">
    <link rel="icon" href="/images/logo/<?php echo $site_details[0]["site_favicon"] ?>" type="image/x-icon">
    <?php echo $site_details[0]["adsense_code"] ?>
    <meta name="theme-color" content="#343a40">
    <link rel="stylesheet" href="/css/style.css">
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                        <label class="switch">
                            <input type="checkbox" id="dark_moder">
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/index.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/login.php">Login</a>
                    </li>

            </div>
        </nav>
    </header>