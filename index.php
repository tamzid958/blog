<?php
include "includes/header.php";
include "includes/categories_header.php";
include "includes/meta_header.php";
?>
<title>Blog | <?php echo $site_details[0]["site_name"] ?></title>

</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-8 text-dark">
                    <div class="row">
                        <?php

                        foreach ($postsindex as $post) {
                            echo " <div class='col-md-6'> <div class='card card-gap post-card'> <a href='" . $post["post_slug"] . "/'>
                            <img src='/images/" . $post["post_img"] . "' class='card-img-top post-img' alt='' loading='lazy'>
                            <div class='card-body'>
                                <h5 class='card-title'>" . $post["post_heading"] . "</h5>
                                <p class='card-text'>" . substr(strip_tags(utf8_decode(base64_decode($post["post_body"]))), 0, 90) . "..</p>
                            </div> </a>
                        </div></div>";
                        }
                        ?>
                    </div>
                </div>

                <div class="col-md-4">

                    <ul class="list-group list-group-flush text-dark">
                        <div class="card card-inner">
                            <h3>&nbsp; Featured Topics</h3>
                            <?php
                            $i = 0;
                            foreach ($featureposts as $post) {
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
                    <div class='sticky'>
                        <div>
                            <h3>Subscribe to NewsLetter</h3>
                            <input type="text" id="subscribe" class="form-control" placeholder="@email">
                            <p class="text-danger text-center" id="alert-mail"></p>
                            <a type="button" id="subscribe_btn" class="btn btn-info text-white btn-lg btn-block bg-info">Subscribe</a>
                        </div>
                        <br>
                        <!--
                      <div class="div_ad">
                        <a href="https://technologea.com/" target="_blank" rel="noopener noreferrer">
                            <img src="/images/test_ad.png" alt="technologea">
                        </a>
                      </div>
                      <br> -->
                        <div class="LI-profile-badge" data-version="v1" data-size="medium" data-locale="en_US" data-type="horizontal" data-theme="light" data-vanity="tamzid-ahmed958" style="max-width:100%">
                            <a class="LI-simple-link" target="_blank" href='https://bd.linkedin.com/in/tamzid-ahmed958?trk=profile-badge'>Tamzid Ahmed</a>
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