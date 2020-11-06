<?php
include "includes/header.php";
include "includes/categories_header.php";
if (getPost($_REQUEST["url"])) {
    $post_url = $_REQUEST["url"];
    $post = getPost($post_url);
    countview($post_url);
    $comments = getcommentsforpost($post[0]["post_id"]);
    $post_body = utf8_decode(base64_decode($post[0]["post_body"]));
} else {
    header("Location: /");
}
?>
<meta property="fb:app_id" content="568504490481111" />
<meta name="description" content="<?php echo substr(strip_tags($post_body), 0, 100) ?>">
<meta property="og:type" content="article">
<meta property='article:author' content='https://www.linkedin.com/in/tamzid-ahmed958/' />
<meta property='article:publisher' content='https://technologea.com/' />
<meta property="og:title" content="<?php echo $post[0]["post_heading"]  ?>">
<meta property="og:description" content="<?php echo substr(strip_tags($post_body), 0, 100) ?>">
<meta property="og:image:url" content="https://<?php echo $_SERVER['SERVER_NAME'] ?>/images/<?php echo $post[0]["post_img"] ?>">
<meta property="og:url" content="<?php echo $_SERVER['REQUEST_URI'] ?>">
<meta name="twitter:card" content="summary">


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

    </div>
    <div class="container">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-8 text-dark">
                    <br><br>
                    <div id="post-font">
                        <?php echo  $post_body ?>
                    </div>
                    <br><br>
                    <div class="addthis_inline_share_toolbox"></div>
                    <br> <br>
                    <h4>Share Your Thoughts</h4>
                    <div class="comment-div">
                        <form action="" method="post">
                            <input type="hidden" name="post_id" value="<?php echo $post[0]["post_id"] ?>">
                            <input type="text" class="form-control" name="comment-name" id="comment-name" placeholder="Enter Your Name" required>
                            <input type="email" class="form-control" name="comment-mail" id="comment-mail" placeholder="@email" required>
                            <textarea id="comment_post" class="form-control" name="comment-body" rows="4" placeholder="Leave a comment here" required></textarea>
                            <button type="submit" name="cmnt-btn" class="btn btn-primary btn-lg btn-block text-white bg-primary">Comment</button>
                        </form>
                        <br>
                        <div class="card">
                            <?php
                            foreach ($comments as $comment) {
                                echo " <div class='card-comment'><div class='media'>
                    <img src='../images/logo/commenter.png' class='mr-3 rounded-circle author' alt='' width='70' height='70' loading='lazy'>
                    <div class='media-body'>
                        <h5 class='mt-0 text-dark'>" . $comment['commenter'] . "</h5>
                        <p class='text-dark'>" .
                                    $comment['comment'] . "
                        <p>
                    </div>
                    </div>
                    </div> <hr class='my-4'>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="list-group list-group-flush text-dark">
                        <div class="card card-inner">
                            <h3>&nbsp; &nbsp; Featured Topics</h3>
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
                    <div>
                        <h3>Subscribe to NewsLetter</h3>
                        <input type="text" id="subscribe" class="form-control" placeholder="@email">
                        <p class="text-danger text-center" id="alert-mail"></p>
                        <a type="button" id="subscribe_btn" class="btn btn-info text-white btn-lg btn-block bg-info">Subscribe</a>
                    </div>
                    <br>
                    <div class="div_ad">
                        <a href="https://technologea.com/" target="_blank" rel="noopener noreferrer">
                            <img src="/images/test_ad.png" alt="technologea">
                        </a>
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
                                <a href="https://www.linkedin.com/in/tamzid-ahmed958/" target="_blank" class="btn btn-light text-dark bg-light">Follow</a>
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