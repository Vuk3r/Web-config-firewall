<?php
session_start();
if(!isset($_SESSION['id_session'])){
  echo '<meta http-equiv="refresh" content="0;url=index.php">';
  exit();
}
$id = $_SESSION['id_session'];
require('conn.php');
?>
<!-- ===========================================PROFILE================================================= -->
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  <link rel="stylesheet" href="assets/css/edit.css">
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

</head>
<body>
  
  <div class="container">
  <aside class="sidebar">
  <div class="profile">
   
    <form method="post" enctype="multipart/form-data">
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
    echo '<label for="profile-pic-upload" class="profile-pic-label"><img src="'.  $profile_path .'" alt="Profile Picture" class="profile-pic"></label>'; 
    
    ?>
     <!-- =================================================UPLOADS============================================== -->
    <input type="file" id='profile-pic-upload' name='profile-pic-upload' accept="image/*" style="display: none;" onchange="this.form.submit()">
    </form>
    <?php
    $path ='uploads/'.$id.'/';
    //check co phai file vua up len hay khong
    if(isset($_FILES['profile-pic-upload']) && $_FILES['profile-pic-upload']['error'] === UPLOAD_ERR_OK){
      //da ton tai thu muc uploads/24GIT202
    
      $all_file = scandir($path);
      foreach($all_file as $f){
        if($f !== '.' && $f !== '..' && file_exists( $path . $f ) && !is_dir( $path . $f )){
          unlink($path . $f);
        }
      }
    $TargetFile = $path .'/'.$_FILES['profile-pic-upload']['name'];
      //tmp/upload/jlzhao --> uploads/24GIT202/zxc.php
    if(move_uploaded_file($_FILES['profile-pic-upload']['tmp_name'], $TargetFile )){
      echo "<div style='color : #1dff04;
             margin-top : 10px; margin-left : 20px; margin-bottom: 20px'
            >Cập nhật thành công!</div>";
            echo '<meta http-equiv="refresh" content="0;url=edit.php">';
    } else {
       echo "DBRR";
      }
}
    ?>
  <!-- =================================================UPLOADS============================================== -->

    <?php
      $QC_school_info = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'school_info'";
      $QR_school_info = "SELECT * FROM school_info WHERE ID = '$id'";

      $result_column = mysqli_execute_query($conn, $QC_school_info);
      $result_row = mysqli_execute_query($conn, $QR_school_info);

      $Column_name = $result_column->fetch_array();
      $Row_value = $result_row->fetch_array();

      $fullname = $Row_value[1];
      $msv      = $Row_value[0];

      echo "<h2>" . $Row_value[1] . "&#x1F393;</h2>";
     
      echo "<hr>";
      echo "<p style=".'"font-size: 14px;"' .">MSV: " . $Row_value[0] . "</p>";
      echo "<br>";echo "<hr>";
      echo "<p style=".'"font-size: 14px;"' .">Class: " . $Row_value[2]. "</p>";
      echo "<br>";echo "<hr>";
      echo "<p style=".'"font-size: 14px;"' .">Course: " . $Row_value[5] . "</p>";
      echo "<br>";echo "<hr>";
      echo "<p style=".'"font-size: 14px;"' .">Major: " . $Row_value[3] . "</p>";
      echo "<br>";echo "<hr>";
      echo "<p style=".'"font-size: 14px;"' .">Faculty: " . $Row_value[6] . "</p>";
       
    ?>
    
    <hr style="margin-top: 40px;color : #c6c3c3">
  <?php
  echo '<a href="Profile.php?id='.$id.'"><button class="logout-btn">&#x2B90; Back </button></a>';
  
  ?>
  </div>

</aside>
    <!-- ===================================================TOP-BAR============================================== -->
    <div class="unique-top-right-bar">
  <div class="unique-menu-icon">
    <div class="unique-bar"><a href="dashboard.php?id=" class="unique-bar">&#x2302;</a></div>
    <div class="unique-bar"></div>
    <div class="unique-bar"></div>
  </div>
  <div class="unique-title">
    Học kỳ 1 - 2024-2025
  </div>
  <div class="unique-user-info">
    
   <?php echo "<span>". $fullname . " - " . $msv ."</span>"; ?>

       
    <?php 
    

    echo '<img src="'. $profile_path .'" alt="Avatar" class="unique-avatar">';
     ?> 
  </div>
</div>
    <!-- ============================================================================================================================= -->
   
    

    <main class="content">
    <section class="personal-info" id="personal-info" >
        <h3>Profile</h3>
        <div class="info-grid" >
        <!-- =======================================school-info=========================================== -->
        
  <form>
    <table>
      
        <?php
          $QC_school_info="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'school_info'";
          $QR_school_info="SELECT * FROM school_info WHERE ID = '$id'";

       
          $result_column = mysqli_execute_query($conn,$QC_school_info);
          $result_row = mysqli_execute_query($conn,$QR_school_info);

          $Column_name=$result_column->fetch_array(); //phần tử đầu tiên của cột luôn là id nên loại bỏ
          
          $Row_value=$result_row->fetch_array(); //row chỉ trả về 1 hàng vì select theo id
          $i=1; 
        
          while($Column_name=$result_column->fetch_array() ){
            echo ($i % 2 == 1 ) ? '<tr>' : '';
            echo '<td style="padding-left: 40px; padding-right: 5px;"><div><strong>'."$Column_name[0] : "."</strong>"; 
            echo "<br>";
            echo '<input style=" background-color: #c6c3c3; cursor :not-allowed;" disabled
             type="text" value="'.$Row_value[$i].'">'."</div></td>";
            echo ($i % 2 == 0 ) ? '</tr>' : '';
            $i++;
           
          }
            ?>
    </table>
  </form>
        
        <!-- <div><strong>Họ và tên:</strong> Lê Đình Vũ</div>
          <div><strong>Lớp :</strong>23CE.B030 </div>
          <div><strong>Khóa :</strong> 2023-2027</div>
          <div><strong>Ngành : </strong> Thiết Kế Vi Mạch Bán Dẫn (Cử Nhân) </div>
          <div><strong>Khoa : </strong> Kỹ Thuật Máy Tính và Điện Tử</div> -->
        <!-- ================================================================================================================= -->
        </div>
      </section>
      <!-- -->
      <section class="personal-info">
        <h3>Personal</h3>
        <div class="info-grid">
        <!-- ======================================private-info============================================== -->
        <form method="GET">
      <table>
      
        <?php
          $QC_private_info="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'private_info'";
          $QR_private_info="SELECT * FROM private_info WHERE ID = '$id'";

       
          $result_column = mysqli_execute_query($conn,$QC_private_info);
          $result_row = mysqli_execute_query($conn,$QR_private_info);

          $Column_name=$result_column->fetch_array(); //phần tử đầu tiên của cột luôn là id nên loại bỏ
          
          $Row_value=$result_row->fetch_array(); //row chỉ trả về 1 hàng vì select theo id
          $i=1; 
        
          while($Column_name=$result_column->fetch_array() ){
            echo ($i % 2 == 1 ) ? '<tr>' : '';
            echo '<td style="padding-left: 40px; padding-right: 5px;"><div><strong>'."$Column_name[0] : "."</strong>"; 
            echo "<br>";
            echo '<input style=" background-color: #c6c3c3; cursor :not-allowed;" disabled type="text" value="'.$Row_value[$i].'">'."</div></td>";
            echo ($i % 2 == 0 ) ? '</tr>' : '';
            $i++;
           
          }
            ?>
    </table>
    
  </form>
          

        <!-- <div><strong>Họ và tên:</strong> Lê Đình Vũ</div>
          <div><strong>Ngày sinh:</strong> 2005-03-11</div>
          <div><strong>Giới tính:</strong> Nam</div>
          <div><strong>CCCD:</strong> 048205002022</div>
          <div><strong>Nơi cấp:</strong> Đà Nẵng</div>
          <div><strong>Ngày cấp:</strong> 2023-06-22</div>
          <div><strong>Tôn giáo:</strong> Không</div> -->
        <!-- ================================================================================================================= -->
        </div>
      </section>


      <section class="address-info" >
        <h3>Address</h3>
        <div class="info-grid" id="address-grid">
          <!-- ====================================address-info================================================ -->
         
  <form method="POST">
      <table>
      
        <?php
          $QC_address_info="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'address_info'";
          $QR_address_info="SELECT * FROM address_info WHERE ID = '$id'";

       
          $result_column = mysqli_execute_query($conn,$QC_address_info);
          $result_row = mysqli_execute_query($conn,$QR_address_info);

          $Column_name=$result_column->fetch_array(); //phần tử đầu tiên của cột luôn là id nên loại bỏ
          
          $Row_value=$result_row->fetch_array(); //row chỉ trả về 1 hàng vì select theo id
          $i=1; 
        
          while($Column_name=$result_column->fetch_array() ){
            echo ($i % 2 == 1 ) ? '<tr>' : '';
            echo '<td style="padding-left: 40px; padding-right: 5px;"><div><strong>'."$Column_name[0] : "."</strong>"; 
            echo "<br>";
            echo '<input required type="text" name="address[]" value="'.$Row_value[$i].'">'."</div></td>";
            echo ($i % 2 == 0 ) ? '</tr>' : '';
            $i++;
           
          }
            ?>
    </table>
          <?php 
          if(isset($_POST['update_address_info']) ){
            // echo "<div style='color : #1dff04;
            //  margin-top : 20px; margin-left : 45%'
            // >Cập nhật thành công!</div>";
            echo '<meta http-equiv="refresh" content="0;url=edit.php?id='.$id.'">';
          }
          ?>

    <input type="submit" name='update_address_info' id='update_address_info' 
        style="background-color: #4CAF50; color: white; border: none;  caret-color: #4CAF50;
        padding: 15px 20px 15px 20px ; 
         margin-left: 45%; margin-top :10px;
        width : 130px; text-align: center; text-decoration: none; 
        display: inline-block; font-size: 16px; 
        cursor: pointer; border-radius: 5px;" 
          value="&#x1F4BE; Update">
  </form>
          <?php
          if(isset($_POST['update_address_info'])){

            //prepare columns's name
            $QC_address_info="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'address_info'";
            $result_column = mysqli_execute_query($conn,$QC_address_info);
            $Column_name=$result_column->fetch_array(); //phần tử đầu tiên của cột luôn là id nên loại bỏ
            
            $address = $_POST['address']; //lay ra gia tri duoc gui - day la 1 mang 
            $query =' UPDATE address_info SET '; 
            /* 
            '`Full Address` = '.'123123123', 
            `City` = 'ĐÀ NẴNG', 
            `District` = 'THANH KHÊ', 
            `Ward` = 'THẠCH GIÁN' 
            WHERE `address_info`.`ID` = '24GIT202'
            */
            $Column_Value = [];
            foreach($address as $Column => $Value){
              $Column_name=$result_column->fetch_array();
             $Column_Value[] = " `$Column_name[0]`  =  '$Value' ";
            }
            $query .= implode(',',$Column_Value) . " WHERE `ID` = '$id' ;" ;
            $result = mysqli_execute_query($conn, $query);
            
          }
          ?> 
        <!-- ================================================================================================================= -->
        </div>
        
      </section>
  
      <section class="contact-info" >
        <h3>Contact</h3>
        <div class="info-grid" id="contact-info">
          <!-- ====================================contact-info=============================================== -->
  <form method="POST">
      <table>
      
        <?php
          $QC_contact_info="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'contact_info'";
          $QR_contact_info="SELECT * FROM contact_info WHERE ID = '$id'";

       
          $result_column = mysqli_execute_query($conn,$QC_contact_info);
          $result_row = mysqli_execute_query($conn,$QR_contact_info);

          $Column_name=$result_column->fetch_array(); //phần tử đầu tiên của cột luôn là id nên loại bỏ
          
          $Row_value=$result_row->fetch_array(); //row chỉ trả về 1 hàng vì select theo id
          $i=1; 
        
          while($Column_name=$result_column->fetch_array() ){
            echo ($i % 2 == 1 ) ? '<tr>' : '';
            echo '<td style="padding-left: 40px; padding-right: 5px;"><div><strong>'."$Column_name[0] : "."</strong>"; 
            echo "<br>"; 
            echo '<input require type="text" name="contact[]" value="'.$Row_value[$i].'">'."</div></td>";
            echo ($i % 2 == 0 ) ? '</tr>' : '';
            $i++;
          }
            ?>
    </table>
          <?php 
          if(isset($_POST['update_contact_info']) ){
            // echo "<div style='color : #1dff04;
            //  margin-top : 20px; margin-left : 45%'
            // >Cập nhật thành công!</div>";
            echo '<meta http-equiv="refresh" content="0;url=edit.php?id='.$id.'">';
          }
          ?>

    <input type="submit" name='update_contact_info' id='update_address_info' 
        style="background-color: #4CAF50; color: white; border: none;  caret-color: #4CAF50;
        padding: 15px 20px 15px 20px ; 
         margin-left: 45%; margin-top : 10px;
        width : 130px; text-align: center; text-decoration: none; 
        display: inline-block; font-size: 16px; 
        cursor: pointer; border-radius: 5px;" 
          value="&#x1F4BE; Update">
         
  </form>
      <?php
          if(isset($_POST['update_contact_info'])){

            //prepare columns's name
            $QC_contact_info="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'contact_info'";
            $result_column = mysqli_execute_query($conn,$QC_contact_info);
            $Column_name=$result_column->fetch_array(); //phần tử đầu tiên của cột luôn là id nên loại bỏ
            
            $contact= $_POST['contact']; //lay ra gia tri duoc gui - day la 1 mang 
            $query =' UPDATE contact_info SET '; 
            
            $Column_Value = [];
            foreach($contact as $Column => $Value){
              $Column_name=$result_column->fetch_array();
             $Column_Value[] = " `$Column_name[0]`  =  '$Value' ";
            }
            $query .= implode(',',$Column_Value) . " WHERE `ID` = '$id' ;" ;
            $result = mysqli_execute_query($conn, $query);
            
          }
          ?> 
  
        <!-- 
         //   $Column_name=$result_column->fetch_array();
        //   echo "<div><strong>"."$Column_name[0] : "."</strong>".'<a href="'."$Row_value[$i]".'"'.'target="_blank"'.'>https://www.facebook.com/profile.php?id=100027192362010</a>'."</div>";
         
        <div><strong>Email khác:</strong> connguathanhtroia@gmail.com</div>
          <div><strong>Điện thoại:</strong> 0764524805</div>
          <div><strong>Facebook:</strong> -</div>
          <div><strong>Zalo:</strong> 0764524805</div> 
          -->
        <!-- ================================================================================================================= -->
        </div>
      </section>

      <footer>
        <p>©Bản quyền thuộc về Trường ĐH CNTT&TT Việt - Hàn - Đại học Đà Nẵng</p>
      </footer>
    </main>
  </div>
</body>
</html>
