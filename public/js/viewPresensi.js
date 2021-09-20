timeleft = $('#timer').data('countdown');
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
    $('#refresh').on('click', function () {
        timeleft = 0;
    });
    console.log(timeleft);
    if (timeleft == 0) {
        timeleft = $('#timer').data('countdown');
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

    let temp = timeleft % 2;
    // console.log(temp, timeleft);
    if (temp == 0) {
        link = $('#link').val();
        $.ajax({
            url: "/admin/presensi/refreshname",
            type: "GET",
            dataType: 'json',
            data: {
                link: link,
            },
            success: function (data) {
                // console.log(data);
                list = "";
                data.forEach(element => {
                    list += "<div class='btn btn-dark mx-2 my-1 col-lg-3'>" + element['nama'] + "</div>";
                    $('#presensidata').html(list);
                    // console.log(list);
                });
            },
            error: function () {
                console.log("Something went wrong");
            },
        });
        document.getElementById("isi").innerHTML = toTimeFormat(timeleft);
    } else {
        document.getElementById("isi").innerHTML = toTimeFormat(timeleft);
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