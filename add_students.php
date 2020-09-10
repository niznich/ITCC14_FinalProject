<?php
include 'db_connect.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $student_id = isset($_POST['student_id']) && !empty($_POST['student_id']) && $_POST['student_id'] != 'auto' ? $_POST['student_id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    // $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : NULL;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $year = isset($_POST['year']) ? $_POST['year'] : '';
    $is_enrolled = isset($_POST['is_enrolled']) ? $_POST['is_enrolled'] : '';
    $course = isset($_POST['course']) ? $_POST['course'] : '';
    $violation = isset($_POST['violation']) ? $_POST['violation'] : '';
    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO students VALUES (?, ?, ?, ?, ?, ?, ?)');
    $ret = $stmt->execute([$student_id, $name, $email, $year, $course, $is_enrolled, $violation]);
    // Output message
    // var_dump($ret);
    if($ret == 'true'){
        echo "<script>
        alert('Successfully Added Student');
        window.location.href='get_students.php';
        </script>";
    }else{
        echo "<script>
        alert('Please try Again later!');
        </script>";
    }
   
}
?>


<!DOCTYPE html>
<html>
<head>
path/to/font-awesome/css/font-awesome.min.css
<link rel = "stylesheet" href = "assets/style.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
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
<form action="add_students.php" method="post">
        <label for="id">ID</label>
        <input type="text" name="student_id"  id="student_id" required>
        <label for="name">Name</label>
        <input type="text" name="name"  id="name" required>
        <label for="email">Email</label>
        <input type="text" name="email"  id="email" required>
        <label for="Year">Year</label>
        <input type="text" name="year"  id="year" required>
        <label for="Course">Course</label>  
        <input type="text" name="course"  id="course" required>
        <label for="Is Enrolled?">Is Enrolled?</label>
        <select style="width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;" name="is_enrolled" id="is_enrolled">
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
            <option value=" ">----- PLEASE SELECT -----</option>
            <option value="Yes">Yes</option>
            <option value="None">None</option>
        </select>
        </div>
        <!-- <input type="text" name="violation" placeholder="1" value="<?=$student['violation']?>" id="violation"> -->
        <input type="submit" value="Add">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

</body>
</html>