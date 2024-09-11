<?php
require ("logica/Administrador.php");
// require ("logica/Cliente.php");
?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1>holaaa</h1>
    <div class="container">
		<div class="row mb-3">
			<div class="col">
				<div class="card border-primary">
					<div class="card-header text-bg-info">Administrador</div>
					<div class="card-body">
    					<?php
    					$i=0;
                        $admin = new Administrador();
                        $admins = $admin->consultarTodos();
                        foreach ($admins as $adminActual) {
                            if($i%4 == 0){
                                echo "<div class='row mb-3'>";
                            }
                            echo "<div class='col-lg-2 col-md-3 col-sm-4' >";
                            echo "<div class='card text-bg-light'>";
                            echo "<div class='card-body'>";
                            echo "<div class='text-center'><img src='https://icons.iconarchive.com/icons/custom-icon-design/mono-general-1/256/faq-icon.png' width='50%' /></div>";
                            echo "Nombre" . $adminActual->getNombre() . "<br>";
                            echo "apellido: " . $adminActual->getApellido() . "<br>";
                            echo "correo: " . $adminActual->getCorreo();
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            
                            if($i%4 == 3){
                                echo "</div>";
                            }
                            $i++;
                        }
                        if($i%4 != 0){
                            echo "</div>";
                        }
                        ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>