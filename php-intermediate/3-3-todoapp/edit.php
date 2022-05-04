<!-- 
  9-1. Import the database connection.
  9-2. Use PDO to get the task's current name using the ID route parameter.
  9-3. Echo the current task name value to the text input.
  9-4. Set the ID route parameter as the value of the hidden input.
  9-5. Use PDO to update the task's name when the form is submitted.
        Ensure that the task cannot be given an empty name and redirect
        the user to "index.php" if the update is successful.
 -->

<?php require_once(__DIR__ . "/inc/header.php") ?>

<div id="page-wrapper">
  <div class="container py-5">
    <div id="content" class="border rounded bg-white shadow-sm px-3 py-2">
      <h1 class="display-4 mb-4 text-center">Editing Task</h1>
      <form method="POST">

        <div class="row">

          <div class="col order-md-2">
            <div class="input-group mb-3">
              <input type="text" name="new_name" class="form-control" value="Old Task Value">
              <input type="hidden" name="id" value="">
              <button type="submit" class="btn btn-primary" type="button">Update</button>
            </div>
          </div>

          <div class="col-md-2 order-md-1">
            <a href="index.php" class="btn btn-danger w-100 mb-3">Cancel</a>
          </div>

        </div>

      </form>

    </div>
  </div>
</div>

<?php require_once(__DIR__ . "/inc/footer.php") ?>