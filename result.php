<?php 
include 'db.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kết quả bài thi</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <form>
        <h2>Kết quả bài thi</h2>
        <?php
        $dung = 0;
        $tongcong = 0;

        $ketqua = $conn->query("SELECT * FROM questions");
        while ($dong = $ketqua->fetch_assoc()) {
            $qid = $dong['id'];
            $dapan = $dong['correct_option'];
            $tongcong++;

            echo "<div><p>{$dong['question_text']}</p>";
            if (isset($_POST["q$qid"])) {
                $traloi = $_POST["q$qid"];
                if ($traloi == $dapan) {
                    echo "<span style='color: green;'>✓ Đúng</span><br>";
                    $dung++;
                } else {
                    echo "<span style='color: red;'>✗ Sai</span> - Đáp án đúng: <strong>" . strtoupper($dapan) . "</strong><br>";
                }
            } else {
                echo "<span style='color: red;'>✗ Bạn chưa chọn câu trả lời</span><br>";
            }
            echo "</div>";
        }

        $diem = round(($dung / $tongcong) * 100);
        echo "<h3>Bạn được <span style='color: orange;'>$dung / $tongcong</span> điểm ($diem%)</h3>";
        ?>
        <a href="index.php" style="text-decoration: none;">
            <button type="button" class="retry-button">Làm lại bài quiz</button>
        </a>
    </form>
</body>
</html>
