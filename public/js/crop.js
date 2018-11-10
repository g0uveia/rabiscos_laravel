$(document).ready(function() {
    $("input[name='img']").on("change", function() {
        var image = document.getElementById('image');
        var files = $(this)[0].files;
        var file = files[0];
        $("#image").attr("src", window.URL.createObjectURL(file));

    })
});
