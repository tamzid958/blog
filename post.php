<?php
include "includes/header.php";
include "includes/categories_header.php";

$post_url = substr($_SERVER['REQUEST_URI'], 10);
$post = getPost($post_url);
countview($post_url);
$comments = getcommentsforpost($post[0]["post_id"]);
$post_body = base64_decode($post[0]["post_body"]);
?>
<meta property="og:title" content="<?php echo $post[0]["post_heading"]  ?>">
<meta property="og:description" content="<?php echo substr(strip_tags(base64_decode($post_body)), 0, 100) ?>">
<meta property="og:image" content="../images/<?php echo $post[0]["post_img"] ?> ">
<meta property="og:url" content="<?php echo $_SERVER['REQUEST_URI'] ?>">

<title><?php echo $post[0]["post_heading"] ?> | <?php echo $site_details[0]["site_name"] ?></title>
</head>

<body>
    <div class="container-fluid post-hero" style="background-image:linear-gradient(9deg, rgba(24,25,28,1) 0%, rgba(25,26,30,0.5578606442577031) 100%), url(../images/<?php echo $post[0]["post_img"] ?> ) ;">
    </div>
    <div class="container">
        <div class="wrapper">
            <h1>
                <?php echo $post[0]["post_heading"] ?>
            </h1>
            <br><br>
            <div id="post-font">
                <?php echo  $post_body ?>
            </div>
            <br><br>
            <div class="addthis_inline_share_toolbox"></div>

            <a class="navbar-brand">
                <img src="/images/logo/<?php echo $site_details[0]["author_img"] ?>" id="author" class="d-inline-block align-middle rounded-circle author" alt="" loading="lazy">
                <?php echo $site_details[0]["author_name"] ?>
            </a>
            <a href="https://www.linkedin.com/in/tamzid-ahmed958/" target="_blank" class="btn btn-info">Follow</a>
            <div class="comment-div">
                <form action="" method="post">
                    <input type="hidden" name="post_id" value="<?php echo $post[0]["post_id"] ?>">
                    <input type="text" class="form-control" name="comment-name" id="comment-name" placeholder="Enter Your Name" required>
                    <input type="email" class="form-control" name="comment-mail" id="comment-mail" placeholder="@email" required>
                    <textarea id="comment_post" class="form-control" name="comment-body" rows="4" placeholder="Leave a comment here" required></textarea>
                    <button type="submit" name="cmnt-btn" class="btn btn-primary btn-lg btn-block text-white">Comment</button>
                </form>
                <br>
                <?php
                foreach ($comments as $comment) {
                    echo " <div class='card card-comment'><div class='media'>
                    <img src='../images/logo/commenter.png' class='mr-3 rounded-circle author' alt='' width='70' height='70'>
                    <div class='media-body'>
                        <h5 class='mt-0 text-dark'>" . $comment['commenter'] . "</h5>
                        <p class='text-dark'>" .
                        $comment['comment'] . "
                        <p>
                    </div>
                    </div>
                </div>";
                }
                ?>

            </div>
        </div>

    </div>

    <?php
    include "includes/footer.php";
    ?>