<?php
include "includes/header.php";
include "includes/admin_header.php";
if (getPost($_REQUEST["url"])) {
    $post_url = $_REQUEST["url"];
    $post = getPost($post_url);
    $comments = getcommentsforpost($post[0]["post_id"]);
    $post_body = utf8_decode(base64_decode($post[0]["post_body"]));
} else {
    header("Location: /posts.php");
}
?>

<title><?php echo $post[0]["post_heading"] ?> | <?php echo $site_details[0]["site_name"] ?></title>
</head>

<body>
    <div class="container-fluid post-hero text-white" style="background-image:linear-gradient(9deg, rgba(24,25,28,1) 0%, rgba(25,26,30,0.5578606442577031) 100%), url(../images/<?php echo $post[0]["post_img"] ?> ) ; display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <h1 class="text-center">
            <?php echo $post[0]["post_heading"] ?>
        </h1>
        <a class="navbar-brand text-white">
            <img src="/images/logo/<?php echo $site_details[0]["author_img"] ?>" id="author" class="d-inline-block align-middle rounded-circle author" alt="" loading="lazy">
            <a href="https://www.linkedin.com/in/tamzid-ahmed958/" target="_blank" class="text-white font-weight-normal">by <?php echo $site_details[0]["author_name"] ?> - <?php echo date('F d, Y', strtotime($post[0]["created_at"])) ?> </a>
        </a>
        <a href="https://www.linkedin.com/in/tamzid-ahmed958/" target="_blank" class="btn btn-info btn-sm bg-light text-dark">Follow</a>
    </div>
    <div class="container">
        <div class="wrapper">

            <br><br>
            <div id="post-font">
                <?php echo  $post_body ?>
            </div>
            <br><br>
        </div>

    </div>

    <?php
    include "includes/footer.php";
    ?>