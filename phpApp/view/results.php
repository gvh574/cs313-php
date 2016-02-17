<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'modules/head.php'; ?>
</head>

<body>
    <div class="container">
        <?php include 'modules/header.php'; ?>

            <div class="row marketing">
                <?php foreach($searchList as $complex){ ?>
                    <a href="?action=complexReview&<?php echo 'id='.$complex['complex_id']?>">
                        <div>
                            <h4><?php echo $complex['name'] ?></h4>
                            <p>
                                <?php echo $complex['type'] ?>
                            </p>
                            <p>
                                <?php echo $complex['street'].', '.$complex['city'].' '.$complex['state'].' '.$complex['zipCode'] ?>
                            </p>
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