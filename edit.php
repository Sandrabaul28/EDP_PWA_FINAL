<?php
require_once "config.php";

$id = $fullname = $address = $age = $birthdate = $contact = $email = "";
$id_error = $fullname_error = $address_error = $age_error = $birthdate_error = $contact_error = $email_error = "";

if (isset($_POST["id"]) && !empty($_POST["id"])) {

    $id = $_POST["id"];

        $fullname = trim($_POST["fullname"]); 
        if (empty($fullname)) { 
            $fullname_error = "fullname is required.";
        } elseif (!filter_var($fullname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
            $fullname_error = "fullname is invalid.";
        } else {
            $fullname = $fullname;
        }

        $address = trim($_POST["address"]);
        if (empty($address)) {
            $address_error = "address is required.";
        } else {
            $address = $address;
        }

        $age = trim($_POST["age"]);

        if (empty($age)) {
            $age_error = "age is required.";
        } else {
            $age = $age;
        }

        $birthdate = trim($_POST["birthdate"]);
        if (empty($birthdate)) {
            $birthdate_error = "birthdate is required.";
        } else {
            $birthdate = $birthdate;
        }

        $contact = trim($_POST["contact"]);
        if (empty($contact)){
            $contact_error = "contact is required.";
        } else {
            $contact = $contact;
        }

        $email = trim($_POST["email"]);
        if (empty($email)){
            $email_error = "email is required.";
        } else {
            $email = $email;
        }

    if (empty($id_error_err) && empty($fullname_error) &&
        empty($address_error_err) && empty($age_error_err) && empty($birthdate_error_err) && empty($contact_error_err) && empty($email_error_err) ) {
$sql = "UPDATE `info` SET `fullname`= '$fullname',`fullname`= '$fullname', `address`= '$address', `age`= '$age', `birthdate`= '$birthdate' , `contact`= '$contact', `email`= '$email'  WHERE id ='$id'";

          if (mysqli_query($conn, $sql)) {
              header("location: index.php");
          } else {
              echo "Something went wrong. Please try again later.";
          }

    }

    mysqli_close($conn);
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM info WHERE fullname = '$id'");

        if ($customer = mysqli_fetch_assoc($query)) {
            $id   = $customer["id"];
            $fullname    = $customer["fullname"];
            $address  = $customer["address"];
            $age     = $customer["age"];
            $birthdate     = $customer["birthdate"];
            $contact     = $customer["contact"];
            $email     = $customer["email"];
        } else {
            echo "Something went wrong. Please try again later.";
            header("location: edit.php");
            exit();
        }
        mysqli_close($conn);
    }  else {
        echo "Something went wrong. Please try again later.";
        header("location: edit.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Information</h2>
                    </div>
                     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        
                        <div class="form-group <?php echo (!empty($fullname_error)) ? 'has-error' : ''; ?>">
                            <label>Fullname</label>
                            <input type="text" name="fullname" class="form-control" value="<?php echo $fullname; ?>">
                            <span class="help-block"><?php echo $fullname_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($address_error)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                            <span class="help-block"><?php echo $address_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($age_error)) ? 'has-error' : ''; ?>">
                            <label>Age</label>
                            <input type="text" name="age" class="form-control" value="<?php echo $age; ?>">
                            <span class="help-block"><?php echo $age_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($birthdate_error)) ? 'has-error' : ''; ?>">
                            <label>Birthdate</label>
                            <input type="text" name="birthdate" class="form-control" value="<?php echo $birthdate; ?>">
                            <span class="help-block"><?php echo $birthdate_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($contact_error)) ? 'has-error' : ''; ?>">
                            <label>Contact</label>
                            <input type="number" name="contact" class="form-control" value="<?php echo $contact; ?>">
                            <span class="help-block"><?php echo $contact_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($email_error)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_error;?></span>
                        </div>



                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
