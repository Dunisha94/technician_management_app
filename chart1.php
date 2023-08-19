<?php
$dataPoints = array(
	array("y" => 5, "label" => "Project 1"),
	array("y" => 4, "label" => "Project 2"),
	array("y" => 2, "label" => "Project 3"),
	array("y" => 5, "label" => "Project 4"),
	array("y" => 3, "label" => "Project 5"),
	array("y" => 2, "label" => "Project 6"),
	array("y" => 3, "label" => "Project 7"),
	array("y" => 4, "label" => "Project 8"),
	array("y" => 4, "label" => "Project 9"),
	array("y" => 1, "label" => "Project 10")
);
?>
<!DOCTYPE HTML>
<html>

<head>
	<script>
		window.onload = function() {

			var chart1 = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Ratings as Project wise"
				},
				axisY: {
					title: "Number of Ratings"
				},
				data: [{
					type: "line",
					dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart1.render();
		}
	</script>
</head>

<body>
	<div id="chartContainer" style="height: 370px; width: 100%;"></div>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>