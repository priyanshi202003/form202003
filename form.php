<?php
     $FirstName = $_POST['FirstName'];
     $LastName = $_POST['LastName'];
     $email = $_POST['email'];
     $gender = $_POST['gender'];
     $password = $_POST['password'];
     $number = $_POST['number'];

     $conn =new mysqli('localhost','root','','test');
     if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
     }else{
        $stmt = $conn->prepare("insert into registration(FirstName,LastName,email,gender,password,number) values(?,?,?,?,?,?)");
        $stmt->bind_param("sssssi",$FirstName,$LastName,$email,$gender,$password,$number);
        $execcal = $stmt->execute();
        if ($execcal) {
         echo "Registration Successful!";
     } else {
         echo "Error: " . $stmt->error;
     }
        $stmt->close();
        $conn->close();
     }
     ?>
