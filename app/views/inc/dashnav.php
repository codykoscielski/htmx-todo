<nav class="navbar navbar-expand-lg bg-body-tertiary px-4" data-bs-theme="dark">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="/dashboard">Welcome, <?= $_SESSION['user_name'] ?></a>
        <a href="/auth/logout" class="btn btn-primary">Logout</a>
    </div>
</nav>
