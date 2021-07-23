i = 0;
$(document).ready(function () {
    $('#add-form').click(function (e) {
        i++;
        raw = '<div class="form-group border rounded p-1"><input type="text" class="form-control label" name="label' + i + '" id="label' + i + '" placeholder="Label' + i + '..." required> <input type="text" class="form-control" name="input' + i + '" id="input' + i + '" placeholder="Input' + i + '..."></div > '
        $('#layout-editor').append(raw);
        console.log('#label' + i);

        preview = '<div class="form-group"><label for="preview-label' + i + '">Preview Label' + i + '</label><input type="text" class="form-control" name="preview-input' + i + '" id="preview-input' + i + '"placeholder="Preview Input' + i + '..." required></div>';
        $('#layout-preview').append(preview);
    });
    $('#delete-form').click(function (){
        $('#label'+i).parent().remove();
        $('#preview-input'+i).parent().remove();
        i--;
    });
});

// $('.label').on('change', function(){
//     console.log('label');
// });
