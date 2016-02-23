<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'modules/head.php'; ?>
</head>

<body>
    <div class="container">
        <?php include 'modules/header.php'; ?>
            <?php echo '<div id="message">'.$_SESSION['message'].'</div>'; ?>
        <?php var_dump($reviews); ?>

                <div class="container">
                    <div class="row">
                        <div>
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo $userProfile[0]['firstName'].' '.$userProfile[0]['lastName']; ?></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>

                                        <div class=" col-md-9 col-lg-9 ">
                                            <table class="table table-user-information">
                                                <tbody>
                                                    <td>Home Address</td>
                                                    <td>
                                                        <?php echo $userProfile[0]['city'].', '.$userProfile[0]['state'].' '.$userProfile[0]['zipCode']?>
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>
                                                            <?php echo $_SESSION['logged_in_user'];?>
                                                        </td>
                                                    </tr>
                                                    <td>Phone Number</td>
                                                    <td>123-4567-890</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-info">
                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <?php include 'modules/footer.php'; ?>
                </footer>
    </div>
    <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
<?php
unset($_SESSION['message']);
?>