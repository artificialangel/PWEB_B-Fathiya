<?php ?>
<!DOCTYPE html>
<html>
<head>
<title>Contact Form AJAX</title>
<style>
/* Center the form vertically and horizontally */
body {
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f7f7f7;
  font-family: Arial, sans-serif;
}

/* Form container */
.main {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 20px hsla(318, 75%, 36%, 0.2);
  padding: 30px;
  width: 350px;
}

/* Heading style */
.main h1 {
  color: #f55ff0;
  margin-bottom: 20px;
  font-size: 22px;
  text-align: center;
}

/* Labels */
label {
  display: block;
  margin-bottom: 5px;
  color: #555;
  font-weight: bold;
  font-size: 14px;
}

/* Inputs and textarea */
input[type="text"],
input[type="email"],
textarea {
  width: 100%;
  margin-bottom: 15px;
  padding: 10px;
  box-sizing: border-box;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 14px;
  outline: none;
  transition: border-color 0.3s;
}

input[type="text"]:focus,
input[type="email"]:focus,
textarea:focus {
  border-color: #ea2dd4;
}

/* Submit button */
button {
  padding: 12px;
  border-radius: 8px;
  border: none;
  background-color: #ea2dd4;
  color: white;
  cursor: pointer;
  width: 100%;
  font-size: 16px;
  transition: background 0.3s;
}

button:hover {
  background-color: #d01cb0;
}

/* Message box */
.message_box {
  margin: 10px 0;
  text-align: center;
  font-weight: bold;
  color: #f55ff0;
}
</style>
</head>
<body>
<div class="main">
<h1>Submit Form Without Page Refresh</h1>
<form name="ContactForm">
<label for="name">Name:</label>
<input type="text" class="form-control" id="name" placeholder="Your Name">
<label for="email">Email:</label>
<input type="email" class="form-control" id="email" placeholder="you@example.com">
<label for="message">Message:</label>
<textarea class="form-control" id="message" placeholder="Write your message..."></textarea>
<button type="submit">Submit</button>
</form>
<div class="message_box"></div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
// Use form submit event
$('form[name="ContactForm"]').submit(function(e){
    e.preventDefault();
    var name = $('#name').val();
    var email = $('#email').val();
    var message = $('#message').val();
    
    if(name==''){ $('.message_box').html('Enter your name'); return; }
    if(email==''){ $('.message_box').html('Enter your email'); return; }
    if(message==''){ $('.message_box').html('Enter your message'); return; }

    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: { name: name, email: email, message: message },
        beforeSend: function(){ $('.message_box').html('Loading...'); },
        success: function(data){ $('.message_box').html(data); },
        error: function(xhr,status,error){ $('.message_box').html('AJAX Error'); console.log(xhr.responseText); }
    });
});
</script>
</body>
</html>
