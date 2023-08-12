$(document).ready(function () {
    $("tbody tr").on("click", function () {
        var carId = $(this).find("td:nth-child(3)").text(); // Get the car_id from the third column
        $.ajax({
            type: "POST",
            url: "/process-car",
            data: {
                carId: carId,
            },
            success: function (response) {
                alert(response); // 서버로부터의 응답을 알림으로 표시
            },
        });
    });
});



