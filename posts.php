<?php
include "includes/header.php";
include "includes/admin_header.php";
?>

<title>Posts</title>
</head>

<body>
    <div class="container force-bottom">
        <div class="wrapper">
            <h1>All Posts</h1>
            <input type="text" id="search-post" class="form-control" placeholder="Search Post">
            <?php


            foreach ($posts as $post) {
                echo "<div class='card mb-3 card-gap search-div'>
                <div class='row no-gutters'>
                    <div class='col-md-4'>
                        <img src='/images/" . $post["post_img"] . "' class='card-img' alt='' width='600' height='200'>
                    </div>
                    <div class='col-md-8'>
                        <div class='card-body text-dark'>
                            <h3 class='card-title'>" . $post["post_heading"] . "</h3>
                            <p class='card-text p-wrap'>" . substr(strip_tags(base64_decode($post["post_body"])), 0, 100) . "</p>
                            <p class='card-text'><span class='text-mute'>Category: </span><mark>" . $post["category_name"] . "</mark> &nbsp;
                            <span class='text-muted'>Date: </span><mark>" . $post["created_at"] . "</mark></p>
                            <a href='edit_post.php/" . $post["post_slug"] . "' type='button' class='btn btn-success btn-sm' id=" . $post["post_id"] . ">Edit</a>
                            <a href='comments.php/?id=" . $post["post_id"] . "' type='button'  class='btn btn-info btn-sm check-cmnt'>Check Comments</a>
                            <button type='button' class='btn btn-danger btn-sm del-post-btn' id=" . $post["post_id"] . ">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
                    ";
            }
            ?>

        </div>
    </div>




    <?php
    include "includes/footer.php";
    ?>