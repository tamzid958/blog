<?php
include "includes/header.php";
include "includes/admin_header.php";
?>

<title>Add new Post</title>
</head>

<body>

    <div class="container">

        <div class="wrapper">
            <form action="" method="post" enctype="multipart/form-data">
                <h1>Add New Post</h1> <br>
                <input type="text" class="form-control" name="post-slug" id="post-slug" placeholder="Add New Post Slug (Unique)" required>
                <p class="text-center text-danger"><?php echo $err_invalid ?></p>
                <input type="text" class="form-control" name="post-heading" id="post-heading" placeholder="Add New Heading" required>
                <textarea class="form-control admin_textarea" name="post-body-add" id="post-body" rows="20" placeholder="Add New Post Description"></textarea>
                <select class="form-control" id="post-cateogry" name="post-category" required>
                    <option selected disabled>Select Category</option>
                    <?php
                    foreach ($categories as $category) {
                        echo "<option value=" . $category["category_id"] . ">" . $category["category_name"] . "</option>";
                    }

                    ?>
                </select>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="post-featured-img" name="post-featured-img" required>
                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose Featured Image</label>
                    </div>
                </div>
                <input type="text" class="form-control" id="post-featured-img-alt" name="post-featured-img-alt" placeholder="Add Alt text For Featured Image" required>
                <select class="form-control" id="post-featured-cateogry" name="post-featured-category" required>
                    <option disabled>Select Feature Category</option>
                    <option selected>Normal</option>
                    <option>Featured</option>
                </select>
                <button type="submit" name="add_new_post" id="add_new_post" class="btn btn-primary btn-lg btn-block">Publish</button>
            </form>
        </div>

    </div>





    <?php
    include "includes/footer.php";
    ?>