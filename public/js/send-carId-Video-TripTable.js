$("#trip-table").on("click", "tr", function () {
    //트립테이블 (tr)을 클릭했을 때 동작
    //car_id, departure_time를 video controller로 보낸다

    var car_id = $(this).data("id");
    var departure_time = $(this).find("#departure-id").text();
    var trData = {
        car_id: car_id,
        departure_time: departure_time,
    };

    //<tr>요소를 고르면 selected 속성 추가
    $(".trip-table-item").not(this).removeClass("selected");
    $(this).addClass("selected");

    $.ajax({
        type: "GET",
        url: "/sendCarIdVideofromTrip",

        data: trData,
        dataType: "json",
        success: function (response) {
            console.log(response);
        },
        error: function (error) {
            console.error("오류 발생 sendCarId - video - triptable");
            console.error("오류 발생:", error);
        },
    });
});
