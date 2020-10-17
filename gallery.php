<?php
include "includes/header.php";
include "includes/admin_header.php";
?>

<title>Gallery</title>
</head>

<body>

    <div class="container force-bottom">
        <div class="wrapper">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">GALLERY</h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="gallery-img" class="custom-file-input" id="gallery-img" required>
                                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Upload Image</label>
                            </div>
                            <div class="input-group-append">
                                <button type="submit" name="gallery-img-upload" class="input-group-text bg-primary text-white" id="gallery-img-upload">Upload JPG/JPEG/PNG</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <?php

                        foreach ($images as $image) {
                            echo " 
                            <div class='col-md-3'> 
                            <form action='' method='post'>
                            <div class='card card-gap'>        
                            <div class='card-body gallery-img'>
                            <p class='text-center'>" . substr($image, 7)  . "</p>
                            <img src='$image' class='card-img-top' alt='' loading='lazy'>
                            </div> 
                            <input type='hidden' name='gallery_img_value' value=" . substr($image, 7)  . ">
                            <button type='submit' class='btn btn-danger btn-sm delete_gallery_img' name='delete_gallery_img'>DELETE</button>                                    
                            </div>  
                            </form>    
                            </div>";
                        }
                        ?>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php
    include "includes/footer.php";
    ?>