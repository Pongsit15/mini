<?php 
    require_once('connection1.php');

    if (isset($_REQUEST['btn_insert'])) {
        $firstname = $_REQUEST['txt_firstname'];
        $lastname = $_REQUEST['txt_lastname'];
        $email = $_REQUEST['txt_email'];
		//$position = $_REQUEST['txt_Positionl'];
		$password = $_REQUEST['txt_password'];
		//$urole = $_REQUEST['txt_Urole'];
		$db_salary = $_REQUEST['txt_db_salary'];
		//$created_ta = $_REQUEST['txt_created_ta'];
		
        if (empty($firstname)) {
            $errorMsg = "กรุณากรอกชื่อด้วย...";
        } else if (empty($lastname)) {
            $errorMsg = "กรุณากรอกนามสกุลด้วย...";
        } else if (empty($email)) {
            $errorMsg = "กรุณากรอกอีเมลด้วย...";
		//} else if (empty($position)) {
		//	$errorMsg = "กรุณากรอกตำเเหน่งด้วย...";
		//} else if (empty($urole)) {
		//	$errorMsg = "กรุณากรอกประเภทผู้ใช้งานด้วย...";
		} else if (empty($db_salary)) {
			$errorMsg = "กรุณากรอกเงินเดือนด้วย...";
		//} else if (empty($created_ta)) {
		//	$errorMsg = "กรุณากรอกวันเดือนปีด้วย...";
		} else if (empty($password)) {
			$errorMsg = "กรุณากรอกรหัสผ่านด้วย...";
		   
		   
		   

        } else {

            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO users (firstname, lastname,email,  db_salary,password ) VALUES (:fname, :lname,:email,
					:db_salary,:password)");
                    $insert_stmt->bindParam(':fname', $firstname);
                    $insert_stmt->bindParam(':lname', $lastname);
                    $insert_stmt->bindParam(':email', $email);
					$insert_stmt->bindParam(':password', $password);
					//$insert_stmt->bindParam(':position', $position);
					//$insert_stmt->bindParam(':urole', $urole);
					$insert_stmt->bindParam(':db_salary', $db_salary);
					//$insert_stmt->bindParam(':created_ta', $created_ta);


                    if ($insert_stmt->execute()) {
                        $insertMsg = "กำลังดำเนินการเพิ่มข้อมูลพนักงาน...";
                        header("refresh:2;employee.php");
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>




















<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->

	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>ห้างหุ้นส่วนจำกัด ฟ้ารุ่งชนธวัช 2014</title>
</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text"> ฟ้ารุ่งชนธวัช 2014</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="index.php">
					<i class='bx bxs-dashboard'></i>
					<span class="text">หน้าหลัก</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">My Store</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="employee.php">
					<i class='bx bxs-group'></i>
					<span class="text">พนักงาน</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog'></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="/mini/index.php" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->
		<?php 
    require_once('test1.php'); ?>

		<!-- MAIN -->
		

		
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script.js"></script>
</body>

</html>