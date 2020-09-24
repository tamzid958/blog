<?php
include "includes/header.php";
include "includes/admin_header.php";
?>

<title>Categories</title>
</head>

<body>
    <div class="container force-bottom">
        <div class="wrapper">

            <input type="text" id="category_name" class="form-control" placeholder="Create New Category" required>
            <button type="button" class="btn btn-primary btn-lg btn-block" id="add_new_category">Create</button>

            <br>
            <h1>All Categories</h1>
            <br>
            <div class="card mb-3">
                <table class="table" id="category-table">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Category</th>
                            <th scope="col">Count of Posts</th>
                            <th scope="col">Edit/Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($categories as $category) {
                            echo "<tr>
                            <th scope='row'>" . $category["category_id"] . "</th>
                            <td>" . $category["category_name"] . "</td>
                            <td>10</td>
                            <td> <a href='' type='button' class='btn btn-success btn-sm category-edit-btn' data-toggle='modal' id=" . $category["category_id"] . ">Edit</a>
                                <a href='' type='button' class='btn btn-danger btn-sm category-del-btn' id=" . $category["category_id"] . ">Delete</a>
                            </td>
                        </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>


<!-- Modal -->
<div class="modal fade" id="editcatgory" tabindex="-1" role="dialog" aria-labelledby="category-name-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="category-name-modal-label">Edit Category: <span id="category-name-label"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="category-id-h-input">
                <input type="text" id="edit_category_name" class="form-control" placeholder="Edit Category" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="edit_category_btn_modal" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?php
include "includes/footer.php";
?>