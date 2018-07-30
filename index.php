

<!DOCTYPE html>
<html>
<head>
    <title>KOYA BANK</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container col-sm-8 col-sm-offset-2">
    <div class="row col-sm-6 col-sm-offset-2">
        <div class="title-content">
            <div class="">
                <?php echo '<script>alert("Account number/Password Missmatch")</script>'; ?>
                <h2>Welcom to Our Bank...</h2>
                <h4>Where we make dreams bigger and achievable</h4>
                <div class="button">
                    <a class="btn btn-info" role="button" data-toggle="modal" data-target="#signup">Join</a>
                </div>
                <div class="button">
                    <a class="btn btn-success" role="button" data-toggle="modal" data-target="#login">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <form class="col-md-12" method="post" action="processlogin.php">
                    <div class="row">
                        <label>Account Number:</label>
                        <input type="text" class="form-control" name="accnum" required>
                    </div>
                    <br>
                    <div class="row">
                        <label>Pin:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <br>
                    <div class="row">
                        <input type="submit" name="login" class="btn btn-success btn-md" value="login">
                    </div>
                </form>
            </div>
            <br>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="signup" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Signup</h4>
            </div>
            <br>
            <div class="modal-body">
                <?php if (isset($error_message)) {echo $error_message;} ?>
                <br>
                <form class="col-md-12" method="post" action="processuser.php">
                    <label for="fname">First Name:</label>
                    <input type="text" class="form-control" name="first_name"  required>
                    <br/>

                    <label for="oname">Middle Name:</label>
                    <input type="text" class="form-control" name="middle_name" pattern="[A-Za-z]" required>
                    <br/>


                    <label for="sname"> Last Name:</label>
                    <input type="text" class="form-control" name="last_name" pattern="[A-Za-z]" required>
                    <br/>

                    <label for="email"> Email:</label>
                    <input type="email" class="form-control" name="email" required>
                    <br/>

                    <label for="pnum">Phone number:</label>
                    <input type="tel" class="form-control" name="phone_num" required>
                    <br/>

                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" required>
                    <br/>

                    <label for="amount">Amount:</label>
                    <input type="number" class="form-control" name="account_balance" required>
                    <br/>

                    <label for="acct_type">Account type:</label>

                    <label class="radio-inline">
                        <input type="radio" name="account_type" value="savings">Savings
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="account_type" value="Current">Current
                    </label>

                    <input type="submit" name="submit" class="btn btn-success btn-md" value="Join">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
