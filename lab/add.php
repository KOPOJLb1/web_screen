<?php 
session_start();
require_once('require/db.php');
$mail = $_SESSION['mail'];

$target = "image/".basename($_FILES['file']['name']);
$maxsize = 3145728;

if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
    echo "Изображение превышает 3мб";
}else{
    if($_POST['private'] == '2'){
        $private = "2";
    }else{
        $private = "1";
    }

    $image = $_FILES['file']['name'];
    $date = date("d.m.Y");
 
       
        
    if(move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        $sql = "INSERT INTO `image` (`image`, `private`, `user`, `date`) VALUES ('$image', '$private', '$mail', '$date')";
        mysqli_query($db, $sql);

        $query_add = mysqli_query($db, "SELECT * FROM `image` WHERE `user` = '$mail' ORDER BY id DESC");
        $result_add = mysqli_fetch_array($query_add);


        ?><script>document.location.href = 'article.php?id=<?php echo $result_add['id']; ?>';</script><?
    }
}





?>