<!DOCTYPE html>
<html lang="en">

<head>
  <title>PHP Essentials - 9. Switch Statements</title>
</head>

<body>

  <!-- 
    The Chinese Zodiac is a 12 year cycle that features one animal each year.
    It proposes the belief that the animal that represents your birth year
    has an influence on your personality and destiny.

    In this activity you are going to create a switch statement that calculates
    the Chinese Zodiac symbol of any particular year.
 -->

  <?php
  //1. Create a variable that stores the year you wish to evauluate (e.g. 2014 or 2005)
   $year = 1983;

  //2. Create a switch statement that switches on the result of the following equation: "($year - 4) % 12".
   switch (($year - 4) % 12){

      case 0: $zodiac ="Rat";
              break;
      case 1: $zodiac ="Ox";
              break;
      case 2: $zodiac ="Tiger";
              break;
      case 3: $zodiac ="Rabbit";
              break;
      case 4: $zodiac ="Dragon";
              break;
      case 5: $zodiac ="Snake";
              break;
      case 6: $zodiac ="Horse";
              break;
      case 7: $zodiac ="Goat";
              break;
      case 8: $zodiac ="Monkey";
              break;
      case 9: $zodiac ="Rooster";
              break;
      case 10: $zodiac ="Dog";
              break;
      case 11: $zodiac ="Pig";
              break;
      default: echo "Wrong Calculation";
              break;
   }
  //3. Create 12 cases, numbered 0 through 11.
  #     Each case should set a variable named $zodiac. Look at 9-switch-statements.txt
  #     for the values to use for each case. You may need to add syntax such as $zodiac = or break;.
  #     You do not need to add a default case in this scenario.

      echo "{$year} is the year of {$zodiac} <br>" ;
      echo $year . " is the year of ". $zodiac;

  //4. Create an Echo statement to echo the $year and $zodiac variables in a sentence

  //5. Alter your $year variable to find the Zodiac for the years: 2000, 2005, 1996
  ?>

</body>

</html>