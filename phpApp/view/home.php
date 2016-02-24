<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'modules/head.php'; ?>
    </head>
    <body>
        <div class="container">
            <?php include 'modules/header.php'; ?>
            <div style="height:100px;"></div>
            
                <form action="." method="POST" class="navbar-form text-center" role="search">
                    <div class="input-group add-on">
                        <input class="form-control" placeholder="search.." name="srch-term" id="srch-term" type="text">
                        <input type="hidden" name="action" value="results">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </form>
            
            <div name="img-container">
                <img src="images/drawingCity.png" class="img-responsive">
            </div>
                            

            <footer class="footer">
                <?php include 'modules/footer.php'; ?>
            </footer>

        </div> <!-- /container -->
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>