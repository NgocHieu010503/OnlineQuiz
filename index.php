<?php 
include 'db.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz Online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="result.php" method="POST">
        <h2>Quiz Online</h2>
        <?php
        $result = $conn->query("SELECT * FROM questions");
        $i = 1;
        while ($row = $result->fetch_assoc()):
        ?>
        <div>
            <p><?php echo $i . ". " . $row['question_text']; ?></p>
            <?php foreach (['a', 'b', 'c', 'd'] as $opt):
                if (!empty($row["option_$opt"])): ?>
                    <input type="radio" name="q<?php echo $row['id']; ?>" value="<?php echo $opt; ?>">
                    <?php echo $row["option_$opt"]; ?><br>
            <?php endif; endforeach; ?>
        </div>
        <?php $i++; endwhile; ?>
        <input type="submit" value="Submit quiz">
    </form>
</body>
</html>
