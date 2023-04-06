<?php 
 require_once('connection1.php');
if (isset($_REQUEST['update_id'])) {
    try {
        $id = $_REQUEST['update_id'];
        $select_stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
    } catch(PDOException $e) {
        $e->getMessage();
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
                    <h1>บริหารจัดการข้อมูลสินค้า</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">หน้าหลัก</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">รายละเอียดสินค้า</a>
                        </li>
                    </ul>
                </div>


            </div>

            <ul class="box-info">
                <li>

                    <div class="container-fluid p-5 bg-primary text-white text-center">

                        <img src="./img/3.jpg" class="bd-placeholder-img" width="200" height="250"><br><br>
                        
        <h3>  ชื่อ    <?php echo $row['fname'] . ' ' . $row['lname'] ?>   </h3>
 
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <h1> อีเมล :   <h3><?php echo $row["email"]; ?></h3> </h1>
                        </li>
                        <li class="list-group-item">
                            <h1> รหัสผ่าน :    <?php echo $row["password"]; ?> </h1>
                        </li>
                        <li class="list-group-item">
                            <h1>ประเภทผู้ใช้งาน:   <?php echo $row["urole"]; ?> </h1>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h1> ตำเเหน่ง :   <?php echo $row["position"]; ?></h1>
                        </li>
                        <li class="list-group-item">
                            <h1> รายได้พนักงาน :  <?php echo $row["db_salary"]; ?></h1>
                        </li>
                       
                       
                    </ul>
                    
                </li>
                
            </ul>


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="script.js"></script>
</body>

</html>