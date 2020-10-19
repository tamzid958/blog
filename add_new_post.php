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
                <br>
                <button type="button" class="btn btn-primary bg-primary text-light" id='gallery_upload' data-toggle="modal" data-target="#gallerytab" style="width: 50%;">
                    Upload From Gallery
                </button>
                <button type="button" id='direct_upload' class="btn btn-primary bg-primary text-light" style="width: 49%;">
                    Direct Upload
                </button>
                <br><br>
                <div id="direct_upload_input_div" class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" id="direct_upload_input" class="custom-file-input" id="post-featured-img" name="post-featured-img">
                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose Featured Image</label>
                    </div>
                </div>
                <input type="text" class="form-control" name="post-featured-img-gallery" id="post-featured-img-gallery" placeholder="Choose Featured Image">
                <input type="text" class="form-control" id="post-featured-img-alt" name="post-featured-img-alt" placeholder="Add Alt text For Featured Image" required>
                <select class="form-control" id="post-featured-cateogry" name="post-featured-category" required>
                    <option disabled>Select Feature Category</option>
                    <option selected>Normal</option>
                    <option>Featured</option>
                </select>
                <button type="submit" name="add_new_post" id="add_new_post" class="btn btn-primary btn-lg btn-block bg-primary text-light">Publish</button>
            </form>
        </div>

    </div>




    <!-- Modal -->
    <div class="modal fade" id="gallerytab" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Upload From Gallery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="wrapper">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <?php

                                        foreach ($images as $image) {
                                            echo " 
                            <div class='col-md-3 choose-img' id='" . substr($image, 7)  . "'>                          
                            <div class='card card-gap'>        
                            <div class='card-body gallery-img'>
                            <img src='$image' class='card-img-top' alt='' loading='lazy'>
                            </div>                                    
                            </div>  
                            </div>";
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


    <?php
    include "includes/footer.php";
    ?>