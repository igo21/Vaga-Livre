<html>
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin=""/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.0.3/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js"></script>
    <script src='https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster-src.js'></script>

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
//$vaga = Vaga::listarVaga();

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
            maxZoom: 19,
            watch:true
        });
        basemap.addTo(map);
        icon = L.divIcon({
            className: 'custom-div-icon',
            html: "<div class='marker-pin'></div><i style='font-size: 45px;color:#9400D3; ' class='fa fa-car'></i>",
            iconSize: [30, 42],
            iconAnchor: [15, 42]
        });
        var Disponivel = L.divIcon({
            html: '<i class="fa fa-product-hunt" style="color: blue"></i>',

            className: 'myDivIcon'
        });
        var Indisponivel = L.divIcon({
            html: '<i class="fa fa-product-hunt" style="color: red"></i>',
            iconSize: [20, 20],
            className: 'myDivIcon'
        });

        var marker = L.marker([coordenada[0],coordenada[1]], {
            icon: icon
        }).addTo(map);

        var marker4 = new Array();
        //var marker2;

        var i =1;
        function popula_mapa() {
            //var contador=0;
            //alert(marker4);
            for (var j = 0; j < marker4.length; j++) {
                map.removeLayer(marker4);
                //marker4=[];
                //marker4.pop();
                //alert('removendo um');
                //marker4=[];
            }
            <?php
            $contador=0;//serve para matriz de pontos no mapa.
            $vaga = Vaga::listarVaga();
            foreach ($vaga as $v){
            if($v['disponivel']=='s'){ ?>

            var marker2 = new L.marker([<?php echo $v['latitude'];?>, <?php echo $v['longitude'];?>], {
                icon: Disponivel
            });
            marker4.push(marker2);
            map.addLayer(marker4[<?php echo $contador?>]);
            <?php
            }
            $contador = $contador+1;
            ?>
            <?php
            }

            ?>
            //map.addLayer(markers4);
            //var marker = L.marker([event.location.lat, event.location.lng]);
            //map.removeLayer(marker2);

            //alert("tesste "+ i);
            if (i==5){
                i=0;
            }
            i=i+1;
            //console.log("Voce nao deve executar esta funcao!");

        }
        var interval = setInterval(popula_mapa,5000);


    });

</script>

</body>
</html>

