$(document).ready(function() {
  $("#add-attachments").click(function() {
    var html = $("#clone").html();
    $(".increment").after(html);
  });
  $("body").on("click", ".btn-danger", function() {
    $(this).parents(".control-group").remove();
  });
});

$(document).ready(function() {
  $("#keywords-add").click(function() {
    var html = $("#clone-keywords").html();
    $(".increment-keywords").after(html);
  });
  $("body").on("click", "#keywords-remove", function() {
    $(this).parents("#form-keyword").remove();
  });
});
