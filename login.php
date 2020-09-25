<?php
include "includes/header.php";
?>
<title>Login | MrTvirus</title>
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <form action="" method="post">
                <div class="row ">
                    <div class="col-sm-6" style="margin:0 auto;">
                        <div class="card card-login">
                            <h1 class="text-dark">Enter Login Details</h1>
                            <input type="email" class="form-control" name="author_email" id="author_email" placeholder="Email Address" required>
                            <input type="password" class="form-control" name="author_password" id="author_password" placeholder="Password" required>
                            <p class="text-danger text-center"><?php echo $err_invalid ?></p>
                            <button type="submit" name="login" class="btn btn-primary btn-lg btn-block text-light">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    include "includes/footer.php";
    ?>