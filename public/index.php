<?php 
session_start();
if(isset($_POST['student_id']) && isset($_POST['password'])){
include 'conn.php';
$id =   $_POST['student_id'];
$password = $_POST['password'];

$query = "SELECT * FROM `account` WHERE id = '$id' AND password = '$password'";

/*===================================PREPARE STATEMENT===================================
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
===================================PREPARE STATEMENT===================================*/

// $query = "SELECT * FROM `account` WHERE id = '' OR 1=1 --' AND password = '$password'";

$result = mysqli_query($conn,$query);
// print_r($result);
$row = mysqli_fetch_array($result);
// print_r($row);
if(!isset($row)){
    echo '<div><div class="error-message">invalid login, please try again</div></div>';
   // header("Location: admin.php");
   
}
else {
    $id = $row['ID'];
    $_SESSION['id_session'] = $id;
    echo '<meta http-equiv="refresh" content="0;url=dashboard.php"';
}
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    

</head>
<body>
    <header>
        <img src="assets/images/daotao.png" alt="Đào Tạo">
    </header>
    <main>

        <div class="login-container">
            <form method="POST" class="login-form">
<h2>Đăng Nhập</h2>
<div class="form-group">
    <label for="student_id">Tên đăng nhập</label>
   <label for="student_id"> <input type="text" id="student_id" name="student_id" placeholder="ID" required></label>
</div>
<div class="form-group">
    <label for="password">Mật khẩu</label>
    <input type="password" id="password" name="password" placeholder="Password" required>
</div>
<!-- <div><div class="error-message">invalid login, please try again</div></div> -->
<button type="submit">Đăng Nhập</button>
            </form>
        </div>
    </main>
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