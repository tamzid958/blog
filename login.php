<?php
include "includes/header.php";
?>
<title>Login | MrTvirus</title>
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="row ">
                <div class="col-sm-6" style="margin:0 auto;">
                    <div class="card card-login">
                        <h1 class="text-dark">Enter Login Details</h1>
                        <input type="email" class="form-control" id="author_email">
                        <input type="password" class="form-control" id="author_password">
                        <a href="post.php" type="button" class="btn btn-primary btn-lg btn-block">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include "includes/footer.php";
?>