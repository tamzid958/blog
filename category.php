<?php
include "includes/header.php";
include "includes/categories_header.php";
include "includes/meta_header.php";
if (postsbycategory($_REQUEST["id"])) {
    $categoryid = $_REQUEST["id"];
    $postsbycategory = postsbycategory($categoryid);
} else {
    header("Location: /");
}


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
                            echo " <div class='col-md-6'> <div class='card card-gap post-card'> <a href='" . $postbycategory["post_slug"] . "/'>
                    <img src='images/" . $postbycategory["post_img"] . "' class='card-img-top post-img' alt='' loading='lazy'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $postbycategory["post_heading"] . "</h5>
                        <p class='card-text'>" . substr(strip_tags(utf8_decode(base64_decode($postbycategory["post_body"]))), 0, 90) . "..</p>
                    </div> </a>
                </div></div>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-4">

                    <ul class="list-group list-group-flush text-dark">
                        <div class="card card-inner">
                            <h3>&nbsp; Popular Topics</h3>
                            <?php
                            $i = 0;
                            foreach ($popularposts  as $post) {
                                if (++$i == 10) {
                                    break;
                                } else {
                                    echo "<a href='" . $post["post_slug"] . "/'><li class='list-group-item'>" . $post["post_heading"] . "</li></a>";
                                }
                            }
                            ?>
                        </div>
                    </ul>

                    <br>
                    <div class="sticky">
                        <div>
                            <h3>Subscribe to NewsLetter</h3>
                            <input type="text" id="subscribe" class="form-control" placeholder="@email">
                            <p class="text-danger text-center" id="alert-mail"></p>
                            <a type="button" id="subscribe_btn" class="btn btn-info text-white btn-lg btn-block bg-info">Subscribe</a>
                        </div>
                        <br>
                        <div>
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <a class="navbar-brand text-white">
                                        <img src="/images/logo/<?php echo $site_details[0]["author_img"] ?>" id="author" class="d-inline-block align-middle rounded-circle author" alt="" loading="lazy">
                                        <?php echo $site_details[0]["author_name"] ?>
                                    </a>
                                    <p class="card-text">Total Articles: <?php echo $postcount ?></p>
                                </div>
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