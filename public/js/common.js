$(document).ready(function(){
    $('#copy').on("click", function(){
        value = $(this).data('clipboard-text'); //Upto this I am getting value

        var $temp = $("<input>");
          $("body").append($temp);
          $temp.val(value).select();
          document.execCommand("copy");
          $temp.remove();
    })
})
