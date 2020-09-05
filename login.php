<?php
include 'db_connect.php';
$pdo = pdo_connect_mysql();

// var_dump($_GET['student_id']);
if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
        $stmt->execute([$_POST['username'],$_POST['password']]);
        $student = $stmt->fetch(PDO::FETCH_ASSOC);
        if($student != null){
            echo "<script>
            alert('Hi $student[name]');
            window.location.href='get_students.php';
            </script>";
        }else{
            echo "<script>
            alert('No user found, Try again.');
            window.location.href='index.php';
            </script>";
        }
        // if($ret){
        //     echo "<script type='text/javascript'>alert('false nigga');</script>";
        // }else{
        // echo "<script type='text/javascript'>alert('$msg');</script>";
        // }
    }
    // Get the contact from the contacts table
//     $stmt = $pdo->prepare('SELECT * FROM students WHERE student_id = ?');
//     $stmt->execute([$_GET['student_id']]);
//     $student = $stmt->fetch(PDO::FETCH_ASSOC);


// $stmt = $pdo->prepare('SELECT * FROM students');
// $stmt->execute();
// $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!-- <h1> <?php echo $student; ?></h1> -->