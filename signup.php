
<?php
$message = [];  

if(isset($_POST['name']) &&
 isset($_POST['email']) && 
 isset ($_POST['phone'])&&
  isset ($_POST['password'])){
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    if (empty($name)) {
        $message = ['type'=>"Error", "msg"=>"Full name is required"];
    }else if  (empty($email)){
        $message = ['type'=>"Error", "msg"=>"Email is required"];
    }else if  (empty($phone)){
        $message = ['type'=>"Error", "msg"=>"Phone is required"];
    }else if  (empty($password)){
        $message = ['type'=>"Error", "msg"=>"Password is required"];
    }else {
       $message = ['type'=>"Success", "msg"=>"Successfull"];
    }
}else{

    $message = ['type'=>"Error", "msg"=>"Error, Please fill the form"];
}

 echo json_encode($message);