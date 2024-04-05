<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';

    $from = $_GET['id'];
    $to = $_POST['to'];
    $credit = $_POST['credit'];

    $sql = "SELECT * from `users` where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from `users` where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    // check input value is negative or not
    if (($credit)<0) {
        echo '<script type="text/javascript">alert("Oops! Negative values cannot be Transferred") </script>';
    }

    // check insufficient amount.
    else if($credit > $sql1['amount']) {
        echo '<script type="text/javascript">alert("Oops! Insufficient Amount") </script>';
    }
    
    // check zero values
    else if($credit == 0) {
        echo '<script type="text/javascript">alert("Oops! Zero value cannot be Transferred") </script>';
    }

    else {
        
        // deducting credit from sender's account
        $newamount = $sql1['amount'] - $credit;
        $sql = "UPDATE users set amount=$newamount where id=$from";
        mysqli_query($conn,$sql);
        

        // adding credit to reciever's account
        $newamount = $sql2['amount'] + $credit;
        $sql = "UPDATE users set amount=$newamount where id=$to";
        mysqli_query($conn,$sql);
        
        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$credit')";
        $query=mysqli_query($conn,$sql);

        // window.location='index.php';
        if($query){
            echo "<script> alert('Transaction Successful'); window.location='index.php'; </script>"; 
        }

        $newamount= 0;
        $credit =0;
    }   
    
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/table.css">
    <title>TRANSFER MONEY</title>
</head>

<body>

    <?php include 'partials/_navbar.php' ?>
    <div class="cover"></div>

    <h1>TRANSFER &nbsp; MONEY</h1>

    <!--  fatching selected user id details  -->
    <?php
        include 'partials/_dbconnect.php';
        $sid=$_GET['id'];
        $sql = "SELECT * FROM  users where id=$sid";
        $result=mysqli_query($conn,$sql);
        if(!$result)
        {
            echo "Error : ".$sql."<br>".mysqli_error($conn);
        }
        $row=mysqli_fetch_assoc($result);
    ?>

    <div class="all_users">
        <table>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>BALANCE</th>
            </tr>
            <?php 
                echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['amount'].'</td>
                </tr>
                ';
            ?>
        </table>
    </div>

    <form class="transferprocess" method="POST">
        <select id="select" name="to" required>
            <option disabled selected>TRANSFER MONET TO </option>
            <?php
                $sql = "SELECT * FROM  users where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="'.$row["id"].'">'.$row["name"].' (CURRENT BALANCE : '.$row["amount"].' )</option>';
                } 
            ?>
        </select>
        <input type="number" name="credit" placeholder="AMOUNT" required>
        <button type="submit">TRANSFER</button>
    </form>

    <?php include 'partials/_footer.php'; ?>
    <!-- script -->
    <script src="js/navscroll.js"></script>
</body>

</html>