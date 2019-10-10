<?php 

include 'inc/quiz.php';

// Store the question number
$question = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_NUMBER_INT);
// set total score to 0 to start
if (!isset($_SESSION['total_score'])) {
  $_SESSION['total_score'] = 0;
}

// Always set the variable to 1 if not set
if (empty($question)) {
  $question = 1;
}

// Incorporate this with show final score later
// Do not exceed more than 10 question 
if ($question > 10) {
  echo $_SESSION['total_score'];
  // unset the session variable at the end of the quiz
  unset($_SESSION['total_score']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
          <!-- toast if correct, toast if incorrect -->
          <!-- Redirect via hear if answer is wrong -->
          <?php if ($_SESSION['answer'] === $_SESSION['userChoice']) { ?>
            <div class="success">That is Correct! Great Job!</div>
            <?php 
            $_SESSION['total_score']++;
            ?>
          <?php } else { ?>
            <div class="error">Sorry, that is incorrect. Please try again.</div>
          <?php } ?>
          
            <p class="breadcrumbs">Question <?php echo $question; ?> of <?php echo $total_questions; ?></p>
            <p class="quiz"><?php echo $question_output; ?></p>
            <form action="index.php?q=<?php echo $question + 1 ?>" method="post">
                <input type="hidden" name="answer" value="<?php echo $answer; ?>" />
                <input type="submit" class="btn" name="userChoice" value="<?php echo $answers[0]; ?>" />
                <input type="submit" class="btn" name="userChoice" value="<?php echo $answers[1]; ?>" />
                <input type="submit" class="btn" name="userChoice" value="<?php echo $answers[2]; ?>" />
            </form>
        </div>
    </div>
</body>
</html>
