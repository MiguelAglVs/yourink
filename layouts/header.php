<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1,
			shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Carrito de Compras</title>
	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
	<!-- Fuentes e iconos-->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" as="font" crossorigin="crossorigin">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preload" href="https://fonts.googleapis.com/icon?family=Material+Icons" as="font" crossorigin="crossorigin">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700" as="font" crossorigin="crossorigin">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
	<!-- Bootstrap -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" as="style" crossorigin="crossorigin">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- Localcss -->
    <link rel="preload" href="assets/css/main.css" as="style">
	<link href="assets/css/main.css" rel="stylesheet" />
    <!--<link rel="preload" href="assets/img/87fcd098d14162c6c7f2a9463d6a4b33.jpg" as="image">-->
</head>

<body>
	<!-- Nav -->
	<nav class="navbar bg-red">
		<div class="container-fluid">
			<a href="index.php"><img src="./assets/img/logo.png" width="160" alt=""></a>
			<button class="navbar-toggler btn-dark position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
				<i class="fa-solid fa-cart-shopping fa-1x"></i>
				<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
					<?php
					echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
					?>
					<span class="visually-hidden">unread messages</span>
			</button>
			<div class="offcanvas offcanvas-end" tabindex="1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
				<div class="offcanvas-header">
					<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Carrito</h5>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body">
					<form class="col-md-12" method="post">
						<div class="table table-responsive-sm">
							<?php if (!empty($_SESSION['CARRITO'])) { ?>
								<table class="table table-ligth table-borderless table-hover">
									<thead>
										<tr>
											<th whidth="15" class="text-center">Producto</th>
											<th whidth="20" class="text-center">Precio</th>
											<th whidth="20" class="text-center">Cantidad</th>
											<th whidth="5" class="text-center">Total</th>
										</tr>
									</thead>
									<tbody>
										<?php $total = 0; ?>
										<?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
											<tr>
												<td whidth="15" class="text-center align-center text-wrap"><img loading="lazy" src="assets/img/<?php echo $producto['IMAGEN'] ?>" width="50px" alt="Close modal" /> <?php echo $producto['NOMBRE'] ?></td>
												<td whidth="20" class="text-center pt-5"><?php echo number_format($producto['PRECIO']) ?></td>
												<td whidth="20" class="text-center pt-5"><?php echo $producto['CANTIDAD'] ?></td>
												<td whidth="5" class="text-center pt-5"><?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD']) ?></td>
												<form action="" method="post">
													<input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
													<td class="position-relative"><button class="position-absolute top-30 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2" type="submit" name="btnAccion" value="Eliminar"><i class="fa-solid fa-x fa-lg"></i></button></td>
												</form>
											</tr>
											<?php $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']); ?>
										<?php } ?>
									</tbody>
								</table>
						</div>
						<div class="d-grid gap-2">
							<a href="mostrarcarrito.php" class="btn btn-primary" id="btnCarrito">Iniciar compra</a>
						</div>
					<?php } else { ?>
						<ul>
							<a class="dropdown-item disabled">
								Tu carrito está vacío.
							</a>
						</ul>
					<?php } ?>
					</form>
				</div>
			</div>
		</div>
	</nav>