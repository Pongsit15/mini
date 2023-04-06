<?php 
    require_once('connection1.php');

    if (isset($_REQUEST['btn_insert'])) {
        $Shelf = $_REQUEST['txt_Shelf'];
        $product_name = $_REQUEST['txt_product_name'];
        $C_Color = $_REQUEST['txt_C_Color'];
		$T_Type = $_REQUEST['txt_T_Type'];
		$S_Size = $_REQUEST['txt_S_Size'];
		$W_Weight = $_REQUEST['txt_W_Weight'];
		$Price = $_REQUEST['txt_Price'];
        
		

        if (empty($Shelf)) {
            $errorMsg = "กรุณาเพิ่มข้อมูลชั้นวางสินค้า";
        } else if (empty($product_name)) {
            $errorMsg = "กรุณาเพิ่มข้อมูลชื่อสินค้า";
        } else if (empty($C_Color)) {
            $errorMsg = "กรุณาเพิ่มข้อมูลสีสินค้า";
		} else if (empty($T_Type)) {
			$errorMsg = "กรุณาเพิ่มข้อมูลประเภทสินค้า";
		} else if (empty($S_Size)) {
			$errorMsg = "กรุณาเพิ่มข้อมูลขนาดไซส์สินค้า";
		} else if (empty($W_Weight)) {
			$errorMsg = "กรุณาเพิ่มข้อมูลน้ำหนักสินค้า";
		} else if (empty($Price)) {
			$errorMsg = "กรุณาเพิ่มข้อมูลราคาสินค้า";

        } else {

            try {
                if (!isset($errorMsg)) {
			
                    $insert_stmt = $db->prepare("INSERT INTO db_product (Shelf, product_name,C_Color,T_Type,S_Size,W_Weight,Price) VALUES 
                    (:Shelf, :product_name,:C_Color,:T_Type,:S_Size,:W_Weight,:Price)");
                    $insert_stmt->bindParam(':Shelf', $Shelf);
                    $insert_stmt->bindParam(':product_name', $product_name);
                    $insert_stmt->bindParam(':C_Color', $C_Color);
					$insert_stmt->bindParam(':T_Type', $T_Type);
					$insert_stmt->bindParam(':S_Size', $S_Size);
					$insert_stmt->bindParam(':W_Weight', $W_Weight);
					$insert_stmt->bindParam('Price', $Price);

                    if ($insert_stmt->execute()) {
                        $insertMsg = "กำลังดำเนินการเพิ่มข้อมูลสินค้า...";
                        header("refresh:2;product.php");
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
            <li class="active">
                <a href="product.php">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">สินค้าทั่วไป
                    </span>
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
                    <span class="text">สินค้า</span>
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
            <div class="head-title">
                <div class="left">
                    <h1>บริหารจัดการข้อมูลสินค้า</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">หน้าหลัก</a>
                        </li>
                        <li>
                            <a href="#">บริหารจัดการข้อมูลสินค้า</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">เพิ่มข้อมูลสินค้า</a>
                        </li>
                    </ul>
                </div>

            </div>

            <body>

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
                                <label for="Shelf" class="col-sm-1 control-label">รหัสชั้นวางสินค้า</label>
                                <div class="col-sm-3">
                                    <input type="text" name="txt_Shelf" class="form-control"
                                        placeholder="รหัสชั้นวางสินค้า...">
                                </div>
                                <label for="product_name" class="col-sm-1 control-label">ชื่อสินค้า</label>
                                <div class="col-sm-3">
                                    <input type="text" name="txt_product_name" class="form-control"
                                        placeholder="ชื่อสินค้..."> <br>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <div class="row">
                                    <label for="C_Color" class="col-sm-1 control-label">สีสินค้า</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="txt_C_Color" class="form-control"
                                            placeholder="สีสินค้า..."><br>
                                    </div>
                                    <div class="row">

                                        <div class="form-group text-center">
                                            <div class="row">
                                                <label for="T_Type" class="col-sm-1 control-label">ประเภทสินค้า</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="txt_T_Type" class="form-control"
                                                        placeholder="ประเภทสินค้า...">
                                                </div>

                                                <label for="S_Size" class="col-sm-1 control-label">ขนาดไซส์</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="txt_S_Size" class="form-control"
                                                        placeholder="ขนาดไซส์..."> <br>
                                                </div>

                                                <label for="W_Weight"
                                                    class="col-sm-1 control-label">น้ำหนักสินค้า</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="txt_W_Weight" class="form-control"
                                                        placeholder="น้ำหนักสินค้า..."> <br>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group text-center">
                                            <div class="row">
                                                <label for="Price" class="col-sm-1 control-label">ราค่าสินค้า</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="txt_Price" class="form-control"
                                                        placeholder="Enter urole..."><br>
                                                </div>




                                            </div>
                                        </div>
                                    </div>










                                    <div class="form-group text-center">
                                        <div class="col-md-12 mt-3">
                                            <input type="submit" name="btn_insert" class="btn btn-success"
                                                value="เพิ่มข้อมูล">
                                            <a href="product.php" class="btn btn-danger">ยกเลิก</a>
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