$("#monitor-table").on("click", ".sendVrn-item", function () {
    //사이드바의 테이블 (tr)을 클릭했을 때 동작
    //추후에 트립조회의 두 달력 날짜 선택 후 제출 시 carId전달 가능
            var car_id = $(this).data("id");
            var IdData = {
                car_id: car_id,
            };
    
            // $(".sendVrn-item").removeClass("selected");
            // $(this).addClass("selected");
    
    
            $.ajax({
                type: "GET",
                url: "/sendCarIdtoVideofromMonitor",
                
                data: IdData,
                dataType: "json",
                success: function (response) {

//테스트는 차 1번을 고르세요

                    console.log("video-monitor-test");
                    var videoPath = response[0];
                    let arrPath = Object.keys(videoPath).map(item => videoPath[item]);
                    console.log(arrPath);
                    var video1 = $("#Monitor > div.container-video-map > div.video-grid-container-monitor > div:nth-child(1) > video");
                    var video2 = $("#Monitor > div.container-video-map > div.video-grid-container-monitor > div:nth-child(2) > video");
                    var video3 = $("#Monitor > div.container-video-map > div.video-grid-container-monitor > div:nth-child(3) > video");
                    var video4 = $("#Monitor > div.container-video-map > div.video-grid-container-monitor > div:nth-child(4) > video");
                    path1 = arrPath[3];
                    path2 = arrPath[5];
                    path3 = arrPath[7];
                    path4 = arrPath[9];
                    video1.attr = ("src", path1);
                    video2.attr = ("src", path2);
                    video3.attr = ("src", path3);
                    video4.attr = ("src", path4);

                    // for(let i = 1; i < arrPath.length(); i++){
                    //     `video${i}`.attr = ("src", "{{ asset(`${i}`) }}");

                    // };
    
                },
                error: function (error) {
                    console.error("오류 발생 send-carId-video");
                    console.error("오류 발생 :", error);
                },
            });
        });