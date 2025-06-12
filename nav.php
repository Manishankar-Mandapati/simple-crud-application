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
            <a href="index.php"><i style="font-size:20px;" class="ri-home-2-line"></i> Home</a>
             <?php 
                if(isset($_SESSION['username'])){
                    echo ' <a href="createPost.php"><i style="font-size:20px;" class="ri-add-circle-line"></i> Add post</a>
                           <a href="myPosts.php"><i style="font-size:20px;" class="ri-article-line"></i> My Posts</a>';
                }
             ?>
              <?php 
                if(isset($_SESSION['userrole']) && $_SESSION['userrole'] !== 'user'){
                    echo ' <a href="dashboard/adminPanel.php"><i style="font-size:20px;" class="ri-dashboard-3-line"></i> Dashboard</a>';
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