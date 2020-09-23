<?php
include "includes/header.php";
include "includes/admin_header.php";
?>
<title>Tmailer</title>
</head>

<body>

    <div class="container">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-center">ADD NEW MAIL</h1>
                    <input type="email" name="" class="form-control" id="add-new-mail" placeholder="EMAIL ADDRESS">
                    <button type="button" class="btn btn-primary btn-lg btn-block">ADD NEW MAIL</button>
                    <br>
                    <h1 class="text-center">SEND BULK MAIL</h1>
                    <input type="text" name="" class="form-control" id="mail-subject" placeholder="Subject of the mail">
                    <textarea class="form-control admin_textarea" id="post-body" rows="20" placeholder="Mail Body"></textarea>
                    <br>
                    <button type="button" class="btn btn-primary btn-lg btn-block">SEND MAIL</button>
                </div>
                <div class="col-md-4 text-dark">
                    <h1 class="text-center">MAIL LIST</h1>
                    <input type="email" name="" class="form-control" id="search-mail" placeholder="SEARCH EMAIL ADDRESS">
                    <table class="table table-info">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">EMAIL ADDRESS</th>
                                <th scope="col">EDIT/DELETE</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            for ($i = 0; $i < 10; $i++) {

                                echo " <tr><th scope='row'>$i</th>
                                    <td>email@address.com</td>
                                    <td><a href='' type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#editmail'>Edit</a>
                                        <a href='' type='button' class='btn btn-danger btn-sm'>Delete</a></td></tr>";
                            }

                            ?>
                        </tbody>

                    </table>
                </div>



            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Mail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="email" id="edit_email" class="form-control" placeholder="Edit Mail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include "includes/footer.php";
?>