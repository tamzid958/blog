$(document).ready(function () {
  tinymce.init({
    selector: ".admin_textarea",
    plugins:
      "a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker",
    toolbar:
      "a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table",
    toolbar_mode: "floating",
    tinycomments_mode: "embedded",
    tinycomments_author: "Author name",
  });

  $("#dark_moder").on("change", function () {
    var element = document.body;
    element.classList.toggle("bg-dark");
    element.classList.toggle("text-white");
  });

  $(function () {
    var txt = $("#post-slug");
    var func = function () {
      txt.val(txt.val().replace(/\s/g, "-"));
    };
    txt.keyup(func).blur(func);
  });

  $("#author_new_pass").attr("disabled", true);
  $("#author_confirm_pass").attr("disabled", true);
  $("#author_new_pass").attr("required", false);
  $("#author_confirm_pass").attr("required", false);

  $("#author_old_pass").on("focusout", function () {
    var MD5 = new Hashes.MD5();
    var enc_password = MD5.hex($(this).val());
    $("#author_new_pass").attr("required", true);
    $("#author_confirm_pass").attr("required", true);
    $.ajax({
      url: "./controller/controller.php",
      method: "post",
      datatype: "json",
      data: {
        enc_password: enc_password,
      },
      success: function (data) {
        data = $.parseJSON(data);

        if (data["password"] != enc_password) {
          $("#incorrect_old_pass").html("Wrong Password");
          $("#author_new_pass").attr("disabled", true);
          $("#author_confirm_pass").attr("disabled", true);
        } else {
          $("#incorrect_old_pass").html("");
          $("#author_new_pass").attr("disabled", false);
          $("#author_confirm_pass").attr("disabled", false);

          $("#author_confirm_pass").on("focusout", function () {
            var new_pass = $("#author_new_pass").val();
            var confirm_pass = $("#author_confirm_pass").val();
            if (new_pass === confirm_pass) {
              $("#new_pass_match").html("");
              $("#author-data-save").attr("disabled", false);
            } else {
              $("#new_pass_match").html("Password Not Matching");
              $("#author-data-save").attr("disabled", true);
            }
          });
        }
      },
    });
  });

  $("#author-img").on("change", function () {
    var author_img = $("#author-img").val();
    author_img = author_img.toLowerCase();

    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    if (!allowedExtensions.exec(author_img)) {
      $("#author-img-upload").text("Invalid File Format");
      $("#author-img-upload").addClass("bg-danger text-light");
      $("#author-img-upload").removeClass("bg-info");
      $("#author-img-upload").attr("disabled", true);
      author_img = "";
      return false;
    } else {
      $("#author-img-upload").text("Upload");
      $("#author-img-upload").removeClass("bg-danger");
      $("#author-img-upload").addClass("bg-primary text-light");
      $("#author-img-upload").attr("disabled", false);
    }
  });

  $("#author-site-logo-img").on("change", function () {
    var site_logo = $("#author-site-logo-img").val();
    site_logo = site_logo.toLowerCase();

    var allowedExtensions = /(\.png)$/i;

    if (!allowedExtensions.exec(site_logo)) {
      $("#site-logo-upload").text("Invalid File Format");
      $("#site-logo-upload").addClass("bg-danger text-light");
      $("#site-logo-upload").removeClass("bg-info");
      $("#site-logo-upload").attr("disabled", true);
      site_logo = "";
      return false;
    } else {
      $("#site-logo-upload").text("Upload");
      $("#site-logo-upload").removeClass("bg-danger");
      $("#site-logo-upload").addClass("bg-primary text-light");
      $("#site-logo-upload").attr("disabled", false);
    }
  });

  $("#author-site-favicon").on("change", function () {
    var site_logo = $("#author-site-favicon").val();
    site_logo = site_logo.toLowerCase();

    var allowedExtensions = /(\.ico)$/i;

    if (!allowedExtensions.exec(site_logo)) {
      $("#site-favicon-upload").text("Invalid File Format");
      $("#site-favicon-upload").addClass("bg-danger text-light");
      $("#site-favicon-upload").removeClass("bg-info");
      $("#site-favicon-upload").attr("disabled", true);
      site_logo = "";
      return false;
    } else {
      $("#site-favicon-upload").text("Upload");
      $("#site-favicon-upload").removeClass("bg-danger");
      $("#site-favicon-upload").addClass("bg-primary text-light");
      $("#site-favicon-upload").attr("disabled", false);
    }
  });

  $("#author_details_change").submit(function (e) {
    e.preventDefault();
    tinyMCE.triggerSave();
    var author_details_change_a = $("#author_details_change").attr("id");
    $("#author-data-save").html(
      'Changing <img src="/images/logo/ajax-loader.gif" id="ajax-loader" />'
    );
    var site_name = $("#author_site_name").val();
    var author_name = $("#author_name").val();
    var author_tel = $("#author_tel").val();
    var author_email = $("#author_email").val();
    var author_confirm = $("#author_confirm_pass").val();
    var author_bio = $("#auther-bio").val();
    var author_adsense_code = $("#adsense-code").val();

    $.ajax({
      url: "./controller/controller.php",
      method: "post",
      datatype: "json",
      data: {
        author_details_change_a: author_details_change_a,
        site_name: site_name,
        author_name: author_name,
        author_tel: author_tel,
        author_email: author_email,
        author_confirm: author_confirm,
        author_bio: author_bio,
        author_adsense_code: author_adsense_code,
      },
      success: function (data) {
        setTimeout(function () {
          $("#author-data-save").html("Details Changed");
        }, 1000);
        setTimeout(function () {
          $("#author-data-save").html("Save Changes");
        }, 2000);
      },
    });
  });
  $(".category-del-btn").click(function () {
    var category_del_id = $(this).attr("id");
    $.ajax({
      url: "./controller/controller.php",
      method: "post",
      data: {
        category_del_id: category_del_id,
      },
      success: function (data) {
        location.reload();
        return false;
      },
    });
  });
  $(".category-edit-btn").click(function () {
    var category_edit_id = $(this).attr("id");
    $.ajax({
      url: "./controller/controller.php",
      method: "post",
      data: {
        category_edit_id: category_edit_id,
      },
      success: function (data) {
        data = $.parseJSON(data);
        console.log();
        $("#category-name-label").html(data[0]["category_name"]);
        $("#category-id-h-input").val(data[0]["category_id"]);
        $("#edit_category_name").val(data[0]["category_name"]);
        $("#editcatgory").modal();
      },
    });
  });
  setInterval(function () {
    if (
      $("#edit_category_name").val() == null ||
      $("#edit_category_name").val() == ""
    ) {
      $("#edit_category_btn_modal").attr("disabled", true);
    } else {
      $("#edit_category_btn_modal").attr("disabled", false);
    }
  }, 200);

  $("#edit_category_btn_modal").click(function () {
    var category_update_id = $("#category-id-h-input").val();
    var category_update_name = $("#edit_category_name").val();

    $("#edit_category_btn_modal").html(
      'Changing <img src="/images/logo/ajax-loader.gif" id="ajax-loader width="15" height="15"" />'
    );
    $.ajax({
      url: "./controller/controller.php",
      method: "post",
      data: {
        category_update_id: category_update_id,
        category_update_name: category_update_name,
      },
      success: function (data) {
        setTimeout(function () {
          $(".close").click();
          $("#edit_category_btn_modal").html("Save changes");
          location.reload();
          return false;
        }, 2000);
      },
    });
  });

  setInterval(function () {
    if ($("#category_name").val() == null || $("#category_name").val() == "") {
      $("#add_new_category").attr("disabled", true);
    } else {
      $("#add_new_category").attr("disabled", false);
    }
  }, 200);

  $("#add_new_category").click(function () {
    $("#add_new_category").html(
      'Creating <img src="/images/logo/ajax-loader.gif" id="ajax-loader width="15" height="15"" />'
    );
    var new_category_name = $("#category_name").val();
    $.ajax({
      url: "./controller/controller.php",
      method: "post",
      data: {
        new_category_name: new_category_name,
      },
      success: function (data) {
        setTimeout(function () {
          $("#add_new_category").html("Created");
        }, 1000);
        setTimeout(function () {
          $("#add_new_category").html("Create");
          location.reload();
          return false;
        }, 2000);
      },
    });
  });
  $("#post-featured-img-edit").on("change", function () {
    var img = $("#post-featured-img-edit").val();
    img = img.toLowerCase();

    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    if (!allowedExtensions.exec(img)) {
      $("#edit_post_btn_e").text("Invalid File Format");
      $("#edit_post_btn_e").addClass("bg-danger text-light");
      $("#edit_post_btn_e").removeClass("bg-info");
      $("#edit_post_btn_e").attr("disabled", true);
      img = "";
      return false;
    } else {
      $("#edit_post_btn_e").text("Upload");
      $("#edit_post_btn_e").removeClass("bg-danger");
      $("#edit_post_btn_e").addClass("bg-primary text-light");
      $("#edit_post_btn_e").attr("disabled", false);
    }
  });
  $("#edit_post_btn_e").hover(function () {
    tinyMCE.triggerSave();
  });
  $("#add_new_post").hover(function () {
    tinyMCE.triggerSave();
  });

  $(".del-post-btn").click(function (e) {
    var post_id_del = $(this).attr("id");
    e.preventDefault();
    $.ajax({
      url: "./controller/controller.php",
      method: "post",
      data: {
        post_id_del: post_id_del,
      },
      success: function (data) {
        location.reload();
        return false;
      },
    });
  });
});
