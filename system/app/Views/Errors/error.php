<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Error - 404</title>
	<link rel="stylesheet" href="<?= CSS_VENDORS?>style-starter.css">
</head>
<body>

 <section>
    <!-- content -->
    <div class="error-bg">
        <!-- error -->
        <section class="error py-md-5 py-3">
            <div class="card-body">
                <div class="error-info">
                    <div class="error__404">404</div>
                    <div class="not__found">Page not found</div>
                    <p class="error-text my-3 mb-4">Oops! La pagina que busca fue eliminada, o la direccion no existe.</p>
                    <a class="btn btn-style btn-primary" href="<?= base_url()?>">Volver atras</a>
                </div>
            </div>
        </section>
        <!-- //error -->
    </div>
    <!-- //content -->
</section>
</body>
</html>