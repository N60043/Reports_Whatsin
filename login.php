<?php include_once('db/conn.php');
session_start();
if (isset($_SESSION['username'])) {
    echo '<script>window.location="index.php"</script>';
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $msg = '';
    echo $sql = "select * from portal_users where username = '$username' and password = '" . md5($password) . "' and is_active = 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['type'] = $row['type'];
        $_SESSION['timestamp'] = time();
        echo '<script>window.location="index.php"</script>';
    } else {
        $msg = 'Invalid username / password';
    }


    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include_once('includes/head.php'); ?>
</head>

<body>
<div id="wrapper" style="width: 95% !important;">
    <div class="row">
        <div class="col-md-4"></div>
        <div id="page-wrapper" style="margin: 0 !important; min-height: 350px !important; " class="col-md-4">
            <div class="header">
                <h1 class="page-header">
                    Login
                </h1>
            </div>
            <div id="page-inner" style="min-height: 350px !important;">

                <div class="dashboard-cards">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-content">
                                    <form class="col s12" method="post" action="login.php">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input placeholder="Enter username" name="username"
                                                       type="text"
                                                       maxlength="20"
                                                       class="validate" required>
                                            </div>
                                            <div class="input-field col s12">
                                                <input placeholder="******" name="password"
                                                       type="password"
                                                       maxlength="20"
                                                       class="validate" required>
                                            </div>
                                            <div class="input-field col s12">
                                                <input type="submit" name="submit" value="Submit"
                                                       class="btn btn-danger"/>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="clearBoth"></div>
                                    <?php if (!empty($msg)) { ?>
                                        <div class="alert alert-danger">
                                            <?php echo $msg; ?>
                                        </div>
                                    <?php } ?>

                                </div>


                            </div>

                        </div>
                    </div>

                </div>
                <!-- /. ROW  -->

                <?php include_once('includes/footer.php'); ?>


            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <div class="col-md-4"></div>
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

<?php include_once('includes/scripts.php'); ?>

</body>
</html>