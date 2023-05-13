<?php
	// Conexión a la base de datos
	$host = "localhost";
	$username = "root";
	$password_db = "";
	$dbname = "app";
	$conn = mysqli_connect($host, $username, $password_db, $dbname);

	// Consulta para obtener las publicaciones más recientes
	$sql = "SELECT p.*, u.username FROM publications p INNER JOIN users u ON p.user_id = u.id ORDER BY creation_date DESC";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-md-12">';
		echo '<div class="card">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title">' . $row['username'] . '</h5>';
		echo '<p class="card-text">' . $row['content'] . '</p>';
		if ($row['img']) {
			echo '<img src="' . $row['img'] . '" class="card-img-top" alt="Imagen de la publicación">';
		}
		echo '<p class="card-text"><small class="text-muted">' . $row['creation_date'] . '</small></p>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
?>
