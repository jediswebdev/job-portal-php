<?php

if (isset($_POST['submit'])) {
    $student_name = htmlspecialchars(trim($_POST['student_name'])) ?? null;
    $math_score = htmlspecialchars(trim($_POST['math_score'])) ?? null;
    $eng_score = htmlspecialchars(trim($_POST['eng_score'])) ?? null;
    $chm_score = htmlspecialchars(trim($_POST['chm_score'])) ?? null;
    $phy_score = htmlspecialchars(trim($_POST['phy_score'])) ?? null;
    $fm_score = htmlspecialchars(trim($_POST['fm_score'])) ?? null;

    if (empty($student_name) && empty($math_score) && empty($eng_score) && empty($chm_score) && empty($fm_score)) {
        echo "All Field are required <br>";
        echo "<a href='index.php'>Go back</a>";
        exit;
    } elseif (strlen($student_name) <= 0) {
        echo "Please enter a valid username <br>";
        echo "<a href='index.php'>Go back</a>";
        exit;
    } elseif (strlen($math_score) <= 0) {
        echo "Please enter a Mathematics score <br>";
        echo "<a href='index.php'>Go back</a>";
        exit;
    } elseif (strlen($eng_score) <= 0) {
        echo "Please enter a English score <br>";
        echo "<a href='index.php'>Go back</a>";
        exit;
    } elseif (strlen($chm_score) <= 0) {
        echo "Please enter a Chemistry score <br>";
        echo "<a href='index.php'>Go back</a>";
        exit;
    } elseif (strlen($phy_score) <= 0) {
        echo "Please enter a valid Physics score<br>";
        echo "<a href='index.php'>Go back</a>";
        exit;
    } elseif (strlen($fm_score) <= 0) {
        echo "Please enter a valid Further math score<br>";
        echo "<a href='index.php'>Go back</a>";
        exit;
    }



    $sum = $math_score + $eng_score + $chm_score + $phy_score + $fm_score;
    $average = $sum/500;
    $average = $average * 100;

    if ($sum > 500) {
        echo "Values must not be greater than 100 <br>";
        echo "<a href='index.php'>Go back</a>";
        exit;
    }

    if(gettype($sum) != "integer") {
        echo "Values must be numbers <br>";
        echo "<a href='index.php'>Go back</a>";
        exit;
    }
}

function getGrade($score)
{
    if ($score > 90) {
        return [
            "msg" => "Excellent",
            "grade" => "A"
        ];
    }
    if ($score > 80) {
        return [
            "msg" => "Very Good",
            "grade" => "B"
        ];
    }
    if ($score > 70) {
        return [
            "msg" => "Good",
            "grade" => "C"
        ];
    }
    if ($score > 60) {
        return [
            "msg" => "Pass",
            "grade" => "D"
        ];
    }
    if ($score > 50) {
        return [
            "msg" => "Poor",
            "grade" => "E"
        ];
    }
    if ($score <= 49) {
        return [
            "msg" => "Fail",
            "grade" => "F"
        ];
    }
}


$math_grade = getGrade($math_score);
$eng_grade = getGrade($eng_score);
$chm_grade = getGrade($chm_score);
$phy_grade = getGrade($phy_score);
$fm_grade = getGrade($fm_score);


$stu_overall = getGrade($average)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <h2>Currently displaying result information for <?php echo $student_name; ?></h1>
            <br>
            <hr>
            <h4>Given Information: </h4>

            <p>Math Score: <?php echo $math_score ?> Grade: ( <?php echo $math_grade['grade'] ?? null; ?> ) Remark:
                <?php echo $math_grade['msg'] ?? null; ?></p>
            <p>English Score: <?php echo $eng_score ?> Grade: ( <?php echo $eng_grade['grade']; ?> ) Remark:
                <?php echo $eng_grade['msg']; ?>
            </p>
            <p>Chemistry Score: <?php echo $chm_score ?> Grade: ( <?php echo $chm_grade['grade']; ?> ) Remark:
                <?php echo $chm_grade['msg']; ?>
            </p>
            <p>Physics Score: <?php echo $phy_score ?> Grade: ( <?php echo $phy_grade['grade']; ?> ) Remark:
                <?php echo $phy_grade['msg']; ?>
            </p>
            <p>Further Maths Score: <?php echo $fm_score ?> Grade: ( <?php echo $fm_grade['grade']; ?> ) Remark:
                <?php echo $fm_grade['msg']; ?>
            </p>
    </div>

    <div>
        <hr>
        <br>
        <h3>Total Marks obtained: <?php echo $sum; ?> / 500</h3>
        <br>
        <h4>Student Average : <?php echo $average?> %</h4>
        <br>
        <p>Student Grade: <?php echo $stu_overall['grade'] ?? null;?></p>
        <br>
        <p>Remark: <?php echo $stu_overall['msg'] ?? null;?></p>
    </div>
</body>

</html>