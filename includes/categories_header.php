<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h3 class="text-dark">Categories</h3>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav_category" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav_category">
        <ul class="navbar-nav ml-auto">
            <?php
            foreach ($categories as $category) {
                echo " <li class='nav-item '>
                <a class='nav-link text-dark' href='/t/category.php?id=" . $category['category_id'] . "'>" . $category['category_name'] . "</a>
                </li>";
            }
            ?>

        </ul>
    </div>
</nav>