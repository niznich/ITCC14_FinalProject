<?php
 
$response = json_decode(file_get_contents('http://localhost/reg/api_new.php'));
  // $stud = json_encode($response);
 // $result = '1';

// foreach($response as $res):
// echo $res;
// endforeach;
// var_dump($response);
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
    <img src = "assets/XU Logo.png" id="leftImageXU" />
    <a href="get_students.php" class="button" style="color: white;
    padding-left: 50px;
    padding-bottom: 20px;"> Go Back to our Database</a>

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
<h1 style="text-align:center; ">REGISTRAR'S STUDENT RECORDS</h1>
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
                <td>Gender</td>
                <td>Year and Course</td>
                <td>Contact no.</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($response as $student): ?>
            <tr>
                <td><?=$student->Id?></td>
                <td><?=$student->name?></td>
                <td><?=$student->gender?></td>
                <td><?=$student->year_course?></td>
                <td><?=$student->contact?></td>
            </tr>
            <?php endforeach; ?>
        </tbody> 
    </table>


</body>
</html>