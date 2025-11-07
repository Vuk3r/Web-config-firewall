<?php
session_start();
if(!isset($_SESSION['id_session'])){
    echo '<meta http-equiv="refresh" content="0;url=index.php">';
    exit();
}
include 'conn.php';
$id = $_SESSION['id_session'];
$query = "SELECT `Full Name` from `private_info` WHERE id = '$id'";
$result = mysqli_query($conn,$query);
$row = $result->fetch_array();
$fullname = $row['0'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - E-learning</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
   
</head>

<body>
    <!-- Header with Menu and Avatar -->
    <header class="header">
        <div class="header-left">
            <a href="dashboard.php"><img src="assets/images/daotao.png" alt="VKU Logo" class="logo"></a>
            <h1 class="header-title">E-learning Dashboard</h1>
        </div>
        <div class="user-menu">
            <span class="username" onclick="toggleMenu()">  <?php echo $fullname ?> </span>
        <?php
            $path ='uploads/'.$id.'/';
            if(!is_dir($path)){ //neu thu muc khong ton tai thi tao thu muc moi
            mkdir($path); //tao thu muc uploads/24GIT202
            touch($path . $id . '.png');
            } 
            $all_file = scandir($path);
            $profile_path;
            foreach($all_file as $f){ 
            if ($f !== '.' && $f !== '..'){
                $profile_path = $path . $f; 
                break;
            }
            }
            echo '<img src="'.  $profile_path .'" alt="User Avatar" class="avatar" onclick="toggleMenu()"></label>'; 
            
        ?>
            
            <div class="dropdown-menu" id="dropdownMenu">
            <?php 
             echo '<a href="Profile.php" class="logout"> <i class="icon icon-logout"></i> Profile</a>';
                echo '<hr>';
                echo '<a href="index.php?entry=true"><i class="icon icon-profile"></i> Log out</a>';
                if (isset($_GET['logout'])) {
                    session_unset();    // Xóa tất cả các biến session
                    session_destroy();  // Hủy toàn bộ session
                    header("Location: login.php"); // Điều hướng về trang đăng nhập
                    exit();
                } 
            ?>
                
            </div>
        </div>
    </header>

    <script>
        // Hàm toggle menu
        function toggleMenu() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('show');
        }

        // Đóng menu khi nhấp bên ngoài
        window.onclick = function(event) {
            const dropdown = document.getElementById('dropdownMenu');
            if (!event.target.matches('.username') && !event.target.matches('.avatar')) {
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                }
            }
        };
    </script>
    <!-- Main Layout -->
    <div class="container">
        <!-- Profile Summary Sidebar -->
        <aside class="sidebar">
           <!-- Notifications Section -->
           <section class="notifications">
                <h2>Thông báo</h2>
                <?php
                include 'assets/link/announce.php';
                for($i = 0; $i < count($announce); $i++){
                    echo '<a href="'.$announce[$i][1].'" class="notification">' . "$i." . " " . $announce[$i][0] . '</a>'; 
                }
                ?>
                
            </section>
        </aside>

        <!-- Main Content Area -->
        <main class="main-content">
            

            <!-- Course List Section -->
            <section class="courses">
                <h2>Danh sách khóa học</h2>
                <div class="course-list">
                    <?php
                    include 'assets/link/room.php';
                    // $image = 0;
                    // $title = 0;
                    // $description = 0;
                    // $link = 0;
                    
                    for ($i = 0 ; $i < count($room); $i++) {
                        
                       
                        echo '<div class="course">';
                        //  1. link image        
                        echo '<img src="' . $room[$i][0];
                        echo '"alt="Thumbnail Khóa học" class="course-thumbnail">';
                        //  2. Title 
                        echo "<h3> " . $room[$i][1] . " </h3>";
                        //  3. description
                        echo '<p class="course-description">'.$room[$i][2].'</p>';
                        //  4. link to post
                        echo '<a href="'.$room[$i][3].'"class="course-link">Học ngay!</a>';
                       
                        echo '</div>';
                    }
                    ?>
                </div>
            </section>
        </main>

        <!-- Calendar Section -->
        <aside class="calendar">
            <h2>Calendar</h2>
            <div class="calendar-widget">
                <div class="calendar-header">
                    <span class="calendar-prev" onclick="changeMonth(-1)">&#9664;</span>
                    <span class="calendar-title" id="calendar-title">November 2024</span>
                    <span class="calendar-next" onclick="changeMonth(1)">&#9654;</span>
                </div>
                <div class="calendar-body">
                    <div class="calendar-days">
                        <span>Sun</span><span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span>
                    </div>
                    <div class="calendar-dates" id="calendar-dates">
                        <!-- Dates will be dynamically injected by JavaScript -->
                    </div>
                </div>
            </div>
        </aside>
    </div>
    <script class="script" src="assets/js/script.js"></script>
    <!-- Footer -->
    <footer>
        <p>
            <b>Copyright © 2017-2024 - Trường Đại học Công nghệ Thông tin & Truyền Thông Việt - Hàn, Đại học Đà Nẵng</b><br>
            Địa chỉ: Khu đô thị Đại học Đà Nẵng, Đường Nam Kỳ Khởi Nghĩa, Quận Ngũ Hành Sơn, Thành phố Đà Nẵng<br>
            Điện thoại: 02366.552.688 - 02363.667.113<br>
            Email: daotao@vku.udn.vn
        </p>
    </footer>

</body>

</html>