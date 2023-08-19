$(document).ready(function () {
    $(".client_m").on("change", function () {
        var clientData = {
            client: $(this).val(),
            vnum: "",
        };

        $.ajax({
            type: "GET",
            url: "/sendClientMonitor",
            data: clientData,
            dataType: "json",

            success: function (response) {
                var carStatusArray = response.car_status;
                var vrnArray = response.VRN;
                var driverNameArray = response.driver_name;
                var carIdArray = response.car_id;
                var tableContent = '';
                for (var index = 0; index < carStatusArray.length; index++) {
                    console.log(index);
                    var carStatus = carStatusArray[index] ? 'Good' : 'Bad';
                    var vrn = vrnArray[index];
                    var driverName = driverNameArray[index];
                    var carId = carIdArray[index];
        
                    tableContent += "<tr class='sendVrn-item' data-id=" + carId+ ">";
                    
                    tableContent += "<td>" + carStatus + "</td>";
                    tableContent += "<td class='vrn-cell'>" + vrn + "</td>";
                    tableContent += "<td class='car_id-cell'>" + driverName + "</td>";
                    tableContent += "</tr>";
                }

                $("#monitor-table").html(tableContent);
                console.log(response);
                console.log(driverNameArray);
            },
            error: function (error) {
                console.error("오류 발생:", error);
            },
        });
    });
});

// <?php
                
//                 foreach ($cars['car_id'] as $index=>$car_id) {
                        
//                     echo "<tr class='sendVrn-item'>";
//                         echo"<td>" . ($cars['car_status'][$index] == true ? 'Good' : 'Bad') . "</td>";
//                         echo"<td class='vrn-cell'>{$cars['VRN'][$index]}</td>";
//                         echo"<td class='car_id-cell'>{$cars['driver_name'][$index]}</td>";
//                     echo "</tr>";
//                 }

//                 ?>

// 

                