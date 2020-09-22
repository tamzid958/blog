<?php
include "includes/header.php";
include "includes/admin_header.php";
?>

<title>Add new Post</title>
</head>

<body>

    <div class="container">

        <div class="wrapper">

            <h1>Add New Post</h1> <br>
            <input type="text" class="form-control" id="post-slug" placeholder="Add New Post Slug (Unique)">
            <input type="text" class="form-control" id="post-heading" placeholder="Add New Heading">
            <textarea class="form-control admin_textarea" id="post-body" rows="20" placeholder="Add New Post Description"></textarea>
            <select class="form-control" id="post-cateogry">
                <option selected disabled>Select Category</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="post-featured-img">
                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose Featured Image</label>
                </div>
            </div>
            <input type="text" class="form-control" id="post-featured-img-alt" placeholder="Add Alt text For Featured Image">
            <select class="form-control" id="post-featured-cateogry">
                <option disabled>Select Feature Category</option>
                <option selected>Normal</option>
                <option>Featured</option>
            </select>
            <button type="button" class="btn btn-primary btn-lg btn-block">Publish</button>

        </div>

    </div>



</body>

<?php
include "includes/footer.php";
?>