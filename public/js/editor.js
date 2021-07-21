var simplemde = new SimpleMDE({ element: document.getElementById("markdown") });
$("#markdown").keyup(function (event) {
    text = $(this).val();
    $("#preview").html(text);
});
simplemde.codemirror.on("change", function(){
	$('#result').val(simplemde.value());
});

$(document).ready(function () {
    $('#btn-preview').click(function (e) {
        var markdown = simplemde.value();
        $('#preview').html(markdown);
    });

    $('#thumbnail').on('change', function (){
        $('#thumbnail-preview').attr('src', $('#thumbnail').val());
    });
});
