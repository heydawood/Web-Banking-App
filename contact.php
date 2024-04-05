<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `contact` (`name`, `email`, `subject`, `message`, `time`) VALUES ('$name', '$email', '$subject', '$message', current_timestamp());";
    $result = mysqli_query($conn , $sql);

    if ($result) {
        echo '<script>alert("Message Sended Successfully !!") </script>';
    }
    else {
        echo '<script>alert("Oops! Message failed to send!! Try after some time.") </script>';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/table.css">
    <title>CONTACT</title>
</head>
<body>
    <?php include 'partials/_navbar.php'; ?>

    <div class="cover"></div>

    <h1>CONTACT &nbsp; ME</h1>
    <div class="contact">
            <div class="contactcontanner">

                <div class="contanner">
                    <div class="heading">
                        <div class="icon"><i class="far fa-map"></i></div>
                        <div class="info">
                            <p>Address : </p>
                            <p id="contactinfo">Registrar Office, Abbasia Campus, University Chowk, Bahawalpur</p>
                        </div>
                    </div>
    
                    <div class="heading">
                        <div class="icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="info">
                            <p>Phone : </p>
                            <p id="contactinfo">+92-301-4333430</p>
                        </div>
                    </div>
    
                    <div class="heading">
                        <div class="icon"><i class="far fa-envelope"></i></div>
                        <div class="info">
                            <p>Email : </p>
                            <p id="contactinfo">info@dawoodbank.com</p>
                        </div>
                    </div>
                </div>

                <div class="messageform">
                    <div class="form">
                        <form action="" method="POST">

                            <style>
                                ::placeholder {color: rgba(255, 255, 255, 0.7);}
                            </style>
        
                            <input type="text" name="name" placeholder="NAME" required>
                            <input type="email" name="email" placeholder="EMAIL" required>
                            <input type="text" name="subject" placeholder="SUBJECT" required>
                            <textarea type="message" name="message" id="inputbox"  cols="30" rows="5" placeholder="MESSAGE" required></textarea>
                            <button type="submit">SEND MESSAGE</button>
        
                        </form>
                    </div>
                </div>

            </div>
        </div>

    <?php include 'partials/_footer.php'; ?>
    <!-- script -->
    <script src="js/navscroll.js"></script>
</body>
</html>