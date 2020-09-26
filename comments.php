<?php
include "includes/header.php";
include "includes/admin_header.php";
$post = getpostincomment($_REQUEST["id"]);
$comments = getcommentsforpost($_REQUEST["id"]);
$post_id_add = $_REQUEST["id"];
?>
<title>Posts</title>
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <h1 class="text-center"><?php echo $post[0]["post_heading"] ?></h1>
            <h3 class="text-center">COMMENT SECTION</h3>
            <input type="hidden" id="post_id_cmnt" value="<?php echo $post_id_add ?>">
            <input type="hidden" id="post_mail_cmnt" value="<?php echo $site_details[0]["author_mail"] ?>">
            <input type="hidden" id="commenter_name" value="<?php echo $site_details[0]["author_name"] ?>">
            <textarea type="text" id="comment_body" class="form-control" placeholder="POST NEW COMMENT" required></textarea>
            <button type="button" class="btn btn-primary btn-lg btn-block" id="add_new_comment">COMMENT</button>
            <div class="card mb-3">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Commenter</th>
                            <th scope="col">Comments</th>
                            <th scope="col">DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($comments as $comment) {
                            echo "<tr>
                        <th scope=row'>" . $comment["id"] . "</th>
                        <td>" . $comment["commenter"] . "</td>
                        <td>" . substr($comment["comment"], 0, 70) . "</td>
                        <td>
                        <a href='' type='button' class='btn btn-danger btn-sm comment-del-btn' id=" . $comment["id"] . ">Delete</a></td>
                    </tr>";
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    include "includes/footer.php";
    ?>