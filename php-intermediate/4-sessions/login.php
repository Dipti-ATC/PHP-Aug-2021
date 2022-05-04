<!-- 
  
On this page we are going to be creating the functionality for the login form.
When the form is POSTED, select a user from the database by their email address.
If a user is found, compare the supplied password with the stored password.
If the passwords match, store their ID in a "user_id" session variable.
Remember, you must initialize a session before it can be manipulated.

Add usability features such as error handling.

Once the user has been "logged in", redirect them to index.php.

 -->

<?php require_once(__DIR__ . "/inc/header.php") ?>

<div class="container pt-5 h-100 align-items-center d-flex">
  <div class="row justify-content-center w-100">
    <div class="col-md-4">
      <div class="card mb-3 border-0">
        <div class="row g-2">

          <div class="card-body">
            <h1 class="card-title text-center">Login</h1>
            <hr>
            <form method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary px-5">Login</button>
                <p class="mt-2">
                  <a href="register.php">Register</a>
                </p>
              </div>

            </form>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php require_once(__DIR__ . "/inc/footer.php") ?>