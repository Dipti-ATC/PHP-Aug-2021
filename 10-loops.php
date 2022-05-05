<?php
/* In this scenario, you are combining some of what you've learnt to create
a text filtering system to remove bad words from a product review page.

You are to use PHP to loop over the provided text
and replace any words that match those contained in the $filter array with a * character.

You may not change the $comment variable or $filter array directly,
and should define your own variables when manipulating text.

Use the internet to find help for any functions you don't understand.
*/

$comment = "I have recently purchased your product and have
 bad-words to say about it. 
 You see I have tried its functionality 
 and it does not meet the specifications
  expressed on the box. One star. Will not buy again.";

$filter = ["bad-words", "not"];

//1. Use the Explode function to separate the comment into an array of words
// explode - first argument is, based on what you want to seprate
// explode - second argument is, an array 
$comment_array= explode (" ", $comment);
//print_r ($comment_array);

//2. Create an empty array variable that will have parsed words appended to it
$filter_comment = [];

//3. Create a foreach loop to loop over each word in the comment words array
 foreach( $comment_array as $word){
     if(in_array($word, $filter)){
        array_push($filter_comment, "*");
     }else{
         array_push($filter_comment, $word);
     }

 }
//4. Within the loop, use an if statement to check if the current word is in
//   the $filter array. If it is, array_push "*" to your empty array.
//   If it is not, simply push the word to the empty array.


//5. Use the implode function to join your filtered comment array into a string

$newComment = implode(" ", $filter_comment);
//6. Echo your filtered comment under the marked HTML below.

/*
Extras:
7. You can add extra words to the $filter array to have them removed from the comment.
8. Currently the if statement is case sensitive. If you add "you" to the filter,
    it will not be caught. Find a function that allows you to make the word variable
    lowercase within your in_array statement.
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Essentials - 10. Loops</title>

    <style>
    body {
        font-family: monospace;
    }

    .review {
        border: 2px solid #a2a2a2;
        border-radius: 4px;
        padding: 1rem 1.5rem;
    }

    .review .reviewer-name {
        font-weight: 600;
    }

    .review p {
        margin-top: 0.2rem;
        margin-bottom: 0.2rem;
    }
    </style>
</head>

<body>
    <h1>Product Reviews</h1>
    <div class="review">
        <p class="reviewer-name">Anyonymous - 1/5 ⭐</p>
        <p>
             <?php   echo $newComment; ?>
        </p>
    </div>

</body>

</html>