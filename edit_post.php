<?php
include "includes/header.php";
include "includes/admin_header.php";
$post_id = $_REQUEST["id"];
$post = getPostForEdit($post_id);
if (empty($post)) {
    header("Location: /posts.php");
}
?>

<title>Edit Post | <?php echo $post[0]["post_heading"] ?> </title>
</head>

<body>

    <div class="container">

        <div class="wrapper">
            <form id="post_edit_form" action="" method="post" enctype="multipart/form-data">
                <h1>Edit Post</h1>
                <input type="hidden" id="post_id" name="post_id" value="<?php echo $post[0]["post_id"] ?>" required>
                <input type="text" class="form-control" value="<?php echo $post[0]["post_slug"] ?>" name="post-slug" id="post-slug" placeholder="Edit Post Slug (Unique)" required>
                <p class="text-center text-danger"><?php echo $err_invalid ?></p>
                <input type="text" class="form-control" value="<?php echo $post[0]["post_heading"] ?>" name="post-heading" id="post-heading" placeholder="Edit Heading" required>
                <textarea class="form-control admin_textarea" name="post-body" id="post-body-edit" rows="20" placeholder="Edit Post Description" required><?php echo utf8_decode(base64_decode($post[0]["post_body"]))  ?></textarea>
                <select class="form-control" name="post-cateogry" id="post-cateogry" required>
                    <option disabled>Edit Category</option>
                    <?php
                    foreach ($categories as $category) {
                        if ($post[0]["category_id"] == $category["category_id"]) {
                            echo "<option selected value=" . $category["category_id"] . ">" . $category["category_name"] . "</option>";
                        } else {
                            echo "<option value=" . $category["category_id"] . ">" . $category["category_name"] . "</option>";
                        }
                    }

                    ?>
                </select>
                <div class="input-group mb-3">
                    <div class="custom-file form-file">
                        <input type="file" class="custom-file-input" name="post-featured-img-edit" id="post-featured-img-edit">
                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Edit Featured Image</label>
                    </div>
                    <div class="input-group-append">
                        <a href="/gallery.php" target="_blank" rel="noopener noreferrer">
                            <span class="input-group-text" id="inputGroupFileAddon02">Upload From Gallery</span>
                        </a>
                    </div>
                </div>
                <input type="text" class="form-control" name="post-featured-img-gallery" placeholder="Choose Featured Image" value="<?php echo $post[0]["post_img"] ?>" required>
                <input type="text" class="form-control" name="post-featured-img-alt" id="post-featured-img-alt" value="<?php echo $post[0]["post_alt"] ?>" placeholder="Edit Alt text For Featured Image" required>
                <select class="form-control" id="post-featured-cateogry" name="post-featured-cateogry" required>
                    <option disabled>Select Feature Category</option>
                    <?php
                    if ($post[0]["feature_category"] == "Featured") {
                        echo "<option selected>Featured</option>";
                    } else {
                        echo "<option selected>Normal</option>";
                    }
                    ?>
                </select>
                <button type="submit" name="edit_post_btn_e" id="edit_post_btn_e" class="btn btn-primary btn-lg btn-block bg-primary text-light">Edit</button>
            </form>
        </div>

    </div>


    <?php
    include "includes/footer.php";
    ?>