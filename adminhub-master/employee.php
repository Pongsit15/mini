<?php 
    require_once('connection1.php');
   

    if (isset($_REQUEST['delete_id'])) {
        $id = $_REQUEST['delete_id'];

        $select_stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        // Delete an original record from db
        $delete_stmt = $db->prepare('DELETE FROM users WHERE id = :id');
        $delete_stmt->bindParam(':id', $id);
        $delete_stmt->execute();

        header('Location:employee.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
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
				<a href="product.php">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">สินค้าทั่วไป</span>
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
				<a href="#">
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

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>บริหารจัดการข้อพนักงาน</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">หน้าหลัก</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">บริหารจัดการข้อมูลพนักงาน</a>
						</li>
					</ul>
				</div>
				<a href="./add_employee.php" class="btn-download">
					<i class='bx bxs-cloud-download'></i>
					<span class="text">เพิ่มข้อมูลพนักงาน</span>
				</a>
			</div>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>พนักงาน</h3>
						<i class='bx bx-search'></i>
						<i class='bx bx-filter'></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>ชื่อ</th>
								<th>นามสกุล</th>
								<th>ตำเเหน่ง</th>
								<th>รายได้พนักงาน</th>
								<th>รายละเอียด</th>
								<th>เเก้ไข</th>
								<th>ลบ</th>

							</tr>

						</thead>


						<tbody>
							<?php 
    $select_stmt = $db->prepare("SELECT * FROM users");
    $select_stmt->execute();
    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
?>

							<td>
								<img src="img/people.png">
								<p><?php echo $row["fname"]; ?></p>
							</td>

							<td><?php echo $row["lname"]; ?></td>
							<td><?php echo $row["position"]; ?></td>
							<td><?php echo $row["db_salary"]; ?></td>
							<td><a href="details_employee.php?update_id=<?php echo $row["id"]; ?>"
		class="status completed">รายละเอียด</a></td>
<td><a href="edit_employee.php?update_id=<?php echo $row["id"]; ?>"
		class="status process">เเก้ไข</a></td>
<td><a href="?delete_id=<?php echo $row["id"]; ?>" class="status pending">ลบ</a></td>

						
						
						
						



							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script.js"></script>
</body>

</html>