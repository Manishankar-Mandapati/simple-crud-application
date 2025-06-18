<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
    />
    <title>Document</title>
</head>
<body>
    <nav class="flex-box">
        <div class="logo">
            <span>My Blogs</span>
        </div>

        <div class="nav-links flex-box">
                <a href="index.php">
                    <div class="box">
                        <div class="icon"><i class="ri-home-2-line"></i></div>
                        <div class="icon-text">
                            <span>Home</span>
                        </div>
                    </div>
                </a>

                 <!-- <div class="box">
                        <div class="icon"><i class="ri-dashboard-3-line"></i></div>
                        <div class="icon-text">
                            <span>Dashboard</span>
                        </div>
                    </div> -->
             <?php 
                if(isset($_SESSION['username'])){
                    echo ' <a href="createPost.php"> <div class="box">
                        <div class="icon"><i class="ri-add-circle-line"></i></div>
                        <div class="icon-text">
                            <span>Add post</span>
                        </div>
                    </div></a>
                           <a href="myPosts.php"><div class="box">
                        <div class="icon"><i class="ri-article-line"></i></div>
                        <div class="icon-text">
                            <span>My Posts</span>
                        </div>
                    </div> </a>';
                }
             ?>
              <?php 
                if(isset($_SESSION['userrole']) && $_SESSION['userrole'] !== 'user'){
                    echo ' <a href="dashboard/adminPanel.php"><div class="box">
                        <div class="icon"><i class="ri-dashboard-3-line"></i></div>
                        <div class="icon-text">
                            <span>Dashboard</span>
                        </div>
                    </div> </a>';
                }
             ?>
        </div>
        
        <div class="searchform">
                <form action="search.php" method="get" >
                    <input type="text" name="search" placeholder="search...">
                    <input type="submit" name="search_button" value="search" class="btn">
                </form>
        </div>

        <div class="nav-links flex-box">
           <?php 
                if(!isset($_SESSION['username'])){
                    echo ' <a href="register.php" class="link"><li>Register</li></a>
                            <a href="login.php" class="link"><li >Login</li></a>';
                }else{
                    echo '<div class="flex-box content-center gap-1">
                            <h2 class="user"> Welcome '.$_SESSION['username'].'</h2>
                            <a href="backend/logout.php" class="logout-btn"><i class="ri-logout-circle-line"></i></a>
                          </div>';
                   
                }
           ?>

           
        </div>
    </nav>
</body>
</html>