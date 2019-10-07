<?php 

include 'inc/quiz.php';

// Store the question number
$question = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_NUMBER_INT);

// Always set the variable to 1 if not set
if (empty($question)) {
  $question = 1;
}

// Incorporate this with show final score later
// Do not exceed more than 10 question 
if ($question > 10) {
  // If so redirect back to start
  header("Location: ./index.php");
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
            <p class="breadcrumbs">Question <?php echo $question; ?> of <?php echo $total_questions; ?></p>
            <p class="quiz"><?php echo $question_output; ?></p>
            <form action="index.php?q=<?php echo $question + 1 ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $question;?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $answers[0]; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $answers[1]; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $answers[2]; ?>" />
            </form>
        </div>
    </div>
</body>
</html>

