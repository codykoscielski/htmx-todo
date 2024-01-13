<?php
    //Extract the data
    $todo = $data['todo'];
?>
<form hx-post="dashboard/edittodo/<?= $todo->id ?>" hx-target="this" hx-swap="outerHTML" class="todo-form mt-2">
    <div class="mb-3">
        <label for="todo" class="form-label">Edit ToDo</label>
        <input type="text" class="form-control" id="todo" name="todo" placeholder="<?= $todo->todo ?>">
    </div>
    <button class="btn btn-primary" type="submit">Edit</button>
    <button class="btn btn-warning" hx-get="/dashboard/get/<?= $todo->id ?>">Cancel</button>
</form>
