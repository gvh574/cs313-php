<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'modules/head.php'; ?>
</head>

<body>
    <div class="container">
        <?php include 'modules/header.php'; ?>
        <div class="panel-group">
            
        <?php foreach($searchList as $complex){ ?>
            <a href="?action=complexReview&<?php echo 'id='.$complex['complex_id']; ?>">
                <div class="panel panel-default">
                    
                    <div class="panel-heading">
                        <span><b><?php echo $complex['name']; ?></b><span>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $complex['type']; ?></p>
                            <p>
                                <?php echo $complex['street'].', '.$complex['city'].' '.$complex['state'].' '.$complex['zipCode']; ?>
                            </p>
                    </div>
                </div>
            </a>
        <?php } ?>


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