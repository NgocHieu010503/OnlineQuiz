<?php 
include 'db.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Result</title>
</head>
<body>
    <?php
    $score = 0;
    $total = 0;

    $result = $conn->query("SELECT * FROM questions");
    while ($row = $result->fetch_assoc()) {
        $qid = $row['id'];
        $correct = $row['correct_option'];
        $total++;
        if (isset($_POST["q$qid"]) && $_POST["q$qid"] == $correct) {
            $score++;
        }
    }

    $percent = round(($score / $total) * 100);
    echo "<h3>Your score is <span style='color:orange;'>$percent%</span> on this quiz</h3>";
    ?>
    <a href="index.php">Try again</a>
</body>
</html>
