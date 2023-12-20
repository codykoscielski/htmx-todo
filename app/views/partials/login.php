<div class="drac-box drac-bg-purple-cyan drac-rounded-lg">
    <p class="drac-text-lg drac-text drac-text-white">Login here</p>
    <form action="">
        <div class="form-group">
            <label for="username" class="drac-text-white drac-text">Username</label>
            <input type="text">
        </div>
        <div class="form-group">
            <label for="password" class="drac-text-white drac-text">Password</label>
            <input type="password">
        </div>
        <input type="submit" class="drac-btn drac-bg-purple">
    </form>
    <a href="/auth/signup" hx-get="/auth/signup" hx-swap="innerHTML" hx-target=".content">New here? Sign up now!</a>
</div>