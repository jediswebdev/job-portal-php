<?php

if (isset($_GET['typeerr'])) {
    $errmsg = "Please enter valid numbers";;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result Calculator</title>
</head>

<body>
    <h4><?php echo $errmsg ?? "" ?></h4>
    <form action="./process.php" method="POST">
        <label for="student_name">Enter Student Name:</label>
        <input type="text" name="student_name">
        <br>
        <hr>
        <label for="math_score">Enter Maths Score:</label>
        <input type="text" name="math_score">
        <br>
        <label for="eng_score">Enter English Score:</label>
        <input type="text" name="eng_score">
        <br>
        <label for="chm_score">Enter Chemistry Score:</label>
        <input type="text" name="chm_score">
        <br>
        <label for="phy_score">Enter Physics Score:</label>
        <input type="text" name="phy_score">
        <br>
        <label for="fm_score">Enter Further Maths Score:</label>
        <input type="text" name="fm_score">
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>

</body>

</html>