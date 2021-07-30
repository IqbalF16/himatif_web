$(document).ready(function () {
    $('#add-form').on('click', function (event) {
        event.preventDefault();
        window.open($(this).attr("href"), "popupWindow", "width=600,height=600,scrollbars=yes");
    });

    $('#iframe').keyup(function () {
        data = $('#iframe').val();
        $('#preview').html(data);
    });

    data = $("[id^='iframe_edit_']").val();
    $("[id^='preview-edit-']").html(data);

    $("[id^='iframe_edit_']").keyup(function () {
        data = $("[id^='iframe_edit_']").val();
        $("[id^='preview_edit_']").html(data);
        console.log(data);
    });
});
