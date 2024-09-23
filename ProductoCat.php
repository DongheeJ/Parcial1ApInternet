<?php
require ("logica/Producto.php");
?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
		<div class="row mb-3">
			<div class="col">
				<div class="card border-primary">
					<div class="card-header text-bg-info">Tienda Anonima</div>
					<div class="card-body">
    					<?php
                        $category = isset($_GET['categoria']) ? $_GET['categoria'] : '';
    					$i=0;
                        $producto = new Producto();
                        $productos = $producto->consultarCategoria($category);
                        foreach ($productos as $productoActual) {
                            if($i%4 == 0){
                                echo "<div class='row mb-3'>";
                            }
                            echo "<div class='col-lg-2 col-md-3 col-sm-4' >";
                            echo "<div class='card text-bg-light'>";
                            echo "<div class='card-body'>";
                            echo "<div class='text-center'><img src='https://icons.iconarchive.com/icons/custom-icon-design/mono-general-1/256/faq-icon.png' width='70%' /></div>";
                            echo "<a href='#'>" . $productoActual->getNombre() . "</a><br>";
                            echo "Cantidad: " . $productoActual->getCantidad() . "<br>";
                            echo "Valor: $" . $productoActual->getPrecioVenta();
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