<?php
include 'db_connect.php';
$pdo = pdo_connect_mysql();
$x;
if(isset($_GET['student_id']))
{
  $student_id=$_GET['student_id'];
  $stmt=$pdo->prepare("delete from students where student_id='$student_id'");
  $stmt->execute();
  if($stmt)
    {
        echo "<script>
        // alert('Successfully Deleted!');
        window.location.href='get_students.php';
        </script>";
    }
}

?>

