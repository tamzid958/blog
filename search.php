<?php
include "includes/header.php";
include "includes/categories_header.php";
if ($_REQUEST["searching"]) {
    $search_topic = $_REQUEST["searching"];
    $topics = topicSearcher($search_topic);
} else {
    $topics = 0;
}
?>
<title>Search | <?php echo $site_details[0]["site_name"] ?></title>
</head>

<body>
    <div class="container force-bottom">
        <div class="wrapper">
            <div class="row">
                <?php
                echo $topics;
                if ($topics > 0) {
                    foreach ($topics as $post) {
                        echo " <div class='col-md-4'> <div class='card card-gap post-card'> <a href='" . $post["post_slug"] . "/'>
                            <img src='/images/" . $post["post_img"] . "' class='card-img-top post-img' alt='' loading='lazy'>
                            <div class='card-body'>
                                <h5 class='card-title'>" . $post["post_heading"] . "</h5>
                                <p class='card-text'>" . substr(strip_tags(utf8_decode(base64_decode($post["post_body"]))), 0, 90) . "..</p>
                            </div> </a>
                        </div></div>";
                    }
                } else {
                    echo "<div class='jumbotron'>
                          <div class='container'>
                          <h1 class='display-4'>No Topic Found</h1>
                          </div>
                          </div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>


<?php
include "includes/footer.php";
?>