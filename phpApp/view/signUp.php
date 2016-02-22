<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'modules/head.php'; ?>
</head>

<body>
    <div class="container">
    <?php include 'modules/header.php'; ?>
    <!-- Top content -->
    <div class="top-content">
        <div class="inner-bg">
            <div class="container">
                <?php echo $_SESSION['message']; ?>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Login to our site</h3>
                                    <p>Enter username and password to log on:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="?action=login" method="POST" class="login-form">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
                                    </div>
                                    <input type="hidden" name="type" value="signin">
                                    <button type="submit" class="btn">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-1 middle-border"></div>
                    <div class="col-sm-1"></div>

                    <div class="col-sm-5">

                        <div class="form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Sign up now</h3>
                                    <p>Fill in the form below to get instant access:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-pencil"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="?action=login" method="POST" class="registration-form">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-first-name">First name</label>
                                        <input type="text" name="form-first-name" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-last-name">Last name</label>
                                        <input type="text" name="form-last-name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-email">Email</label>
                                        <input type="text" name="form-email" placeholder="Email..." class="form-email form-control" id="form-email">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
                                    </div>
                                    <input type="hidden" name="type" value="signup">
                                    <button type="submit" class="btn">Sign me up</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <?php include 'modules/footer.php'; ?>
    </footer>
    </div>

    <!-- Javascript -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!--[if lt IE 10]>
<script src="assets/js/placeholder.js"></script>
<![endif]-->
    <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
<?php unset($_SESSION['message']); ?>