<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./sheet2.css">

        <title>Transaction History</title>

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

        <h1 class="head">Transaction History</h1>

        <?php
            //Connecting to the local sql database
            $username = "root";
            $password = "";
            $database = "bank";
            $mysqli = new mysqli("localhost", "$username", "$password", "$database");

            $query = "SELECT * FROM transactions";
            $result = mysqli_query($mysqli, $query);

        ?>

        <div class="table">
            <table class="table table-hover table-bordered">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sender</th>
                        <th scope="col">Receiver</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($rows = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $rows['id']?></th>
                        <td><?php echo $rows['Sender']?></td>
                        <td><?php echo $rows['Receiver']?></td>
                        <td><?php echo $rows['Amount']?></td>
                        <td><?php echo $rows['Date and Time']?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>


        <div class="footer" style="position:fixed; color: white; background-color: #1a75ff;text-align: center; bottom: 0mm; left: 0mm; width: 100%;">
            © 2021 Copyright: Shantanu Chavan
        </div>


    </body>
</html>