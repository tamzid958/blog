<?php
include "includes/header.php";
include "includes/admin_header.php";
?>

<title>Posts</title>
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <h1>All Posts</h1>
            <input type="text" id="search-post" class="form-control" placeholder="Search Post">
            <?php


            foreach ($posts as $post) {
                echo "<div class='card mb-3 card-gap'>
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
                            <a href='#' type='button' data-toggle='modal' data-target='#commentModal' id=" . $post["post_id"] . " class='btn btn-info btn-sm'>Check Comments</a>
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



    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Commenter</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, reprehenderit dolore debitis quisquam laborum eum optio aut fuga, libero vel voluptatem ratione incidunt quia iste eius, itaque quas assumenda? Dolore?</td>
                                <td> <a href='' type='button' class='btn btn-danger btn-sm'>Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <?php
    include "includes/footer.php";
    ?>