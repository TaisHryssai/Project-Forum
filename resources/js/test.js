$(document).ready(function() {
    $(".keywords-add").click(function() {
      var html = $(".clone-keywords").html();
      $(".increment-keywords").after(html);
    });
    $("form").on("click", ".keywords-remove", function() {
      $(this).parents(".control-keywords").remove();
    });
  });