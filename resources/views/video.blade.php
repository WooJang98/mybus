<!DOCTYPE html>
<html>
<head>
    <title>Video List</title>
</head>
<body>
    <h1>Video List</h1>
    <ul>
        @foreach($videos as $video)
            <li>
                <video width="320" height="240" controls>
                    <source src="{{ asset($video->video_path) }}" type="video/mp4">   
                </video>
                <p>{{ $video->video_name }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>