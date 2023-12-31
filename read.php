<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{
            background: #9f9;
        }
        
        label, p{
            color: black;
        }
        .wrapper{
            width: 1200px;
            margin: 0 auto;
        }
        /* Hide the print button when printing */
        @media print {
            #printButton {
                display: none;
            }
        }
        @media print{
        .btn, .btn-primary {
                display: none !important;
        }
    }

    </style>
</head>
<body>  
  <?php
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        require_once "config.php";

        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM info WHERE id = '$id'");

        if ($customer = mysqli_fetch_assoc($query)) {
            $id   = $customer["id"];
            $fname   = $customer["fname"];
            $mname   = $customer["mname"];
            $lname   = $customer["lname"];
            $address   = $customer["address"];
            $age    = $customer["age"];
            $birthdate = $customer["birthdate"];
            $contact = $customer["contact"];
            $email = $customer["email"];
        } else {
            header("location: read.php");
            exit();
        }

        mysqli_close($conn);
    } else {
        header("location: read.php");
        exit();
    }
  ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1> Customer's Information</h1>
                    </div>
                    <div class="form-group">
                        <label>Id</label>
                        <p class="form-control-static"><?php echo $id ?></p>
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <p class="form-control-static"><?php echo $fname ?></p>
                    </div>
                    <div class="form-group">
                        <label>Middle Name</label>
                        <p class="form-control-static"><?php echo $mname ?></p>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <p class="form-control-static"><?php echo $lname ?></p>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p class="form-control-static"><?php echo $address?></p>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <p class="form-control-static"><?php echo $age ?></p>
                    </div>
                    <div class="form-group">
                        <label>Birthdate</label>
                        <p class="form-control-static"><?php echo $birthdate ?></p>
                    </div>
                    <div class="form-group">
                        <label>Contact</label>
                        <p class="form-control-static"><?php echo $contact ?></p>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <p class="form-control-static"><?php echo $email ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                    <button id="printButton" class="btn btn-danger">Print</button>
                </div>
                <script src="script.js"></script>
            </div>
        </div>
    </div>
</body>
</html>
