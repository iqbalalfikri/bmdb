function showTime() {
    var date = new Date();
    document.getElementById('time').innerHTML =
        (date.getFullYear()) + '-' +
        ('0' + (date.getMonth() + 1)).slice(-2) + '-' +
        ('0' + date.getDate()).slice(-2) + ' ' +
        ('0' + date.getHours()).slice(-2) + ':' +
        ('0' + date.getMinutes()).slice(-2) + ':' +
        ('0' + date.getSeconds()).slice(-2);
}
$(".custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).next('.custom-file-label').html(fileName);
});

setInterval(showTime, 1000);
