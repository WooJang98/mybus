<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TabBox</title>
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/header.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tab.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/video.css') }}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

<div class="container-video-map">
    @foreach($replay_videos as $video)
        @php
            $outdoor_upper_path = asset($video->outdoor_upper_path);
            $outdoor_lower_path = asset($video->outdoor_lower_path);
            $indoor_upper_path = asset($video->indoor_upper_path);
            $indoor_lower_path = asset($video->indoor_lower_path);
        @endphp
        
        <div class="video-grid-item-monitor">
            <div class="video-head-monitor">
                <i class="fa-regular fa-circle-play" style="color: #ffffff;"></i>
                <i class="fa-regular fa-circle-stop" style="color: #ffffff;"></i>
                <i class="fa-solid fa-camera" style="color: #ffffff;"></i>
                <span class="video-head-text">"replay ver. outdoor upper video"</span>
            </div>
            <video controls width="455px" height="268px">
                <source src="{{ $outdoor_upper_path }}" type="video/mp4">
            </video>
        </div>

        <div class="video-grid-item-monitor">
            <div class="video-head-monitor">
                <i class="fa-regular fa-circle-play" style="color: #ffffff;"></i>
                <i class="fa-regular fa-circle-stop" style="color: #ffffff;"></i>
                <i class="fa-solid fa-camera" style="color: #ffffff;"></i>
                <span class="video-head-text">"replay ver. outdoor lower video"</span>
            </div>
            <video controls width="455px" height="268px">
                <source src="{{ $outdoor_lower_path }}" type="video/mp4">
            </video>
        </div>

        <div class="video-grid-item-monitor">
            <div class="video-head-monitor">
                <i class="fa-regular fa-circle-play" style="color: #ffffff;"></i>
                <i class="fa-regular fa-circle-stop" style="color: #ffffff;"></i>
                <i class="fa-solid fa-camera" style="color: #ffffff;"></i>
                <span class="video-head-text">"replay ver. indoor upper video"</span>
            </div>
            <video controls width="455px" height="268px">
                <source src="{{ $indoor_upper_path }}" type="video/mp4">
            </video>
        </div>

        <div class="video-grid-item-monitor">
            <div class="video-head-monitor">
                <i class="fa-regular fa-circle-play" style="color: #ffffff;"></i>
                <i class="fa-regular fa-circle-stop" style="color: #ffffff;"></i>
                <i class="fa-solid fa-camera" style="color: #ffffff;"></i>
                <span class="video-head-text">"replay ver. indoor lower video"</span>
            </div>
            <video controls width="455px" height="268px">
                <source src="{{ $indoor_lower_path }}" type="video/mp4">
            </video>
        </div>
    @endforeach
</div>

</body>

</html>