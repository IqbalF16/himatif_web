timeleft = $('#timer').data('countdown');
// console.log(timeleft);

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
    // console.log(timeleft);
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
    refreshdata();
    timeleft -= 1;
}, 1000);

link = $('#link').val();
$('#presensitoggle').on('change', function () {
    console.log($(this).prop('checked'));
    toggle = $(this).prop('checked');
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
            // console.log(data);
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

// $("[data-delete]").on('click', function () {
//     id = $(this).data('delete');
//     console.log(id)
//     $.ajax({
//         url: "/admin/presensi/remove",
//         type: "GET",
//         dataType: 'json',
//         data: {
//             link: link,
//             id: id,
//         },
//         success: function (data) {
//             console.log(data);
//             $(this).remove();
//         },
//         error: function (ts) {
//             console.log("error " + ts.status + " " + ts.statusText);
//         },
//     });
//     // console.log($(this).data('delete'));
// });

// $('#refreshdata').on('click', function () {
//     refreshdata();
// });

$("[data-file]").on('click', function () {
    file = $(this).data('file');
    console.log(file);
    downloaddata(link, file);
});

function downloaddata(link, file) {
    $('#tablepresensi').tableExport({
        fileName: link,
        type: file,
        ignoreColumn: [3]
    });
}

function refreshdata() {
    link = $('#link').val();
    list = "";
    $.ajax({
        url: "/admin/presensi/refreshname",
        type: "GET",
        dataType: 'json',
        data: {
            link: link,
        },
        success: function (data) {
            data = JSON.parse(data);
            console.log(data[0].nama);
            $('#presensidata').html("");
            for (i = 0; i < data.length; i++) {
                $('#presensidata').append('<tr><td>' +
                    data[i]["nama"] + '</td><td>' + data[i]["nim"] + '</td ><td>' + data[i]["datetime"] +
                    '</td></tr >');
            }

            // $('#presensidata').html(list);
        },
        error: function () {
            console.log("Something went wrong");
        },
    });
}