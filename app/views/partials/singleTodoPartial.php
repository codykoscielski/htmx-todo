<?php
    $data['todo'] = $todo;
?>
<div class="card my-2" hx-target="this" hx-swap="outerHTML">
    <div class="card-body">
        <h5 class="card-title"><?= $todo->todo ?></h5>
        <div class="d-flex justify-content-between">
            <button hx-get="/dashboard/edittodo/<?= $todo->id ?>" class="btn btn-primary">Edit</button>
            <button hx-delete="/dashboard/deleteTodo/<?= $todo->id ?>" hx-target=".todo-listings" hx-swap="innerHTML" class="btn btn-danger">Delete</button>
            <button hx-post="/dashboard/completetodo/<?= $todo->id ?>" hx-target=".todo-listings" hx-swap="innerHTML" class="btn btn-success">Completed</button>
        </div>
    </div>
</div>
