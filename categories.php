<?php
include "includes/header.php";
include "includes/admin_header.php";
?>

<title>Categories</title>
</head>

<body>
    <div class="container force-bottom">
        <div class="wrapper">
            <input type="text" id="category_name" class="form-control" placeholder="Create New Category">
            <button type="button" class="btn btn-primary btn-lg btn-block">Create</button>
            <br>
            <h1>All Categories</h1>
            <br>
            <div class="card mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Category</th>
                            <th scope="col">Count of Posts</th>
                            <th scope="col">Edit/Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Category1</td>
                            <td>10</td>
                            <td> <a href='' type='button' class='btn btn-success btn-sm' data-toggle="modal" data-target="#editcatgory">Edit</a>
                                <a href='' type='button' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>


<!-- Modal -->
<div class="modal fade" id="editcatgory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="edit_category_name" class="form-control" placeholder="Edit New Category">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?php
include "includes/footer.php";
?>