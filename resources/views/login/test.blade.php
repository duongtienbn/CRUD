<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="{{ asset('/js/sesion.js') }}"></script>

</head>
<body>
    <input type="text" id="inputValue">
<button type="button" id="saveButton">Save to session</button>


<div>
    <select name="" id="select">
    </select>
</div>
</body>
</html>