<?php
if (isset($_SESSION["isLogged"])) {
    if ($_SESSION["isLogged"] != 1) {
        header("Location: login");
        return;
    }
} else {
    header("Location: login");
    return;
}
$delete_note = NotesController::deleteNote();
if ($delete_note == 1) {
    echo '<script>
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
          </script>';
}
?>
<div class="container">
    <?php

    $note = NotesController::getNote();
    if ($note == 1) {
        echo '<script>
        if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
        }
          </script>';
    }
    if ($note == "invalid_characters") {
        echo '<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
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
    $user_id = $_SESSION["id"];
    $select_note = NotesController::showNotes($user_id);

    ?>
    <div class="row d-flex justify-content-between align-items-center">
        <h1 class="mt-5">Tus notas</h1>
        <!-- Modal Button -->
        <button class="btn btn-primary mt-5 btn-lg" data-toggle="modal" data-target="#exampleModal">+</button>
    </div>
    <div class="row mt-5 d-flex">

        <?php if (count($select_note) > 0) : ?>
        <?php foreach ($select_note as $key => $value) : ?>
        <div class="alert alert-dismissible fade show" role="alert"
            style="max-width: 18rem; background: <?php echo $value["color"] ?>; margin: 10px">
            <div class="card-body">
                <h5 class="card-title"><?php echo $value["title"] ?></h5>
                <p class="card-text"><?php echo $value["description"] ?></p>
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $value["id"] ?>">
                <button type="submit" name="delete" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </form>
        </div>
        <?php endforeach ?>
        <?php else : ?>
        <h1 class="text-center display-4">Aún no tienes notas...</h1>
        <?php endif ?>



    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Título de tarea"
                            autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" placeholder="Descripción de tarea"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Color de nota</label>
                        <input type="color" name="color" id="" class="form-control">
                    </div>
                </div>
                <input type="hidden" name="user_id" value="<?php echo $_SESSION["id"]; ?>">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>