$(document).ready(function () {
    state = false;
    id = "editable";
    md = $('#raw').val();
    var content = new SimpleMDE({
        element: $("textarea#" + id)[0],
        initialValue: md,
    });
    html = content.options.previewRender(md);
    $('#html_container').wrapInner(html);

    $("button").click(function () {
        if (state) {
            $("div#editor_container").css('display', 'none');
            // Show markdown rendered by CodeMirror
            $('#html_container').wrapInner(content.options.previewRender(content.value()));
        } else {
            // Show editor
            $("div#editor_container").css('display', 'inline');
            // Do a refresh to show the editor value
            content.codemirror.refresh();
            $('#html_container').empty();
        };
        state = !state;
    });
});
