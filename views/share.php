<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Compartir publicación</h1>
			<!-- Formulario de publicación -->
			<form action="views/post.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="content">Contenido:</label>
					<textarea class="form-control" id="content" name="content" rows="3"></textarea>
				</div>
				<div class="form-group">
					<label for="img">Imagen:</label>
					<input type="file" name="img" id="img">
					<div id="preview"></div>
				</div>
				<button type="submit" class="btn btn-primary">Compartir</button>
			</form>
		</div>
	</div>
</div>
