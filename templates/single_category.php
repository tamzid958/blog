<?php
include "../includes/header.php";
include "../includes/categories_header.php";
?>
<title>Blog | MrTvirus</title>
</head>

<body>
    <div class="container text-dark">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <?php

                        for ($i = 0; $i < 20; $i++) {
                            echo " <div class='col-md-4'> <div class='card card-gap'> <a href='single_post.php'>
                    <img src='https://dummyimage.com/600x400/cc2669/f5f5f5.png' class='card-img-top' alt=''>
                    <div class='card-body'>
                        <h5 class='card-title'>Card title</h5>
                        <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div> </a>
                </div></div>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-4">

                    <div>
                        <h3>Subscribe to NewsLetter</h3>
                        <input type="text" id="subscribe" class="form-control" placeholder="@email">
                        <a type="button" class="btn btn-info text-white btn-lg btn-block">Subscribe</a>
                    </div>
                    <br>
                    <div class="div_ad">
                        <img class="ad" src="/images/test_ad.png" alt="">
                    </div>
                    <br>
                    <div>
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <a class="navbar-brand">
                                    <img src="/images/logo/author.jpg" id="author" class="d-inline-block align-middle rounded-circle author" alt="" loading="lazy">
                                    Tamzid Ahmed
                                </a>
                                <p class="card-text">Total Articles: 20</p>
                                <a href="https://www.linkedin.com/in/tamzid-ahmed958/" target="_blank" class="btn btn-light">Follow</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<?php
include "../includes/footer.php";
?>