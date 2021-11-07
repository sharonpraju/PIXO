<?php
session_start();
include('connect.php');
$user_id=$_SESSION['user_id'];
$img_id=$_POST['id'];
$likes=0;
$liked_array=array();
if(isset($_SESSION['user_id']))
{
    //total likes from images table
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->query("SELECT likes FROM images WHERE id='$img_id'");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row)
    {
        $likes=$row['likes'];
    }

    //liked images from users table
    $pdo = pdo_connect_mysql();
    $stmt = $pdo->query("SELECT liked FROM users WHERE id='$user_id'");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row)
    {
        $liked_array=json_decode($row['liked']);
    }
    if (in_array($img_id, $liked_array))
    {
        //already liked
        $status=0;
    }
    else
    {
        array_push($liked_array, $img_id);
        $status=1;
        $likes++;
    }
    $liked_array = json_encode($liked_array);
    //updating liked images in users table
    $sql = "UPDATE users SET liked = ? WHERE id=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$liked_array, $user_id]);

    //updating likes in images table
    $sql = "UPDATE images SET likes = ? WHERE id=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$likes, $img_id]);

    echo $status;
}
?>