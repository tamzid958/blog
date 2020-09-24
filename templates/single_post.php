<?php
include "../includes/header.php";
include "../includes/categories_header.php";
?>
<title>POST TITLE | BLOG</title>
</head>

<body>
    <div class="container-fluid post-hero" style="background-image:linear-gradient(9deg, rgba(24,25,28,1) 0%, rgba(25,26,30,0.5578606442577031) 100%), url(https://dummyimage.com/1200x400/cc2669/f5f5f5.png) ;">
    </div>
    <div class="container">
        <div class="wrapper">
            <h1>
                POST TITLE
            </h1>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores neque dolorem, ut ea iure omnis iusto quo maxime tempora at officiis sequi explicabo voluptas repellendus, voluptates amet laudantium hic quia?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis tempore soluta consectetur culpa iste, aliquid neque amet rem quas quis mollitia magnam quibusdam, possimus maxime, consequatur architecto saepe cum voluptates!
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi dolorem architecto ex veniam eum numquam iure dignissimos deserunt expedita! Quas architecto dolorum vel amet qui illo similique hic, id nobis?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium vitae ratione perferendis consectetur odit temporibus obcaecati. Autem obcaecati adipisci rem natus deserunt totam, vero consequatur unde quas sit aliquam voluptas?
            </p>

            <div class="addthis_inline_share_toolbox"></div>

            <a class="navbar-brand">
                <img src="/images/logo/<?php echo $site_details[0]["author_img"] ?>" id="author" class="d-inline-block align-middle rounded-circle author" alt="" loading="lazy">
                <?php echo $site_details[0]["author_name"] ?>
            </a>
            <a href="https://www.linkedin.com/in/tamzid-ahmed958/" target="_blank" class="btn btn-info">Follow</a>
            <div class="comment-div">
                <input type="text" class="form-control" id="comment-name" placeholder="Enter Your Name">
                <input type="email" class="form-control" id="comment-mail" placeholder="@email">
                <textarea id="comment_post" class="form-control" rows="4" placeholder="Leave a comment here"></textarea>
                <a type="button" class="btn btn-primary btn-lg btn-block text-white">Comment</a>
                <br>
                <?php
                for ($i = 0; $i < 5; $i++) {
                    echo " <div class='card card-comment'><div class='media'>
                    <img src='https://dummyimage.com/64x64/000000/f5f5f5.png' class='mr-3 rounded-circle author' alt=''>
                    <div class='media-body'>
                        <h5 class='mt-0 text-dark'>Commenter Name</h5>
                        <p class='text-dark'>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <p>
                    </div>
                    </div>
                </div>";
                }
                ?>

            </div>
        </div>

    </div>
</body>
<?php
include "../includes/footer.php";
?>