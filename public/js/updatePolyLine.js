function updatePolyline(response, target) {
    var formattedCoords = response.formattedPositions;

    var linePath = [];
    formattedCoords.forEach((element) => {
        var lat = element.position_y;
        var lng = element.position_x;
        linePath.push(new kakao.maps.LatLng(lat, lng));
    });

    var polyline = new kakao.maps.Polyline({
        map: target,
        path: linePath,
        strokeWeight: 3,
        strokeColor: "#FF00FF",
        strokeOpacity: 0.8,
        strokeStyle: "solid",
    });
    
    polyline.setMap(target);
    var startLat = formattedCoords[0].position_y;
    var startLng = formattedCoords[0].position_x;
    target.setCenter(new kakao.maps.LatLng(startLat, startLng));
}

// var markers = [];

// var marker = new kakao.maps.Marker({
//     map: map,
//     position: new kakao.maps.LatLng(33.450701, 126.570667),
//     image: markerImage,
//     draggable: false,
//     clickable: false,
//     opacity: 0.7,
// });


// var markerImage = new kakao.maps.MarkerImage(
//     'app/public/pictures/pngegg.png', // 아이콘 이미지 경로
//     new kakao.maps.Size(24, 24), // 아이콘 크기
//     { offset: new kakao.maps.Point(12, 12) } // 아이콘 중심 위치?????????/
// );

