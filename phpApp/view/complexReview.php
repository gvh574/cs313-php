<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'modules/head.php'; ?>
    </head>

    <body>
        <div class="container">
            <?php include 'modules/header.php'; ?>
            
            <div name="picture right-col">
            picture here
            </div>
            <div name="complexInfo left-col">
                <h5><?php echo $complex[0]['name']; ?></h5>
                <p><?php echo $complex[0]['street'].'<br>'.$complex[0]['city'].', '.$complex[0]['state'].' '.$complex[0]['zipCode']  ?></p>
                <p>Type: <?php echo $complex[0]['type']; ?></p>
                <p>Hours: <?php echo $complex[0]['office_hours']; ?></p>
                <p>Pricing: <?php echo $complex[0]['price']; ?></p>
            </div>
            
            <div class="row marketing">
                <?php foreach($review as $item) { ?>
            <div name="review">
                
                <p><?php echo $item['firstName'].' '.$item['lastName'];?></p>
                <p><?php echo $item['date'];?></p>
                <p><?php echo $item['rating'];?></p>
                <p><?php echo $item['comment'];?></p>
                </div>
                <div class="rating">
                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                </div>
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