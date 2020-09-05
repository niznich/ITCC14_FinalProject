<?php
include 'db_connect.php';
$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 5;
$msg = '';

// var_dump($_GET['student_id']);
if (isset($_GET['student_id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : NULL;
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $year = isset($_POST['year']) ? $_POST['year'] : '';
        $is_enrolled = isset($_POST['is_enrolled']) ? $_POST['is_enrolled'] : '';
        $course = isset($_POST['course']) ? $_POST['course'] : '';
        $violation = isset($_POST['violation']) ? $_POST['violation'] : '';
        $stmt = $pdo->prepare('UPDATE students SET student_id = ?, name = ?, email = ?, year = ?, course = ?, is_enrolled = ?, violation = ? WHERE student_id = ?');
        $ret = $stmt->execute([$student_id, $name, $email, $year, $course, $is_enrolled, $violation, $_GET['student_id']]);
        $msg = 'Updated Successfully!';
        echo "<script>
        alert('$msg');
        window.location.href='get_students.php';
        </script>";
        // if($ret){
        //     echo "<script type='text/javascript'>alert('false nigga');</script>";
        // }else{
        // echo "<script type='text/javascript'>alert('$msg');</script>";
        // }
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM students WHERE student_id = ?');
    $stmt->execute([$_GET['student_id']]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    exit('No ID specified!');
}

$stmt = $pdo->prepare('SELECT * FROM students');
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" href = "assets/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Xavier University - Office of Student Affairs </title>	
</head>
    <div class = "header_2"> 
    <img src = "assets/XU Logo.png" id="leftImageXU" />

    </div>
<div class="footer">
  <p> <footer>&copy;2020</footer> </p>
  <p> <footer>ALL RIGHTS RESERVED</footer> </p>
</div>
</div>
<body>
    
</body>

<br>
<br>
<br>
<br>
<br>
<h1 style="text-align:center">STUDENT RECORDS</h1>
<hr>
<div class="container">
<form action="update_students.php?student_id=<?=$student['student_id']?>" method="post">
        <label for="id">ID</label>
        <input type="text" name="student_id"  value="<?=$student['student_id']?>" id="student_id">
        <label for="name">Name</label>
        <input type="text" name="name"  value="<?=$student['name']?>" id="name">
        <label for="email">Email</label>
        <input type="text" name="email"  value="<?=$student['email']?>" id="email">
        <label for="Year">Year</label>
        <input type="text" name="year"  value="<?=$student['year']?>" id="year">
        <label for="Course">Course</label>
        <input type="text" name="course"  value="<?=$student['course']?>" id="course">
        <label for="Is Enrolled?">Is Enrolled?</label>
        <select style="width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;" name="is_enrolled" id="is_enrolled">
            <option value="<?=$student['is_enrolled']?>" selected><?=$student['is_enrolled']?></option>
            <option value=" ">----- PLEASE SELECT -----</option>
            <option value="Yes">Yes</option>
            <option value="None">Not yet</option>
        </select>
        <!-- <input type="text" name="is_enrolled" placeholder="1" value="<?=$student['is_enrolled']?>" id="is_enrolled"> -->
        <label for="Violation">Violation</label>
        <div class="select_inp">
        <select style="width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;" name="violation" id="violation">
            <option value="<?=$student['violation']?>" selected><?=$student['violation']?></option>
            <option value=" ">----- PLEASE SELECT -----</option>
            <option value="Yes">Yes</option>
            <option value="None">None</option>
        </select>        </div>
        <!-- <input type="text" name="violation" placeholder="1" value="<?=$student['violation']?>" id="violation"> -->
        <input type="submit" value="Update">
    </form>
</div>

</body>
</html>