<?php 
include 'db.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="result.php" method="POST">
        <h2>Quiz Online</h2>
        <?php
        $ketqua = $conn->query("SELECT * FROM questions");
        if ($ketqua->num_rows > 0):
            $i = 1;
            while ($dong = $ketqua->fetch_assoc()):
        ?>
        <div>
            <p><?php echo $i . ". " . $dong['question_text']; ?></p>
            <?php foreach (['a', 'b', 'c', 'd'] as $opt):
                if (!empty($dong["option_$opt"])): ?>
                    <label>
                        <input type="radio" name="q<?php echo $dong['id']; ?>" value="<?php echo $opt; ?>">
                        <?php echo $dong["option_$opt"]; ?>
                    </label><br>
            <?php endif; endforeach; ?>
        </div>
        <?php $i++; endwhile; else: ?>
            <p>Không có câu hỏi nào trong cơ sở dữ liệu.</p>
        <?php endif; ?>
        
        <input type="submit" value="Nộp bài">
    </form>
</body>
</html>
