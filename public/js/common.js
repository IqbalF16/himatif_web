// $(document).ready(function () {
    function myFunction(url) {
        var copyText = url;
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");

        // var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Copied: " + copyText.value;
    }

    // function outFunc() {
        // var tooltip = document.getElementById("myTooltip");
        // tooltip.innerHTML = "Copy to clipboard";
    // }
// });
