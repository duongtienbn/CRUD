<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    {{-- <scripts src="{{ asset('/js/sesion.js') }}"></scripts> --}}

</head>

<body>
    <div class="box"></div>
    <script>
        // var id = '23';
        // function test(tien,tien2) {
        //     // console.log(tien2);
        //     tien(12);
        //     tien2(16);
        // }

    //     Array.prototype.map2 = function(callback) {
    //         var arrayLength = this.length;

    //         for (var i = 0; i < arrayLength; i++) {
    //             var result = callback(this[i], i);
    //             console.log('gia tri:',result);
    //         }
    //     }
    //     var courses = [
    //         'java',
    //         'php',
    //         'javascript',
    //         'react'
    //     ]

    // var    html = courses.map2(function(course) {
    //         // console.log(typeof course);
    //         return '<h2>${course}</h2>';
    //     });

        // function mycallback(value){
        // console.log('gia tri la',value);
        // }
        
        // test(mycallback,mycallback);

        // var headingElement = document.querySelector('.box')
        // headingElement.style.width = '100%';
        // headingElement.style.height = '100px';
        // headingElement.style.backgroundColor = 'red';
        // console.log(headingElement.style);


    </script>
</body>

</html>
