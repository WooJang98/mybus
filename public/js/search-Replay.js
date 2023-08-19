$(document).ready(function () {
    $(".replay-mode").submit(function (event) {
        event.preventDefault();

        var formData = {
            // client: $(".client_r").val(),
            car_id: $("#replay-select").find("option:selected").data("id"),
            // vnum: $(this).find(".vnum").val(),
            // date: $(".date-picker.selected").attr("date"), //date
            from: $(".date-picker.selected").attr("date"), //date
            to: $(".date-picker.selected").attr("date"), //date
        };
        

        $.ajax({
            type: "GET",
            url: "/searchReplay",
            data: formData,
            dataType: "json",
            
            success: function (response) {
                console.log(response);
                
                var tableContent = updateTripTable(response);
                $("#trip-table").html(tableContent);
            },
                
            error: function (error) {
                console.error("오류 발생:", error);
            },
        });
    });
});

