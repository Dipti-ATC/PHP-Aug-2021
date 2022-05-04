# 5. Password Hashing

Checking your business_cards database in PHPMyAdmin, you will notice that passwords are stored in plaintext. While this is functional, many people will use the same username and password on multiple sites meaning that if your database ever gets hacked, there is the potential for their passwords to be exposed.

To solve this problem, we can encrypt the passwords of our users in a way where it is practicly impossible for a hacker to guess the original password.

1. Update "register.php" so that passwords are hashed before they are stored to the database.
2. Now that we are using password hashing, you must also alter how the login page validates passwords.
   Update "login.php" to use the correct functions to ensure that passwords can be properly validated.

Note: Passwords that were not hashed will no longer work.

3. To improve the user experience, alter the register and login page so that they redirect the user to "index.php" if they are already logged in.
