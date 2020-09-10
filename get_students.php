<?php
include 'db_connect.php';
$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 5;


$stmt = $pdo->prepare('SELECT * FROM students');
// $stmt = $pdo->prepare('SELECT * FROM students ORDER BY id LIMIT :current_page, :record_per_page');
// $stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
// $stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" href = "assets/style.css">
<link rel = "stylesheet" href = "assets/font-awesome/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Xavier University - Office of Student Affairs </title>	
</head>
    <div class = "header_2"> 
    <img src = "assets/XU Logo.png" id="leftImageXU">
    <a href="rest_con.php" class="button" style="color: white;
    padding-left: 50px;
    padding-bottom: 20px;"> Registrar's Student Data </a>
    <a href="http://localhost/final_proj/" class="button" style="color: white;
    padding-left: 1250px;
    padding-bottom: 20px;" >LOG OUT</a>

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
<h1 style="text-align:center; ">STUDENT RECORDS</h1>
<div style="text-align: right;">
<a style="background-color: white;
  color: black;
  border: 2px solid #555555;  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  " id="add_buttn" href="add_students.php" type="submit" ><i class="fa fa-plus-square" style="font-size:35px;color:black"></i></a>
  </div>
<hr>
<div class="container">
<table>
        <thead>
            <tr>
                <td>Student ID</td>
                <td>Name</td>
                <td>Year</td>
                <td>Course</td>
                <td>Email</td>
                <td>Enrolled</td>
                <td>Violation</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?=$student['student_id']?></td>
                <td><?=$student['name']?></td>
                <td><?=$student['year']?></td>
                <td><?=$student['course']?></td>
                <td><?=$student['email']?></td>
                <td><?=$student['is_enrolled']?></td>
                <td><?=$student['violation']?></td>
                <td>
                <a href="update_students.php?student_id=<?=$student['student_id']?>"><i class="fa fa-pencil-square-o" style="font-size:35px;color:black"></i></a>
                <a href="delete_students.php?student_id=<?=$student['student_id']?>" onclick="return confirm('Are you sure to delete this student?')"><i class="fa fa-trash-o" style="font-size:35px;color:black"></i></a>
            </td>
            </tr>
            <?php endforeach; ?>
        </tbody> 
    </table>


</body>
</html>

<script>
function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf){
      window.location=anchor.attr("href");
   }else{
      window.location="get_students.php";
   }
}
 </script>