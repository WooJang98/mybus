var container_monitor = document.getElementById('map-monitor');
        var container_replay = document.getElementById('map-replay');
        var options = {
            center: new kakao.maps.LatLng(33.450701, 126.570667),
            level: 3
        };

        var map_monitor = new kakao.maps.Map(container_monitor, options);
        var map_replay = new kakao.maps.Map(container_replay, options);