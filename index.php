<?php
// require_once('backend/dbConnection.php');
require_once('pagination.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include("nav.php")  ?>
    <div class="container">
        <div class="wrapper">
             <?php
            foreach($posts as $post){
        ?>
            <div class="post-container flex-box flex-col">
                <div class="post-img">
                    <img src="https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=" alt="post-image">
                </div>
                <div class="post-content flex-box flex-col">
                    <h3 class="post-title"><?php echo $post['title']?></h3>
                    <p class="post-description"><?php echo substr($post['content'], 0, 150).'...'?></p>
                </div>
                     <div class="post-btns flex-box">
                        <!-- <button class="btn">view</button> -->
                    <a href="edit.php?id=<?php echo $post['id'];?>"><button class="btn">Edit</button></a>
                    <a href="delete.php?id=<?php echo $post['id'];?>"><button class="btn">Delete</button></a>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

    <div class="pagination">
        <a href="?page_no=1" class="btn">first</a>

        <a href="?page_no=<?php echo  $page>1 ? $page-1 : 1; ?>" class="btn">&laquo; Previous</a>

        <div class="page_buttons">
            <?php for($i = $start; $i<= $end; $i++) {
            $activeClass = ($i == $page) ? 'active' : "";    
            ?>
                <a href="?page_no=<?php echo $i;?>" class="<?php echo $activeClass?>"> <span class="page_btn"><?php echo $i?></span></a>
            <?php } ?>
        </div>

        <a href="?page_no=<?php echo  $page<$total_pages ? $page+1 : $total_pages; ?>" class="btn">Next &raquo;</a>

        <a href="?page_no=<?php echo $total_pages?>" class="btn">last</a>
    </div>
</body>
</html>