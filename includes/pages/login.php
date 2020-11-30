<?php
if (isset($_SESSION["isLogged"])) {
    if ($_SESSION["isLogged"] == 1) {
        header("Location: home");
    }
}

?>
<div class="container d-flex h-100 justify-content-center align-items-center">
    <form method="POST" class="w-50 mt-5">
        <h1 class="text-center my-5"><strong>Iniciar Sesión</strong></h1>
        <div class="form-group">
            <label>Correo electrónico</label>
            <input type="text" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary btn-block" name="submit">Iniciar sesión</button>
        <p class="lead text-center mt-4">¿Aún no tienes una cuenta? <a href="register">Regístrese
                aquí</a></p>

        <?php
        $login = FormController::userLogin();
        if ($login == "invalid_login") {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>¡Error!</strong> Usuario o contraseña inválidos.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            echo '<script>
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
        }
        ?>
    </form>

</div>