<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <p>Hello, {{ $name }}!</p>
    <p>Thank you for registering.</p>
    <p>You can now visit and login on the website <a href="{{ $app_url }}">here</a></p>
    <p>Thank you and welcome to Kredo IG!</p>

    <img src="{{ url('https://www.google.co.jp/imgres?q=dog&imgurl=https%3A%2F%2Fwww.nylabone.com%2F-%2Fmedia%2Fproject%2Foneweb%2Fnylabone%2Fimages%2Fdog101%2Factivities-fun%2F10-great-small-dog-breeds%2Fmaltese-portrait.jpg&imgrefurl=https%3A%2F%2Fwww.nylabone.com%2Fdog101%2F10-great-small-dog-breeds&docid=ZntwBSdiAbsxpM&tbnid=0xOi4YRPOkPO_M&vet=12ahUKEwjVxLTw9oeFAxXhY_UHHRZvDmYQM3oECCsQAA..i&w=740&h=448&hcb=2&ved=2ahUKEwjVxLTw9oeFAxXhY_UHHRZvDmYQM3oECCsQAA')}}" alt="dog">
</body>
</html>