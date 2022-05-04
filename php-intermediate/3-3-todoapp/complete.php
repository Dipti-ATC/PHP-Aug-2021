<?php

/*
To keep our code easy to read, we will be creating separate PHP files that handle each of the update and delete functions.

This file does not need any html because it will not be displaying anything to the user, only completing some tasks and then
returning the user to the previous page.

6-1. Require "inc/database.php" so that our PDO connection can be used on this page.
6-2. Use the POSTED ID value to update the task's to update the task's "completed" value to true.
6-3. Redirect the user's browser back to index.php with the header function.
*/