<!-- 
This page will display the user's business card based on their ID.

1. Use the ID route parameter to get a user from the database. Use their information to populate the card with data.
    Show a "Card Not Found" error when no user is found.
2. Ensure the "Edit My Card" button is only shown when the Session Variable "ID" is equal to the currently viewed card's ID. 

 -->

<?php require_once(__DIR__ . "/inc/header.php") ?>

<div class="container pt-5 h-100 align-items-center justify-content-center d-flex">
  <div class="card mb-3 border-0" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="img/no-pic.jpg" class="img-fluid rounded-start" alt="Picture of Name"
          style="height: 100%; object-fit: cover">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Name</h5>
          <p class="card-text mb-0">Email: <a href="mailto:#">address@email.com</a></p>
          <p class="card-text">Phone: <a href="tel:#">027 123 1234</a></p>
          <p class="card-text"><small class="text-muted">Favourite Quote: Lorem Ipsum dolor</small></p>
          <a href="index.php" class="btn btn-primary btn-sm">Edit My Card</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once(__DIR__ . "/inc/footer.php") ?>