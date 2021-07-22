<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobilenumber = $_POST['mobilenumber'];
    $message = $_POST['message'];

    //database connection
    $conn = new mysqli('localhost','root','','vdp');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into contact(name,email,mobilenumber,message)
        values(?,?,?,?)");
        $stmt->bind_param("ssis",$name,$email,$mobilenumber,$message);
        $stmt->execute();
        echo "your message is sumbitted...";
        $stmt->close();
        $conn->close();
    }
?>