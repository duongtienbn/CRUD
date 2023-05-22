<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkStaff人材管理アプリ </title>

    {{-- <link rel="stylesheet" href="{{ asset('skillColumn.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('search.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/pagination.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link
        rel="stylesheet"href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/3d01baf2d7.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="background">
        <style>
            /* .background {
                width: 100%;
                height: 100vh;
                 background: url('/images/background.jpg
                 
                }
                background-size: contain; */
        </style>
        @yield('content')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
    </div>
</body>

</html>
