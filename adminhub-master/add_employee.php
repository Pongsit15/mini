<?php 
    require_once('connection1.php');

    if (isset($_REQUEST['btn_insert'])) {
        $fname = $_REQUEST['txt_fname'];
        $lname = $_REQUEST['txt_lname'];
        $email = $_REQUEST['txt_email'];
		$password = $_REQUEST['txt_password'];
		$urole = $_REQUEST['txt_urole'];
		$position = $_REQUEST['txt_position'];
		$db_salary = $_REQUEST['txt_db_salary'];
		

        if (empty($fname)) {
            $errorMsg = "กรุณาเพิ่มข้อมูล ชื่อ พนักงาน ";
        } else if (empty($lname)) {
            $errorMsg = "กรุณาเพิ่มข้อมูล นามสกุล พนักงาน ";
        } else if (empty($email)) {
            $errorMsg = "กรุณาเพิ่มข้อมูล อีเมล พนักงาน ";
		} else if (empty($position)) {
			$errorMsg = "กรุณาเพิ่มข้อมูล ตำเเหน่ง พนักงาน ";
		} else if (empty($password)) {
			$errorMsg = "กรุณาเพิ่มข้อมูล รหัสผ่าน พนักงาน ";
		} else if (empty($db_salary)) {
			$errorMsg = "กรุณาเพิ่มข้อมูล รายได้ พนักงาน ";
		} else if (empty($urole)) {
			$errorMsg = "กรุณาเพิ่มข้อมูล ประเภทผู้ใช้งาน พนักงาน ";

        } else {

            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO users (fname, lname,email,position,password,db_salary,urole) VALUES (:fname, :lname,:email,:position,:password,:db_salary,:urole)");
                    $insert_stmt->bindParam(':fname', $fname);
                    $insert_stmt->bindParam(':lname', $lname);
                    $insert_stmt->bindParam(':email', $email);
					$insert_stmt->bindParam(':position', $position);
					$insert_stmt->bindParam(':password', $password);
					$insert_stmt->bindParam(':db_salary', $db_salary);
					$insert_stmt->bindParam('urole', $urole);

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
	<link rel="stylesheet" href="bootstrap/bootstrap.css">
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
			<li>
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

			<li class="active">
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

		<main>

			<body>
				<div class="head-title">
					<div class="left">
						<h1>บริหารจัดการข้อพนักงาน</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">หน้าหลัก</a>
							</li>
							<li>
								<a href="#">บริหารจัดการข้อมูลพนักงาน</a>
							</li>
							<li><i class='bx bx-chevron-right'></i></li>
							<li>
								<a class="active" href="#">เพิ่มข้อมูลพนักงาน</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="container">


					<?php 
         if (isset($errorMsg)) {
    ?>
					<div class="alert alert-danger">
						<strong>Wrong! <?php echo $errorMsg; ?></strong>
					</div>
					<?php } ?>


					<?php 
         if (isset($insertMsg)) {
    ?>
					<div class="alert alert-success">
						<strong>Success! <?php echo $insertMsg; ?></strong>
					</div>
					<?php } ?>

					<form method="post" class="form-horizontal mt-5">

						<div class="form-group text-center">
							<div class="row">
								<label for="fname" class="col-sm-1 control-label">ชื่อ </label>
								<div class="col-sm-3">
									<input type="text" name="txt_fname" class="form-control"
										placeholder="กรอกชื่อ พนักงาน...">
								</div>
								<label for="lname" class="col-sm-1 control-label">นามสกุล</label>
								<div class="col-sm-3">
									<input type="text" name="txt_lname" class="form-control"
										placeholder="กรอกนามสกุล พนักงาน..."> <br>
								</div>
							</div>
							<div class="form-group text-center">
								<div class="row">
									<label for="email" class="col-sm-1 control-label"> อีเมล</label>
									<div class="col-sm-4">
										<input type="text" name="txt_email" class="form-control"
											placeholder="กรอก อีเมล พนักงาน..."><br>
									</div>
									<div class="row">

										<div class="form-group text-center">
											<div class="row">
												<label for="position" class="col-sm-1 control-label">ตำเเหน่ง</label>
												<div class="col-sm-3">
													<input type="text" name="txt_position" class="form-control"
														placeholder="กรอกตำเเหน่ง พนักงาน...">
												</div>

												<label for="password" class="col-sm-1 control-label">รหัสผ่าน</label>
												<div class="col-sm-3">
													<input type="text" name="txt_password" class="form-control"
														placeholder="กรอกรหัสผ่าน พนักงาน..."> <br>
												</div>

												<label for="db_salary" class="col-sm-1 control-label">รายได้</label>
												<div class="col-sm-3">
													<input type="text" name="txt_db_salary" class="form-control"
														placeholder="กรอกรายได้ พนักงาน..."> <br>
												</div>

											</div>
										</div>

										<div class="form-group text-center">
											<div class="row">
												<label for="urole" class="col-sm-1 control-label">ประเภทผู้ใช้งาน</label>
												<div class="col-sm-4">
													<input type="text" name="txt_urole" class="form-control"
														placeholder="กรอกประเภทผู้ใช้งาน..."><br>
												</div>












											</div>
										</div>
									</div>










									<div class="form-group text-center">
										<div class="col-md-12 mt-3">
											<input type="submit" name="btn_insert" class="btn btn-success"
												value="เพิ่มข้อมูล">
											<a href="employee.php" class="btn btn-danger">ยกเลิก</a>
										</div>
									</div>


					</form>

					<script src="js/slim.js"></script>
					<script src="js/popper.js"></script>
					<script src="js/bootstrap.js"></script>
			</body>

</html>


</main>











<!-- MAIN -->
</section>
<!-- CONTENT -->




<script src="script.js"></script>
</body>

</html>