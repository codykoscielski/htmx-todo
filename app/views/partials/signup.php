<div class="drac-box drac-bg-purple-cyan drac-rounded-lg">
    <p class="drac-text-lg drac-text drac-text-white">Sign up here</p>
    <form action="">
        <div class="form-group">
            <label for="username" class="drac-text-white drac-text">Username</label>
            <input type="text">
        </div>
        <div class="form-group">
            <label for="password" class="drac-text-white drac-text">Password</label>
            <input type="password">
        </div>
        <div class="form-group">
            <label for="confirmPassword" class="drac-text-white drac-text">Confirm Password</label>
            <input type="password">
        </div>
        <input type="submit" class="drac-btn drac-bg-purple">
    </form>
    <a href="/auth/login" hx-get="/auth/login" hx-swap="innerHTML" hx-target=".content">Have an account? Log in here!</a>
</div>
