<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'modules/head.php'; ?>
    </head>
    <body>
        <div class="container">
            <?php include 'modules/header.php'; ?>
            

            <div class="jumbotron">
                <h1>Search bar here</h1>
                <form action="." method="POST" class="navbar-form" role="search">
                    <div class="input-group add-on">
                        <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                        <input type="hidden" name="action" value="results">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>

            </div>

            <footer class="footer">
                <?php include 'modules/footer.php'; ?>
            </footer>

        </div> <!-- /container -->
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>