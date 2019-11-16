<html>
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin=""/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .barra{
            height: 100px;
            width: auto;
        }
        .cor-lb{
            color: #fff;
            font-family: "Arial";
            font-weight: 800;
            font-size: 40px;
            padding-left: 40%;
        }
        .local{
            background-color: #9400D3;
            padding: 0 0 0 0;
        }
        a{
            text-decoration: none;
        }
        #location-map{
            background: #fff;
            border: none;
            height: 100%;
            width: 100%;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        .marker-pin {
            width: 60px;
            height: 60px;
            border-radius: 50% 50% 50% 0;
            background: #9400D3;
            position: absolute;
            transform: rotate(-45deg);
            left: 50%;
            top: 50%;
            margin: -15px 0 0 -15px;
        }

        .marker-pin::after {
            content: '';
            width: 54px;
            height: 54px;
            margin: 4px 0 0 2px;
            background: #fff;
            position: absolute;
            border-radius: 50%;
        }

        .custom-div-icon i {
            position: absolute;
            width: 22px;
            font-size: 22px;
            left: 0;
            right: 0;
            margin: 10px auto;
            text-align: center;
        }

        .custom-div-icon i.awesome {
            margin: 12px auto;
            font-size: 17px;
        }
        .myDivIcon {
            text-align: center; /* Horizontally center the text (icon) */
            line-height: 20px; /* Vertically center the text (icon) */
        }
    </style>
</head>
<body class="local">
<header class="barra">
    <div class="barra">
        <a href="https://sisinfo.ml/"><label class="cor-lb">Vaga Livre</label></a>
    </div>
</header>
<?php
//require_once "Conexao.php";
require_once "Vaga.php";
$vaga = Vaga::listarVaga();

?>
<div class="local" id="location-map"></div>

<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js" integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg==" crossorigin=""></script>

<script type="text/javascript">

    navigator.geolocation.getCurrentPosition(function (position) {

        var lat = position.coords.latitude;
        var long = position.coords.longitude;
        function retornaLoc() {
            var lat = position.coords.latitude;
            var long = position.coords.longitude;
            var coord = [lat,long];
            return coord;
        }
        var coordenada = retornaLoc();

        var map = L.map(document.getElementById('location-map'), {
            center: [coordenada[0],coordenada[1]],
            zoom: 15
        });
        var basemap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        });
        basemap.addTo(map);
        icon = L.divIcon({
            className: 'custom-div-icon',
            html: "<div class='marker-pin'></div><i style='font-size: 45px;color:#9400D3; ' class='fa fa-car'></i>",
            iconSize: [30, 42],
            iconAnchor: [15, 42]
        });
    });



    //var marker = L.marker([-8.8012749,-63.8716484], {
    //icon: icon
    //}).addTo(map);


</script>

</body>
</html>

<!--bacup 2:

<html>
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin=""/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .barra{
            height: 100px;
            width: auto;
        }
        .cor-lb{
            color: #fff;
            font-family: "Arial";
            font-weight: 800;
            font-size: 40px;
            padding-left: 40%;
        }
        .local{
            background-color: #9400D3;
            padding: 0 0 0 0;
        }
        a{
            text-decoration: none;
        }
        #location-map{
            background: #fff;
            border: none;
            height: 100%;
            width: 100%;
        }
        .marker-pin {
            width: 60px;
            height: 60px;
            border-radius: 50% 50% 50% 0;
            background: #9400D3;
            position: absolute;
            transform: rotate(-45deg);
            left: 50%;
            top: 50%;
            margin: -15px 0 0 -15px;
        }

        .marker-pin::after {
            content: '';
            width: 54px;
            height: 54px;
            margin: 4px 0 0 2px;
            background: #fff;
            position: absolute;
            border-radius: 50%;
        }

        .custom-div-icon i {
            position: absolute;
            width: 22px;
            font-size: 22px;
            left: 0;
            right: 0;
            margin: 10px auto;
            text-align: center;
        }

        .custom-div-icon i.awesome {
            margin: 12px auto;
            font-size: 17px;
        }
        .myDivIcon {
            text-align: center; /* Horizontally center the text (icon) */
            line-height: 20px; /* Vertically center the text (icon) */
        }
    </style>
</head>
<body class="local">
<header class="barra">
    <div class="barra">
        <a href="https://sisinfo.ml/"><label class="cor-lb">Vaga Livre</label></a>
    </div>
</header>
<?php
//require_once "Conexao.php";
require_once "Vaga.php";
$vaga = Vaga::listarVaga();

?>
<div class="local" id="location-map"></div>

<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js" integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg==" crossorigin=""></script>

<script type="text/javascript">

    navigator.geolocation.getCurrentPosition(function (position) {

        var lat = position.coords.latitude;
        var long = position.coords.longitude;
        function retornaLoc() {
            var lat = position.coords.latitude;
            var long = position.coords.longitude;
            var coord = [lat,long];
            return coord;
        }
        var coordenada = retornaLoc();

        var map = L.map('location-map').setView([	coordenada[0],coordenada[1]], 19);


        var basemap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        });
        basemap.addTo(map);
        icon = L.divIcon({
            className: 'custom-div-icon',
            html: "<div class='marker-pin'></div><i style='font-size: 45px;color:#9400D3; ' class='fa fa-car'></i>",
            iconSize: [30, 42],
            iconAnchor: [15, 42]
        });
        Disponivel = L.divIcon({
            html: '<i class="fa fa-product-hunt" style="color: blue"></i>',
            iconSize: [20, 20],
            className: 'myDivIcon'
        });
        Indisponivel = L.divIcon({
            html: '<i class="fa fa-product-hunt" style="color: red"></i>',
            iconSize: [20, 20],
            className: 'myDivIcon'
        });



        var marker = L.marker([coordenada[0],coordenada[1]], {
            icon: icon
        }).addTo(map);
    });

</script>

</body>
</html>

-->