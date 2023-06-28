<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RegMex</title>

        <!-- Fonts -->
        <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
        <!-- Scripts -->
{{--        @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
        @vite('resources/js/app.js')



    </head>
    <!-- <body style="background-color: #bebed5"> -->
    <body>
    
        <div id="app"></div>
    
    </body>

    <style> 

        body { 
            /* Градиент */ 
            /* background: linear-gradient(#000, #fff) fixed; */
            /* background: -webkit-linear-gradient(180deg, rgb(94, 165, 221), rgb(118, 108, 208)); */
            /* background: -moz-linear-gradient(180deg, rgb(94, 165, 221), rgb(118, 108, 208)); */
            /* background: linear-gradient(180deg, rgb(94, 165, 221), rgb(118, 108, 208)); */
            background: linear-gradient(#b9deed, #efefef) fixed;
}
        
        
    </style>
</html>

