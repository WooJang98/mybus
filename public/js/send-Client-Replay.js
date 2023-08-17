$(document).ready(function () {

    $(".client_r").on('change', function () {

        var clientData = {
            client: $(this).val(),
        };

        $.ajax({
            type: "GET",
            url: "/sendClientReplay", 
            data: clientData,
            dataType: "json",

            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.error("오류 발생:", error);
            },
        });
    });
});