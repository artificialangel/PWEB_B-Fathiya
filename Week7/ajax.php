<?php
if(isset($_POST['name'], $_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    echo "<span style='color:green; font-weight:bold;'>Hello $name, your message was received!</span>";
}
else{
    echo "<span style='color:red; font-weight:bold;'>Please provide all required fields.</span>";
}
?>
