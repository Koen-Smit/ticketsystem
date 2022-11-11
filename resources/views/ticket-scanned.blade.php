<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        @if($ticket->scanned_at)
            Ticket already redeemed!
        @else
            Ticket scanned!
        @endif
    </h1>
    <a href="{{route('scan')}}">Back to scanner</a>
</body>
</html>