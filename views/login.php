<?php
	session_start();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email = $_POST['email'];
		$password = $_POST['password'];

		include '../controllers/conection.php';
		
		//include '../js/firebase.js'

		// Consulta para buscar al usuario en la base de datos
		$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
		$result = mysqli_query($mysqli, $sql);

		// Si se encontró al usuario, se inicia sesión y se redirige a la página principal
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['id'] = $row['id'];
			header("Location: ../home.php");
			exit();
		} else {
			// Si no se encontró al usuario, se muestra un mensaje de error
			$_SESSION['error'] = "El correo electrónico o la contraseña son incorrectos";
			header("Location: ../index.php");
			exit();
		}
	}
?>

<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1></h1>
				<!-- Formulario de inicio de sesión -->
				<form action="views/login.php" method="post">
					<div class="form-group">
						<label for="email">Correo electrónico:</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
					<div class="form-group">
						<label for="password">Contraseña:</label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<button type="submit" class="btn btn-primary">Iniciar sesión</button>
				</form>
				<!-- Enlace a la página de registro -->
				<p>¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
			</div>
		</div>
	</div>
