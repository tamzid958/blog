<?php
include "includes/header.php";
include "includes/admin_header.php";
?>

<title>Author</title>
</head>

<body>
    <div class="container-fluid hero" id="author-hero" style="background-image:linear-gradient(9deg, rgba(24,25,28,1) 0%, rgba(25,26,30,0.5578606442577031) 100%), url(/images/logo/<?php echo $site_details[0]["author_img"] ?>) ;">
    </div>

    <div class="container">
        <div class="wrapper">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <div class="custom-file form-file">
                        <input type="file" name="author-img" class="custom-file-input" id="author-img" required>
                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose Author Image</label>
                    </div>
                    <div class="input-group-append">
                        <button type="submit" name="author-img-upload" class="input-group-text bg-primary text-white" id="author-img-upload">Upload JPG/JPEG/PNG</button>
                    </div>
                </div>
            </form>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <div class="custom-file form-file">
                        <input type="file" name="author-site-logo-img" class="custom-file-input" id="author-site-logo-img" required>
                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose Site Logo</label>
                    </div>
                    <div class="input-group-append">
                        <button type="submit" name="site-logo-upload" class="input-group-text bg-primary text-white" id="site-logo-upload">Upload Transparent PNG</button>
                    </div>
                </div>
            </form>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <div class="custom-file form-file">
                        <input type="file" name="author-site-favicon" class="custom-file-input" id="author-site-favicon" required>
                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose Site Favicon</label>
                    </div>
                    <div class="input-group-append">
                        <button type="submit" name="site-favicon-upload" class="input-group-text bg-primary text-white" id="site-favicon-upload">Upload ICO File</button>
                    </div>
                </div>
            </form>
            <form id="author_details_change" method="post">
                <input type="text" class="form-control" id="author_site_name" value="<?php echo $author[0]["site_name"] ?>" placeholder="Enter Site Name" required>
                <input type="text" class="form-control" id="author_name" value="<?php echo $author[0]["author_name"] ?>" placeholder="Enter Author Name" required>
                <input type="tel" class="form-control" id="author_tel" value="<?php echo $author[0]["author_tel"] ?>" placeholder="Enter Author Mobile Number" required>
                <input type="email" class="form-control" id="author_email" value="<?php echo $author[0]["author_mail"] ?>" placeholder="Enter Author Email" required>
                <input type="password" class="form-control" id="author_old_pass" placeholder="Old Password" autocomplete="off">
                <p id="incorrect_old_pass" class="text-danger"></p>
                <input type="password" class="form-control" id="author_new_pass" placeholder="New Password" autocomplete="off">
                <input type="password" class="form-control" id="author_confirm_pass" placeholder="Confirm Password" autocomplete="off">
                <p id="new_pass_match" class="text-danger"></p>
                <textarea class="form-control admin_textarea" id="auther-bio" placeholder="Author BioGraphy" required><?php echo base64_decode($author[0]["biography"]) ?></textarea>
                <textarea class="form-control" id="adsense-code" placeholder="Put Your Adsense Code Here"><?php echo base64_decode($author[0]["adsense_code"])  ?></textarea>
                <button type="submit" class="btn btn-success btn-lg btn-block bg-success text-white" id="author-data-save">Save changes</button>
            </form>
        </div>
    </div>


    <?php
    include "includes/footer.php";
    ?>