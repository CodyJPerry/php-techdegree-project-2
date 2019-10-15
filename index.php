<?php 
include 'inc/quiz.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
          <h1>Welcome to MathQuiz</h1>
          <!-- Toast Message
              Display a message for 2 seconds to user
              based on correct or incorrect status -->
          <?php if ($question > 1) { ?>
              <?php if ($_SESSION['answer'] === $_SESSION['userChoice']) { ?>
                <div class="success user-msg">That is Correct! Great Job!</div>
                <?php $_SESSION['total_score']++; ?>
              <?php } else { ?>
                <div class="error user-msg">Sorry, that is incorrect. Please try again.</div>
              <?php } ?>
          <?php } ?>
          
          <!-- Display questions up to 10 -->
          <?php if ($question <= 10) { ?>
            <p class="breadcrumbs">Question <?php echo $question; ?> of <?php echo $total_questions; ?></p>
            <p class="quiz"><?php echo $question_output; ?></p>
            <form action="index.php?q=<?php echo $question + 1 ?>" method="post">
                <input type="hidden" name="answer" value="<?php echo $answer; ?>" />
                <input type="submit" class="btn" name="userChoice" value="<?php echo $answers[rand(0, 100)]; ?>" />
                <input type="submit" class="btn" name="userChoice" value="<?php echo $answers[0]; ?>" />
                <input type="submit" class="btn" name="userChoice" value="<?php echo $answers[rand(0, 100)]; ?>" />
            </form>
         <?php } else if ($question > 10) { ?>
            <!-- Show final score and Ask user if they want to attempt quiz again -->
            <p class="score-message">The Final Score for this quiz attempt is: <strong><?php echo $_SESSION['total_score']; ?> / 10</strong></p>
            <p class="retakeAttempt">Would you like to improve the final Score?</p>
               <form class="retakeForm" action="index.php" method="post">
                <input type="submit" name="retakeQuiz" value="Yes">
              </form>
             <?php unset($_SESSION['total_score'])?>
         <?php } ?>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>
</html>
