<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'portfolio';

    $conn = new mysqli($host,$username,$password,$database);

    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("INSERT INTO contact(name,email,mobile,subject,message) values(?,?,?,?,?)");
        $stmt->bind_param("ssiss",$name, $email, $mobile, $subject,$message);
        $stmt->execute();
        echo "Data Submitted Successfully!";
        $stmt->close();
        $conn->close();
    }

    

?>