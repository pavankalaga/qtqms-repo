@extends('layouts.base')
@section('content')

<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Library</title>
    <style>

    </style>
</head>

<body>
    <div class="main ">
        <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
            <div style="font-size: 20px;">Training Library</div>
            <input type="file" class="form-control" style="width: auto;">
        </div>
        <div class=" d-flex " style="gap:15px">
            <div class="card" style=" width:300px">
                <video autoplay src="https://videos.pexels.com/video-files/8115432/8115432-uhd_2732_1440_25fps.mp4" muted
                    loop></video>
            </div>
            <div class="card" style=" width:300px">
                <img src="https://www.shutterstock.com/shutterstock/videos/1080592481/thumb/1.jpg?ip=x480" width="100%" alt="">


            </div>
            <div class="card" style=" width:300px">
                <img src="https://www.shutterstock.com/shutterstock/videos/1080592481/thumb/1.jpg?ip=x480" width="100%" alt="">


            </div>

        </div>
    </div>

    <script>

    </script>
</body>

</html>

@endsection