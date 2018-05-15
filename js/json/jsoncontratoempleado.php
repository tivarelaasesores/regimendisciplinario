<?php
	Include('../../Conexion.php');
	$Cone = new Conexion();
	echo json_encode($Cone->Select_Empleados());
?>