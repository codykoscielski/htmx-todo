<?php
    require APPROOT . '/views/inc/header.php';
    require APPROOT . '/views/inc/nav.php';
?>
    <main class="center-content">
        <div class="container">
            <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-4">Welcome to Todo List App!</h1>
                    <p class="lead">This is a simple and effective way to manage your daily tasks.</p>
                    <hr class="my-4">
                    <p>Use this application to add, edit, and delete tasks. You can also mark tasks as completed once you're done with them.</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="/auth" role="button">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </main>
<?php
    require APPROOT . '/views/inc/footer.php';
?>
