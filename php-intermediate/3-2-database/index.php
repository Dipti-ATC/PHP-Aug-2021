<!-- 
    In this exercise you will be creating a basic chat app where users can post a message to a message board.

    1. Copy the SQL from within "chat.sql" and run it on your database to create the database for this task.
        Tip: SQL can be run from the SQL tab within PHPMyAdmin.
    2. Populate the database connection file "inc/database.php" with the credentials for your database and require it here.
    3. Create PHP code that inserts messages submitted through the form into the database using prepared statements.
        Add validation to ensure that messages cannot be inserted if they contain less than 5 characters
        or more than 255 characters. Add features to ensure the form has a good user experience.
    4. Create PHP code that queries the database for all messages ordered from newest to oldest.
        Turn the For loop into a foreach loop to loop over each message.
    5. Test your code by adding new messages through the form.

    Extras:
    - Use "$msg_date = strtotime($message['date'])" and "date("h:ia, d M Y", $msg_date)" 
        to format the message date from the database within your loop.
        If you wish to change the format within the date() function https://www.php.net/manual/en/datetime.format.php

 -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>3-2-Database | Chat App</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <h1 class="h4 mb-2">Share your Messages with the world...</h1>
        <form method="POST">
          <div class="mb-1">
            <div class="form-floating">
              <textarea class="form-control" name="message" id="message" placeholder="Leave a comment here"
                style="height: 150px; resize: none;"></textarea>
              <label for="message">Your Message</label>
            </div>
          </div>

          <button type="submit" class="btn btn-primary w-100">Submit</button>

        </form>

        <h1 class="h4 mt-4">Latest Messages:</h1>

        <?php for ($i = 0; $i < 3; $i++) : ?>
        <div class="card mb-2">
          <div class="card-body">
            <p class="card-title text-muted">Posted at 0:00am, 1 Jan 1990</p>
            <p class="card-text">
              Message goes here.
            </p>
          </div>
        </div>
        <?php endfor; ?>
      </div>
    </div><!-- .row -->
  </div>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</body>

</html>