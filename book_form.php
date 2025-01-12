<?php

  $connection = mysqli_connect('localhost','root','','user_db');

  if(isset($_POST['send'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $address = $_POST['address'];
     $country = $_POST['country'];
     $state = $_POST['state'];
     
     $request = " insert into user_book(name, email,	phone, address, country, state) values('$name', '$email', '$phone', '$address', '$country', '$state')";

     mysqli_query($connection, $request);

     header('location:book.php');
  }else{
    echo 'something went wrong try again';
  }

?>