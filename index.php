<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Graficos de ventas</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.6.0.min.js"></script>
	<script src="librerias/plotly-2.3.0.min.js"></script>

</head>
<body>
	<!--Contenedores donde irá la gráfica-->
	<div class = "container">
		<div class = "row">
			<div class = "col-sm-21">
				<div class = "panel panel-primary">
					<div class = "panel panel-heading" style="text-align: center;">VENTAS REALIZADAS</div>
					<div class = "panel panel-body">
						<div class = "row">
							<div class = "col-sm-6">
								<!-- div donde se presetará la gráfica -->
								<div id = "grafico" style="width: 1150px;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

<!--Script de jquery para mandar a llamar las gráficas a la página index -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#grafico').load('grafic.php');
	});
</script>