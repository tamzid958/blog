<?php
include "includes/header.php";
include "includes/categories_header.php";
$categoryid = $_REQUEST["id"];
$postsbycategory = postsbycategory($categoryid);

?>
<title>Blog | <?php echo $site_details[0]["site_name"] ?></title>
</head>

<body>
    <div class="container force-bottom">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-8 text-dark">
                    <div class="row">
                        <?php

                        foreach ($postsbycategory as $postbycategory) {
                            echo " <div class='col-md-6'> <div class='card card-gap post-card'> <a href='post.php/" . $postbycategory["post_slug"] . "'>
                    <img src='images/" . $postbycategory["post_img"] . "' class='card-img-top post-img' alt=''>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $postbycategory["post_heading"] . "</h5>
                        <p class='card-text'>" . substr(strip_tags(base64_decode($postbycategory["post_body"])), 0, 100) . "..</p>
                    </div> </a>
                </div></div>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-4">

                    <div>
                        <h3>Subscribe to NewsLetter</h3>
                        <input type="text" id="subscribe" class="form-control" placeholder="@email">
                        <p class="text-danger text-center" id="alert-mail"></p>
                        <a type="button" id="subscribe_btn" class="btn btn-info text-white btn-lg btn-block">Subscribe</a>
                    </div>
                    <br>
                    <div class="div_ad">

                    </div>
                    <br>
                    <div>
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <a class="navbar-brand">
                                    <img src="/images/logo/<?php echo $site_details[0]["author_img"] ?>" id="author" class="d-inline-block align-middle rounded-circle author" alt="" loading="lazy">
                                    <?php echo $site_details[0]["author_name"] ?>
                                </a>
                                <p class="card-text">Total Articles: <?php echo $postcount ?></p>
                                <a href="https://www.linkedin.com/in/tamzid-ahmed958/" target="_blank" class="btn btn-light">Follow</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    include "includes/footer.php";
    ?>