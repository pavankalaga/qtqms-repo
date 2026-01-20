@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation List</title>
    <style>

    </style>
</head>

<body>
    <div class="main ">
        <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
            <div style="font-size: 20px;">Validation List</div>
            <div style="font-size: 20px;">
                <select>
                    <option value="">-- Select Labs --</option>
                    <option value="pathology">Lab 1</option>
                    <option value="microbiology">Lab 2</option>
                    <option value="biochemistry">Lab 3</option>
                </select>
            </div>
        </div>

    </div>
</body>

</html>


@endsection