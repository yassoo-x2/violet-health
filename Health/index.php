<?php
   ob_start();
   session_start();
   if(isset($_SESSION['adm'])){
      header('location: admin/home.php');  //if user name rigester befor go to adminHome.php
      exit();
   }
   elseif(isset($_SESSION['data'])){
      header('location: home.php');  //if user name rigester befor go to adminHome.php
      exit();
   }
   $pageTitle = 'log in' ;
   $nonavbar = '';
   include 'init.php';
   // Save login information as a cookie for 1 year
if (isset($_POST['remember'])) {
   $loginData = [
       'username' => $_POST['user'],
       'password' => $_POST['pass']
   ];
   $cookieValue = json_encode($loginData);
   $expirationTime = time() + (86400 * 365); // 1 year
   setcookie('login_info', $cookieValue, $expirationTime, '/');
}




  //regster post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['loginForm'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if username exists in the database
        $stmt = $con->prepare("SELECT password, user_type FROM login WHERE username = ?");
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $storedPassword = $row['password'];
            $user_type = $row['user_type'];
    
            if ($hashedPassword = $storedPassword) {
              
                if ($user_type == "data") {
                    $_SESSION['data'] = $username;
                    header('location: home.php');
                    exit();
                } elseif ($user_type == "admin") {
                    $_SESSION['adm'] = $username;
                    header('location: admin/home.php');
                    exit();
                }
            } 
        }else{
            echo 'dont fund';
        }

    } 
}
?>
<div class="d-flex">
    <p >Ar</p>
    <label class="switch">
        <input class="set_lang" type="checkbox" checked>
        <span class="slider round"></span>
    </label>
    <p>En</p>
</div>
<div class='container login mt-auto' id='login_div'>
    <form class='form-horizontal ' action='' method='POST'>
        <h1 class='login-text'><?php echo $trans['login'] ;?></h1>
        <div class='input-group form-group'>
            <div class=' input-box '>
                <input type='text' id='login_input text' placeholder=' ' name='user'
                    class='text-input form-control login_input' autofocus required>
                <span><?php echo $trans['user name'] ;?></span>
            </div>
        </div>
        <div class='input-group form-group'>
            <div class=' input-box '>
                <input type='password' placeholder=' ' id='login_pass' name='pass' class='form-control text-input'
                    required>
                <span><?php echo $trans['password'] ;?></span>
            </div>
        </div>
        <div class='form-group'>
            <button type='submit' name='loginForm' id='login_butt' class='btn btn-primary  login_butt '><?php echo $trans['login'] ;?></button>
        </div>
    </form>
</div>,









<?php include  $tpl . 'footer.php';

ob_end_flush()
?>