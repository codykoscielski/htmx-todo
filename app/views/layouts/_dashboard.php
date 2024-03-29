<?php
    require APPROOT . '/views/inc/header.php';
    require APPROOT . '/views/inc/dashnav.php';
?>
<main class="mt-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <form hx-post="dashboard/addtodo" hx-target=".todo-listings" class="todo-form">
                    <div class="mb-3">
                        <label for="todo" class="form-label">New ToDo</label>
                        <input type="text" class="form-control" id="todo" name="todo" placeholder="Do something here...">
                    </div>
                    <button class="btn btn-primary" type="submit">+ Add</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mx-auto todo-listings">
                  <?= $todoContent; ?>
            </div>
        </div>
    </div>
</main>
<?php
    require APPROOT . '/views/inc/footer.php';
?>
