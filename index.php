<?php
include 'db_connect.php';
// include 'assets/style.css';

$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 5;

// var_dump($pdo);
$stmt = $pdo->prepare('SELECT * FROM students');
// $stmt = $pdo->prepare('SELECT * FROM students ORDER BY id LIMIT :current_page, :record_per_page');
// $stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
// $stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<!-- <?php foreach ($contacts as $contact): ?>
<h1><?=$contact['student_id']?></h1>
<?php endforeach; ?> -->

<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" href = "assets/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Xavier University - Office of Student Affairs </title>	
</head>
<div class = "header"> 
<img src = "assets/XU Logo.png" id="leftImageXU" />
	<div class="login-container">
		<form action="login.php" method="post">
			<input type="text" placeholder="Username" name="username" >
			<input type="password" placeholder="Password" name="password" >
            <input type="submit" value="Login">
            <!-- <a id="log_a" href="get_students.php" type="submit" value="Login">Login</a> -->
		</form>
	</div>
</div>
<!-- <div class = "header2"> -->
<!-- <body bgcolor = "#FFFFFF"> -->
<div class="cont">
    <img src = "assets/XU1.jpg" id="centerImageXU"/>
</div>
<div class="footer">
  <p> <footer>&copy;2020</footer> </p>
  <p> <footer>ALL RIGHTS RESERVED</footer> </p>
</div>
</div>
</body>
</html>
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "stylesheet" href = "assets/styles.css">
</head>
<body>
    <div class="fixed-header">
        <div class="container">
            <nav>
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Products</a>
                <a href="#">Services</a>
                <a href="#">Contact Us</a>
            </nav>
        </div>
    </div>
    <div class="container">
    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Vestibulum id metus ac nisl bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet sagittis. In tincidunt orci sit amet elementum vestibulum. Vivamus fermentum in arcu in aliquam. Quisque aliquam porta odio in fringilla. Vivamus nisl leo, blandit at bibendum eu, tristique eget risus. Integer aliquet quam ut elit suscipit, id interdum neque porttitor. Integer faucibus ligula.</p>
        <p>Quis quam ut magna consequat faucibus. Pellentesque eget nisi a mi suscipit tincidunt. Ut tempus dictum risus. Pellentesque viverra sagittis quam at mattis. Suspendisse potenti. Aliquam sit amet gravida nibh, facilisis gravida odio. Phasellus auctor velit at lacus blandit, commodo iaculis justo viverra. Etiam vitae est arcu. Mauris vel congue dolor. Aliquam eget mi mi. Fusce quam tortor, commodo ac dui quis, bibendum viverra erat. Maecenas mattis lectus enim, quis tincidunt dui molestie euismod. Curabitur et diam tristique, accumsan nunc eu, hendrerit tellus.</p>
    </div>    
    <div class="fixed-footer">
        <div class="container">Copyright &copy; 2016 Your Company</div>        
    </div>
</body>
</body>
</html> -->