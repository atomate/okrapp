<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    Please update the status for your key results - [link].
</div>

<div>
    You have the following Key results assigned:
</div>
@foreach($results as $collection)
    @foreach($collection as $result)
        {{$result->name}}<br>
    @endforeach
@endforeach
</body>
</html>
