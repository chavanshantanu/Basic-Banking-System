

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./sheet1.css">

        <title>Customer Details</title>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light" id="header">
            <div class="container-fluid">
              <a class="navbar-brand" href="./home.html" id="name">PULSE BANK</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                  <a class="nav-link active" id="link" aria-current="page" href="./home.html">HOME</a>
                  <a class="nav-link active" id="link" href="./customers.php">CUSTOMERS</a>
                  <a class="nav-link active" id="link" href="./transaction.php">TRANSACTIONS</a>
                  <a class="nav-link active" id="link" href="#about">ABOUT US</a>
                </div>
              </div>
            </div>
        </nav>

        <h1 id="h1">Customer Details</h1><br>

        <?php
            //Connecting to the local sql database
            $username = "root";
            $password = "";
            $database = "bank";
            $mysqli = new mysqli("localhost", "$username", "$password", "$database");

            $sid=$_GET['id'];
            $sql = "SELECT * FROM  customers where id='$sid'";
            $result = mysqli_query($mysqli,$sql);

            if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($mysqli);
                }
            $rows=mysqli_fetch_assoc($result);

        ?>

        <div class="table">
            <form method="POST" name="tcredit" >
            <table class="table table-hover table-bordered">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $rows['id']?></th>
                        <td><?php echo $rows['Name']?></td>
                        <td><?php echo $rows['Email']?></td>
                        <td><?php echo $rows['Balance']?></td>
                    </tr>
                </tbody>
            </table><br>

            <h2 style="text-align:center; margin:8mm;">Transfer Money</h2><br>
            
            <label id="select"><strong>Transfer To:</strong></label>
            <select name="receiver" class="form-control" required>
                <option value="" disabled selected>Choose</option>

                <?php
                    //Connecting to the local sql database
                    $username = "root";
                    $password = "";
                    $database = "bank";
                    $mysqli = new mysqli("localhost", "$username", "$password", "$database");

                    $sid = $_GET['id'];
                    $sql = "SELECT * FROM customers where id!=$sid";
                    $result = mysqli_query($mysqli, $sql);
                    if(!$result)
                    {
                    echo "Error ".$sql."<br>".mysqli_error($mysqli);
                    }
                    while($rows = mysqli_fetch_assoc($result)) {
                ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                <?php echo $rows['Name'] ;?> (Balance: 
                <?php echo $rows['Balance'] ;?> ) 
           
                </option>
                <?php
                    }
                ?>

            </select>
            <br><br><br>
            <label style="color : black;"><strong>Amount:</strong></label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input class="form-control" type="number" name="amount" required>
            <br><br>
            <div class="text-center">
                <button name="submit" id="btn" type="submit">Transfer</button>
            </div>    
            </form>
        </div>
        <br><br>


        <div class="footer" style="color: white; background-color: #1a75ff;text-align: center; bottom: 0mm; left: 0mm; width: 100%;">
            © 2021 Copyright: Shantanu Chavan
        </div>


    </body>
</html>

<?php
    //Connecting to the local sql database
    $username = "root";
    $password = "";
    $database = "bank";
    $mysqli = new mysqli("localhost", "$username", "$password", "$database");

    if(isset($_POST['submit']))
    {
        $sender = $_GET['id'];
        $receiver = $_POST['receiver'];
        $amount = $_POST['amount'];

        $sql = "SELECT * FROM customers where id=$sender";
        $query = mysqli_query($mysqli,$sql);
        $sql1 = mysqli_fetch_array($query);

        $sql = "SELECT * FROM customers where id=$receiver";
        $query = mysqli_query($mysqli,$sql);
        $sql2 = mysqli_fetch_array($query);

        //Conditions
        //negative value
        if($amount < 0){
            // echo '<script type="text/javascript">';
            // echo ' alert("Negative value cannot be transferred !")';
            // echo '</script>';
            echo "<script>swal( 'Error',' Amount should not be Negative!','error' );</script>";
        }
        //insufficient balance
        elseif($amount >$sql1['Balance']){
            echo "<script>swal( 'Error','Insufficient Balance!','error' );</script>";
        }
        //zero value
        elseif($amount == 0){
            echo "<script>swal( 'Error','Zero cannot be transferred!','error' );</script>";
        }
        else
        {    
            $newbalance = $sql1['Balance'] - $amount;
            $sql = "UPDATE customers set Balance=$newbalance where id=$sender";
            mysqli_query($mysqli,$sql);

            $newbalance = $sql2['Balance'] + $amount;
            $sql = "UPDATE customers set Balance=$newbalance where id=$receiver";
            mysqli_query($mysqli,$sql);

            $send = $sql1['Name'];
            $rec = $sql2['Name'];
            $sql = "INSERT INTO transactions(`Sender`, `Receiver`, `Amount`) VALUES ('$send','$rec','$amount')";
            $query = mysqli_query($mysqli, $sql);

            if($query){
                // echo "<script> alert('Transaction Successfully !');
                //                      window.location='transaction.php';
                //            </script>";
                echo "<script>swal('Transferred!', 'Transaction Successfull!','success').then(function() { window. location = 'transaction.php'; });;</script>";
            }
        }

       $newbalance= 0;
       $amount =0;
    }

?>