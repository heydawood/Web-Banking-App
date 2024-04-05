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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Dawood Bank</title>
</head>

<body>
    <?php include 'partials/_navbar.php'; ?>

    <div class="cover"></div>

    <div class="container">

        <div class="welcome">
            <h3>Welcome to </h3>
            <h1>The Dawood Bank</h1>
        </div>

        <div class="allbtns">
            <a href="all_user.php"><button type="button"><i class="fas fa-users"></i> ALL USERS &nbsp;&nbsp;&nbsp; </button></a>
            <a href="create_user.php"><button type="button"><i class="fas fa-user"></i> CREATE USER &nbsp;&nbsp;&nbsp; </button></a>
            <a href="transfer_money.php"><button type="button"><i class="fas fa-hand-holding-usd"></i> TRANSFER MONEY &nbsp;&nbsp;&nbsp; </button></a>
            <a href="transfer_log.php"><button type="button"><i class="fas fa-history"></i> TRANSACTION LOG &nbsp;&nbsp;&nbsp; </button></a>
        </div>
        
    </div>

    <?php include 'partials/_footer.php'; ?>
    <!-- scripts  -->
    <script src="js/navscroll.js"></script>
</body>

</html>