<?php if(!empty($data['todo'])): ?>
    <?php foreach($data['todo'] as $todo):?>
        <?php if($todo->completed === 1): ?>
            <div class="card my-2">
                <div class="card-body">
                    <h5 class="card-title"><s><?= $todo->todo ?></s></h5>
                    <div class="d-flex justify-content-between">
                        <button hx-delete="/dashboard/deleteTodo/<?= $todo->id ?>" hx-target=".todo-listings" hx-swap="innerHTML" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        <?php else: ?>
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
        <?php endif; ?>
    <?php endforeach; ?>
<?php else: ?>
    <p class="mt-3 text-center">You have nothing to do</p>
<?php endif; ?>

