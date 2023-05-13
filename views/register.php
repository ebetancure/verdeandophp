
<?php
	session_start();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		// Consulta para insertar al usuario en la base de datos
		$sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')";
		if (mysqli_query($mysqli, $sql)) {
			// Si se insertó al usuario correctamente, se inicia sesión y se redirige a la página principal
			$_SESSION['id'] = mysqli_insert_id($mysqli);
			header("Location: home.php");
			exit();
		} else {
			// Si hubo un error al insertar al usuario, se muestra un mensaje de error
			$_SESSION['error'] = "Error al registrar al usuario";
			header("Location: register.php");
			exit();
		}
	}
?>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <h1>Regístrate</h1>
        <!-- Formulario de registro -->
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
        <!-- Enlace a la página de inicio de sesión -->
        <p>¿Ya tienes cuenta? <a href="index.php">Inicia sesión</a></p>
    </div>
</div>
</div>
