<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <nav>
            <a href="{{route('home')}}">Return home</a>
        </nav>
    </header>
    <video height="200" width="400" src="" id="scanner"></video>
    <script>
        setTimeout(() => {
            const videoElem = document.getElementById('scanner');
            const qrScanner = new QrScanner(
                videoElem,
                result => document.location.href = result, 
            );
            qrScanner.start();
        }, 500);
    </script>

    <p>de link voor werkende camera: https://ticketsystem.test/scan</p>
</body>
</html>