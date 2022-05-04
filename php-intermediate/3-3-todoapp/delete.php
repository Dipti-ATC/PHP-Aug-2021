<!-- 
  To prevent users from accidentally deleting their tasks, we have decided to make a confirmation dialogue.

  5-1. Use PDO to echo the task based on the id parameter so that users know what they're about to delete.
        Show an error if no task is found. Use logic to hide the delete button and "are you sure" message when there is an error.
        
  5-2. Because route parameters are not available in the $_POST superglobal, we can use hidden form fields to
        pass information from route parameters into our form without showing them to users.
        Echo the ID route parameter as the value of the "id" hidden input within the form.

        Users will be able to manually adjust the value of hidden form fields if they understand HTML,
        so always ensure you're still doing validation when using hidden fields.
        
  5-3. When the form is POSTED, use PDO to delete the task by its ID and
        redirect the user back to index.php using the header function.

 -->

<?php require_once(__DIR__ . "/inc/header.php") ?>

<div id="page-wrapper">
  <div class="container py-5">
    <div id="content" class="border rounded bg-white shadow-sm px-3 pt-2 pb-4 text-center">
      <h1 class="display-4 mb-4 text-center">Delete?</h1>
      <p>Are you sure you want to delete task:
        <!-- Echo the task here -->
      </p>
      <a href="index.php" class="btn btn-success">&lt; Go Back</a>
      <form method="POST" class="d-inline-block">
        <input type="hidden" name="id" value="">
        <button type="submit" class="btn btn-danger" name="delete" value="true">🗑 Delete</button>
      </form>
    </div>

  </div>
</div>
</div>

<?php require_once(__DIR__ . "/inc/footer.php") ?>