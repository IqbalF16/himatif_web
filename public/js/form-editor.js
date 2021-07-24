$(function ($) {
    // $('#write').prop("disabled", true);
    formbuilder = $(document.getElementById('formbuilder')).formBuilder();
    $('#write').click(function () {
        // console.log(formbuilder.actions.getData());
        formbuilder.actions.save();
        data = formbuilder.actions.getData('json', true);
        $('#data').val(data);

        $('#write').prop('disabled', false);
        // $('#write').removeAttr('disabled')
        console.log();
    });
});
