<!-- 
  1. At the very top of this file, use logic to check whether the user is logged in.
      If not, prematurely end the script and redirect the user to the login page.

  2. At the bottom of this page we have a logout link that sends the user to logout.php.
      Create the file "logout.php" and add code that destroys the session and redirect the user to the login page.

  3. Test the code you wrote in step 2 by attempting to access index.php after clicking the logout link.
  
  4. Use PDO to populate the form fields with their current values when the page is loaded.
      Use the user's "ID" session variable when selecting from the database.
  
  5. Update the values in the database when the form is POSTED. 
      Remember to validate the email and ensure it's not already registered if it gets changed.

  6. Echo the user's ID from $_SESSION as a route parameter in the "view my card" link.
 -->

<?php require_once(__DIR__ . "/inc/header.php") ?>

<div class="container pt-5 h-100 align-items-center d-flex">
  <div class="row justify-content-center w-100">
    <div class="col-md-4">
      <div class="card mb-3 border-0">
        <div class="row g-2">

          <div class="card-body">
            <h1 class="card-title text-center">Name's Business Card</h1>
            <p class="mt-2 text-center">
              <a href="card.php?id=" target="_blank" rel="noopener">View My Card</a>
            </p>
            <hr>
            <form method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email">
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" name="phone" id="phone">
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Favourite Quote</label>
                <input type="text" class="form-control" name="quote" id="quote">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary px-5">Update</button>
              </div>

            </form>

            <p class="mt-2 text-center">
              <a href="logout.php" class="text-danger">Logout</a>
            </p>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php require_once(__DIR__ . "/inc/footer.php") ?>