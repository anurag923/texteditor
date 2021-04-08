<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
    <span id="source" style="display:none">
        {{$data->image}}
    </span>
    <script>
    $(document).ready(function(){
        var image = new Image();
//Just getting the source from the span. It was messy in JS.
        image.src = document.getElementById('source').innerHTML;
        document.body.appendChild(image);
    })
    </script>
</body>
</html>