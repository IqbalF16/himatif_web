var simplemde = new SimpleMDE({ element: document.getElementById("markdown") });
$("#markdown").keyup(function (event) {
    text = $(this).val();
    $("#preview").html(text);
});
var markdown = simplemde.value();
$.ajax({
    type: "POST",  //type of method
    url: "add",  //your page
    data: { markdown: markdown },// passing the values
    success: function (res) {
        //do what you want here...
    }
});
