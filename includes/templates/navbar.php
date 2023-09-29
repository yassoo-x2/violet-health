 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#app-nav"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="app-nav">
         <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
                 <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
             </li>
             <li>
                 <a class="nav-link active " href="history.php" tabindex="-1" aria-disabled="true">History</a>
             </li>
             <li>
                 <a class="nav-link  " href="./admin/logout.php" tabindex="-2" aria-disabled="true">logout</a>
             </li>
         </ul>
     </div>
     <div class="user-info-div">
         <?php  
    $user = $_SESSION['data']; echo"<h5 class='user-info'>" . "<i class='fas fa-user-secret wallet'></i> " . $user . "</h5>";
    ?>
     </div>
     <div class="d-flex">
         <p >En</p>
         <label class="switch">
             <input class="set_lang" type="checkbox" checked>
             <span class="slider round"></span>
         </label>
         <p>Ar</p>
     </div>

     <?php
    $stmt = $con->prepare("SELECT * FROM login WHERE username = '$user'");
    $stmt -> execute();
    $rows =$stmt->fetchAll();
    foreach ($rows as $row) {

    $userid = $row['userid'] ; $siteid = $row['siteid'] ; }?>
 </nav>