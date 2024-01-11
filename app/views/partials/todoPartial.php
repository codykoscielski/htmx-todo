<?php if(!empty($data['todo'])): ?>
    <?php foreach($data['todo'] as $todo):?>
        <div class="card my-2">
            <div class="card-body">
                <h5 class="card-title"><?= $todo->todo ?></h5>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary">Edit</button>
                    <button hx-delete="/dashboard/deleteTodo/<?= $todo->id ?>" class="btn btn-danger">Delete</button>
                    <button class="btn btn-success">Completed</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p class="mt-3 text-center">You have nothing to do</p>
<?php endif; ?>

