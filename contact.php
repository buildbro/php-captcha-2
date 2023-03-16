<?php
session_start();
$error = "";
if(isset($_POST['submit'])) {
    include "config.php";
    $code = $_POST['code'];
    $query = $mysqli->query("SELECT * FROM captcha_memo WHERE user_id='".session_id()."' AND code='".$code."'");
    $row = $query->fetch_assoc();
    echo session_id();

    if(!empty($row) && $row['code']==$code) {
        echo "Message sent successfully!";
    } else {
        $error = "Wrong code entered!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
</head>
<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
            <form action="" method="post">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
            <label>Email</label>
            <input type="text" name="email" class="form-control">
            <label for="">Messahe</label>
            <textarea name="message" cols="30" rows="10" class="form-control"></textarea>

            <div class="captcha-container">
                <img src="captcha-engine.php" alt="captcha-code">
                <p>Enter the code from the image</p>
                <input type="text" name="code" class="form-control">
                <p><?php echo $error; ?></p>
            </div>
            <input type="submit" name="submit" value="Send" class="btn btn-primary">
        </form>
            </div>
        </div>
    </div>
</body>
</html>