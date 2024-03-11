<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrxap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h2>YouEvento</h2>
    <h4>Title: {{$reservation->ticket->event->title}}</h4>
    <h4>Description: {{$reservation->ticket->event->description}}</h4>
    <h4>Ticket: {{$reservation->ticket->ticket_name.': '.$reservation->ticket->ticket_price}} DH</h4>
</body>

</html>