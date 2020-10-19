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
                <div class="col-md-6">
                    <h1 class="text-center">ADD NEW MAIL</h1>
                    <input type="email" name="" class="form-control" id="addnew-mail" placeholder="EMAIL ADDRESS" required>
                    <button type="button" class="btn btn-primary btn-lg btn-block bg-primary text-light" id="add_new-mail-btn">ADD NEW MAIL</button>
                    <p class="text-danger text-center"><?php echo $err_invalid ?></p>
                    <br>
                    <form action="" method="post">
                        <h1 class="text-center">SEND BULK MAIL</h1>
                        <input type="text" name="mail-subject" class="form-control" id="mail-subject" placeholder="Subject of the mail" required>
                        <textarea class="form-control admin_textarea" name="mail-body" id="mail-body" rows="20" placeholder="Mail Body"></textarea>
                        <br>
                        <button type="submit" name="bulk-mail" class="btn btn-primary btn-lg btn-block bg-success text-white">SEND MAIL</button>
                        <p class="text-center text-danger"><?php echo $err_invalid ?></p>
                    </form>
                </div>
                <div class="col-md-6">
                    <h1 class="text-center">MAIL LIST</h1>
                    <input type="email" name="" class="form-control" id="search-mail" placeholder="SEARCH EMAIL ADDRESS">
                    <table class="table table-info" id="t-table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">EMAIL ADDRESS</th>
                                <th scope="col">EDIT/DELETE</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            foreach ($subs as $sub) {

                                echo " <tr><th scope='row'>" . $sub['id'] . "</th>
                                        <td>" . $sub['email'] . "</td>
                                        <td><a href='' type='button' class='btn btn-success btn-sm edit-tmail' data-toggle='modal' id=" . $sub['id'] . ">Edit</a>
                                            <a href='' type='button' class='btn btn-danger btn-sm delete-tmail' id=" . $sub['id'] . ">Delete</a></td></tr>";
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
                    <h5 class="modal-title" id="">Edit Mail: <span id="tmailer-modal-head"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_mail_id">
                    <input type="email" id="edit_email" class="form-control" placeholder="Edit Mail">
                </div>
                <div class="modal-footer">
                    <p class="text-danger"><?php echo $err_invalid ?></p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="edit-tmail-btn-modal" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "includes/footer.php";
    ?>