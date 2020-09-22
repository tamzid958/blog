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
});
