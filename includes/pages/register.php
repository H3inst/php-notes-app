<?php
if (isset($_SESSION["isLogged"])) {
    if ($_SESSION["isLogged"] == 1) {
        header("Location: home");
    }
}

?>
<div class="container d-flex h-100 justify-content-center align-items-center">
    <form method="POST" class="w-50 mt-5">
        <h1 class="text-center mb-5"><strong>Registro</strong></h1>
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label>Correo electrónico</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
            <label>Confirmar contraseña</label>
            <input type="password" class="form-control" name="confirm_password" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Registrarse</button>
        <p class="lead text-center mt-4">¿Ya tienes una cuenta? <a href="login">Iniciar sesión</a></p>
        <?php
        $register = FormController::getRegister();
        if ($register == "password_do_not_match") {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>¡Error!</strong> Asegúrese de que las contraseñas coincidan.
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
        if ($register == 1) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Grandioso!</strong> Su usuario ha sido registrado con éxito. Haga click
                 <a href="login">aquí</a> para iniciar sesión.
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

        if ($register == "invalid_character") {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>¡Error!</strong> Usted ha insertado caracteres inválidos.
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
        if ($register == "invalid_email") {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>¡Error!</strong> El correo que intenta usar, ya ha sido utilizado.
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