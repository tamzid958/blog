<?php
include "includes/header.php";
include "includes/admin_header.php";
?>

<title>Author</title>
</head>

<body>
    <div class="container-fluid hero" style="background-image:linear-gradient(9deg, rgba(24,25,28,1) 0%, rgba(25,26,30,0.5578606442577031) 100%), url(/images/logo/author.jpg) ;">
    </div>

    <div class="container">
        <div class="wrapper">
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="author-img">
                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose Author Image</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                </div>
            </div>

            <input type="text" class="form-control" id="author_name" placeholder="Enter Author Name">
            <input type="tel" class="form-control" id="author_tel" placeholder="Enter Author Mobile Number">
            <input type="email" class="form-control" id="author_email" placeholder="Enter Author Email">
            <input type="password" class="form-control" id="author_old_pass" placeholder="Old Password">
            <input type="password" class="form-control" id="author_new_pass" placeholder="New Password">
            <input type="password" class="form-control" id="author_confirm_pass" placeholder="Confirm Password">
            <textarea class="form-control admin_textarea" id="auther-bio" placeholder="Author BioGraphy"></textarea> <br>
            <textarea class="form-control" id="adsense-code" placeholder="Put Your Adsense Code Here"></textarea>
            <button type="button" class="btn btn-success btn-lg btn-block">Save changes</button>
        </div>
    </div>
</body>

<?php
include "includes/footer.php";
?>