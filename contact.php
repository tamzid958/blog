<?php
include "includes/header.php";
include "includes/categories_header.php";
include "includes/meta_header.php";
?>

<title>Blog | <?php echo $site_details[0]["site_name"] ?></title>
</head>

<body>

    <div class="container contact-body">
        <div class="wrapper text-dark">
            <div class="card">
                <div class="container contact-form">
                    <h3 class="text-center">FEEL FREE TO CONTACT</h3>
                    <form method="post" action="">
                        <input type="text" class="form-control" type="text" name="contact_name" id="" placeholder="NAME" required>
                        <input type="email" class="form-control" name="contact_mail" id="" placeholder="EMAIL" required>
                        <textarea class="form-control" name="contact_body" id="" cols="30" rows="10" placeholder="SHARE YOUR THOUGHTS" required></textarea>
                        <button type="submit" name="contact_btn" class="btn btn-primary btn-lg btn-block">Contact</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>


<?php
include "includes/footer.php";
?>