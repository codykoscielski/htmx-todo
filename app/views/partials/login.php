<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">Login</h2>
            <form action="/auth/login" method="POST">
                <div class="form-group py-4">
                    <label for="inputEmail">Email address</label>
                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                </div>
                <div class="form-group pb-4">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <p>Don't have an account? <a href="/auth/signup" hx-get="/auth/signup" hx-target=".content" hx-swap="innerHTML">Create one here</a></p>
        </div>
    </div>
</div>
