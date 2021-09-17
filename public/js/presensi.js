$.validator.addMethod("noSpace", function (value, element) {
    return value.indexOf(" ") < 0 && value != "";
}, "No space please and don't leave it empty");


$("#new-presensi").validate({
    rules: {
        title: "required",
        link: {
            required: true,
            noSpace: true
        }
    },
    messages: {
        title: "Please specify your title",
        link: {
            required: "We need your email address to contact you",
        }
    }
});