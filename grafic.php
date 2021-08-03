<?php
require_once "conexion/conexion.php";

$conexion = conexion();

//Se consultan la fecha de venta con sus montos
$sql = "SELECT fechaVenta, montoVenta from ventas order by fechaVenta";
$result = mysqli_query($conexion,$sql);

//Se preparan los arreglos para almacenar cada información
  $valoresY=array();//Montos
  $valoresX=array();//Fechas

//El while es para leer la información de la consulta realizada para ser almacenada en los arreglos.
  while($ver = mysqli_fetch_row($result)){
    $valoresY[]=$ver[1];
    $valoresX[]=$ver[0];
  }

//Los arreglos se convierten en formato JSON para poder ser procesados en JavaScript.
  $datosX=json_encode($valoresX);
  $datosY=json_encode($valoresY);


  ?>
  <!--div para contener la gráfica y pueda ser mandando al index-->
  <div id = "graficaLineal" ></div>

  <!--Script que contendra la función para poder estraer información del JSON-->
  <script type="text/javascript">
  //Funcion para convertir JSON a arreglo JavaScript
  function crearCadenaLineal(json){
    var parsed = JSON.parse(json);
    var arr = [];

    for(var x in parsed){
      arr.push(parsed[x]);
    }

    return arr;
  }

</script>

<!--Script que contiene el código del gráfico-->
<script type="text/javascript">
  //Se recibe la información de la clase crearCadena para que puedan ser graficados
  datosX = crearCadenaLineal('<?php echo $datosX ?>');//fecha
  datosY = crearCadenaLineal('<?php echo $datosY ?>');//monto

  var x1 = datosX;
  var x2 = datosY;

  //La información se entrega para poder ser graficado
  var trace1 = {
    x: x1,
    y: x2,
    type: "bar",
    opacity: 0.5,
    marker: {
      color: 'green',
    }
  }

  var layout = {
    barmode: "overlay",
    title: 'Gráfica de barra',
    xaxis: {
      title: 'Fechas'
    },
    yaxis: {
      title: 'Montos'
    }
  };

var data = [trace1];
Plotly.newPlot('graficaLineal', data, layout);

</script>