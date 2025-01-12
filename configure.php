<?php

  $connection = mysqli_connect('localhost','root','','user_db');

  if(isset($_POST['send'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $phonenumber= $_POST['phonenumber'];
     $number= $_POST['number'];
     
     $request = " insert into user_pay(name, email, phonenumber, number) values('$name', '$email', '$phonenumber', '$number')";

     mysqli_query($connection, $request);

     header('location:withdraw.php');
  }else{
    echo 'something went wrong try again';
  }

?>