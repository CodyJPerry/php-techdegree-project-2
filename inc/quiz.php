<?php
/*
 * PHP Techdegree Project 2: Build a Quiz App in PHP
 *
 * These comments are to help you get started.
 * You may split the file and move the comments around as needed.
 *
 * You will find examples of formating in the index.php script.
 * Make sure you update the index file to use this PHP script, and persist the users answers.
 *
 * For the questions, you may use:
 *  1. PHP array of questions
 *  2. json formated questions
 *  3. auto generate questions
 *
 */

// Include questions

// Keep track of which questions have been asked

// Show which question they are on
// Show random question
// Shuffle answer buttons


// Toast correct and incorrect answers
// Keep track of answers
// If all questions have been asked, give option to show score
// else give option to move to next question


// Show score

# PEDAC 
  # Mold the requirements if they are not Explicit

# Understand the Problem
  # Input 
    // Selected answer from the list of options
    // Question number user is on: Example (1 of 10)

  # Output
    // Display a toast for correct and incorrect answers
    // Update question number user is on: Example (3 of 10)
    // Display final score at the end after all questions have been answered
    // Offer to take quiz again after final score is displayed

  # Rules
    // Questions should not repeat
    // Shuffle array of questions on each quiz attempt
    // Shuffle array of answers, correct answer should not be in the same place each time
    // Persist the users answers
    // Keep track of which questions have been asked

  # Requirements
    // Show the final score
    // Show which question the user is on
      // Update question number when user proceeds to the next question
    // Display toasts when question is answered correctly and incorrectly
    
  # Mental Model 
    // Build a quiz app that tests a user on basic addition. When the correct answer is selected, the app should toast correct. 
    // When the incorrect answer is selected, the app should toast incorrect. Once all questions have been answered, display the final score.


# Examples / Test Cases
  // Question: What is 44 + 30?
    // 44 + 30 === 74
  // Question: What is 78 + 90?
    // 78 + 90 === 164
  // Question: What is 82 + 29?
    // 82 + 29 === 111


# Data Structure
  // Array []
  // Number (Integer)
  // String

# Algorithm
  # Steps for converting input to output

  // Generate a random array of numbers to be used for questions
  // Build out question using two numbers from our random array of integers
  // Example: "What is " . $rand[num] . " + " .  $rand[num] . " ?"

  // Using regular expression check for (+, -, *, /) in the question string
    // This will determine if the question is addition, subtraction, multiplication, or division
    // The result of the regular expression will be evaluated and determine which function is used to process the question 

  // Using the same random array of numbers, we will generate the answer options for the user to select
    // We will pull 2 random numbers and push the result of evaluating the question into and answer array
    // The answer array will be used to display the list of options 
      // Shuffle the answer array each time so as not to display the answer in the same spot every time

  // When the user selects one of the provided options
    // That selection should be evaluated and if correct, display a correct toast to the user
    // That selection should be evaluated and if incorrect, display a incorrect toast to the user

  // The question number should be displayed to the user and updated when proceeding to the next question
  // Once all questions have been answered, the users final score should be displayed

  // At the end of the quiz, the user should be prompted to take the quiz again
    // If they choose Yes
      // Shuffle questions and answers and start app over again
    // If they select No
      // Exit application and send user to thank you page

# Code 

// Start a Session
session_start();

$answers = [];

// Generate the random numbers for use
$num1 = rand(0, 100);
$num2 = rand(0, 100);

// Build out question using two numbers from our random array of integers
$question_output = "What is " . $num1 . " + " . $num2 . " ?";

// Calculate the question
$answer = $num1 + $num2;

// Add to the answers array
$answers[] = $answer;
$answers[] = $answer + rand(5, 10);
$answers[] = $answer - rand(2, 10);

// Mix up answers array
shuffle($answers);

// set the total number of questions
$total_questions = 10;

// Filter Input / Escape Output
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // set session variables
  $_SESSION['answer'] = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_NUMBER_INT);
  $_SESSION['userChoice'] = filter_input(INPUT_POST, 'userChoice', FILTER_SANITIZE_NUMBER_INT);
}

// Store the question number
$question = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_NUMBER_INT);
// ensure the session variable is not set
// set total score to 0 to start
if (!isset($_SESSION['total_score'])) {
  $_SESSION['total_score'] = 0;
}

// Set the question value to 1 if empty
if (empty($question)) {
  $question = 1;
}
