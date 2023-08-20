<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>card</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            max-height: 100vh;
        }
    </style>
</head>

<body>
    <div class="" style="text-align: center">
        <h1 style="font-size: 128px">
            {{$participant->id}}
            <!-- 51 -->
        </h1>
        <p style="font-size: 64px">{{$participant->participant_name}}</p>
        <p style="font-size: 64px">{{$participant->sport_name}}</p>
    </div>
</body>

</html>