<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            background-color: #EFEFEF;
            text-align: center;
        }
        h1,h2,h3{
            text-align: center;
        }
        h2{
            font-size: 15px
        }
        h3{
            font-size: 2rem;
            color: rgb(255, 72, 0);
            font-weight: bold;
        }
        /*
        img{
            margin: 0 auto;
            width: 60%;
            height: 60%;
        }
            */

    </style>
</head>
<body>
       <!--
    <div class="container">
        <h1>Holaaaaaaaaaaaaaa Mi Amorcito Hermosa</h1>
        <h2>¡¡¡Quiero que sepas que Te Amoooooooooooooooo Mucho Muchisimo Demasiado Tantisimo Inmensamente Infinitamente Mi Lunita Preciosa!!!</h2>
        <h3>Atte: Tu novio el empalagoso que de verdad Te Ama Infinitamente</h3>
        <img src="https://i.pinimg.com/550x/44/dd/d2/44ddd271bd6dc4ca55a309542e21a1ab.jpg" alt="">
    </div>
     -->
    <div class="container">
        <h1>Gracias por registrarte {{$nameUser}} {{$lastnameUser1}} {{$lastnameUser2}}</h1>
        <h2>Tu código de verificacion de la cuenta es:</h2>
        <h3>{{$token}}</h3>
    </div>

</body>
</html>