<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$content = $_POST['content'];
	$user_id = $_SESSION['id'];

	$host = "localhost";
	$username = "root";
	$password_db = "";
	$dbname = "app";
	$conn = mysqli_connect($host, $username, $password_db, $dbname);

	// Subir imagen (si se ha seleccionado alguna)
	if ($_FILES['img']['name']) {
		$upload_dir = 'uploads/';
		$filename = $_FILES['img']['name'];
		$tmp_name = $_FILES['img']['tmp_name'];
		$extension = pathinfo($filename, PATHINFO_EXTENSION);
		$new_filename = uniqid() . '.' . $extension;
		move_uploaded_file($tmp_name, $upload_dir . $new_filename);
		$img = $upload_dir . $new_filename;
	} else {
		$img = '';
	}
	// Insertar publicación en la base de datos
	$sql = "INSERT INTO publications (user_id, content, img) VALUES ('$user_id', '$content', '$img')";
	if (mysqli_query($conn, $sql)) {
		header('Location: ../home.php');
		exit;
	} else {
		echo "Error al publicar: " . mysqli_error($conn);
	}
}