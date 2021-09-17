var timeleft = $('#timer').data('countdown');
time = timeleft;
console.log(timeleft);

var qrcode = new QRCode("qrcode", {
    text: $('#pin').html(),
    width: 128,
    height: 128,
    colorDark: "#000000",
    colorLight: "#ffffff",
    correctLevel: QRCode.CorrectLevel.H
});

var downloadTimer = setInterval(function () {
    if (timeleft == 0) {
        // clearInterval(downloadTimer);
        // document.getElementById("timer").innerHTML = time;
        timeleft = time;
        link = $('#link').val();
        $.ajax({
            url: "/admin/presensi/refresh",
            type: "GET",
            dataType: 'json',
            data: {
                link: link,
            },
            success: function (data) {

                // This here will print the
                // retrieved json on the console.
                console.log(data);
                document.cookie = "pin = " + data
                $('#pin').html(data);

                qrcode.clear();
                qrcode.makeCode($('#pin').html());
            },
            error: function () {
                console.log("Something went wrong");
            },
        });
        document.getElementById("timer").innerHTML = toTimeFormat(timeleft);
    } else {
        document.getElementById("timer").innerHTML = toTimeFormat(timeleft);

    }
    timeleft -= 1;
}, 1000);


$('#presensitoggle').on('change', function () {
    console.log($(this).prop('checked'));
    toggle = $(this).prop('checked');
    link = $('#link').val();
    $.ajax({
        url: "/admin/presensi/toggle",
        type: "GET",
        dataType: 'json',
        data: {
            link: link,
            toggle: toggle,
        },
        success: function (data) {

            // This here will print the
            // retrieved json on the console.
            console.log(data);
            // $(this).switchButton(data[])
        },
        error: function () {
            console.log("Something went wrong");
        },
    });
});

function toTimeFormat(seconds) {
    dateObj = new Date(timeleft * 1000);
    hours = dateObj.getUTCHours();
    minutes = dateObj.getUTCMinutes();
    seconds = dateObj.getSeconds();

    timeString = hours.toString().padStart(2, '0') + ':' +
        minutes.toString().padStart(2, '0') + ':' +
        seconds.toString().padStart(2, '0');

    return timeString;
}