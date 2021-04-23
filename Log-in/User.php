<?php

include_once "../Management/EnrollSubject.php";
include_once "../Management/SubjectManager.php";

$subjectManager = new SubjectManager("../Management/data.json");
$enrollSubjects = $subjectManager->getAll();

session_start();
if (isset($_SESSION["user"])) {
    echo "Hello, ";
    echo "<h3>".$_SESSION["user"]."<h3>";
} else {
    header("location: log-in.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <button type="submit" name="log-out">Log-out</button>
</form>
<form>
<div>
    <form>
        <table border="2px">
            <tr>
                <td>TERM</td>
                <td>PROGRAM</td>
                <td>STATUS</td>
                <td>DATE</td>
            </tr>
            <?php foreach ($enrollSubjects as $key => $enrollSubject) { ?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <td><?php echo $enrollSubject->getTerm();?></td>
                <td><?php echo $enrollSubject->getProgram();?></td>
                <td><?php echo $enrollSubject->getStatus();?></td>
                <td><?php echo $enrollSubject->getDate();?></td>
            </tr>
            <?php } ?>
            <a href="../Management/add.php">ADD</a>
        </table>
    </form>
</div>
</form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["log-out"])) {
        session_destroy();
        header("location: log-in.php");
    }
}
?>
