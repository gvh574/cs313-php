<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'modules/head.php'; ?>
</head>

<body>
    <div class="container">
        <?php include 'modules/header.php'; ?>

            <div name="picture" class="text-center">
                <img src="<?php echo $complex[0]['picture']; ?>" width="auto" height="250">
            </div>
        <div style="height:25px;"></div>
            
         <div name="complexInfo" class="panel-group panel panel-default">
             <div class="panel-heading"><span><b><?php echo $complex[0]['name']; ?></b></span></div>
                
                <div class="panel-body">
                    <p><?php echo $complex[0]['street'].'<br>'.$complex[0]['city'].', '.$complex[0]['state'].' '.$complex[0]['zipCode']  ?>
                    </p>
                    
                    <p>
                    Type:
                    <?php echo $complex[0]['type']; ?>
                    </p>
                        
                    <p>
                    Hours:
                    <?php echo $complex[0]['office_hours']; ?>
                    </p>
                    
                    <p>
                    Pricing:
                    <?php echo $complex[0]['price']; ?>
                    </p>
                </div>
            </div>

        <div class="panel-group panel panel-default">
            <div class="panel-heading">
                <span><b>Reviews</b></span>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date/Time</th>
                        <th>Review</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($review as $item) { ?>
                    <tr>
                        <td><?php echo $item['firstName'].' '.$item['lastName'];?></td>
                        <td><?php echo $item['date'];?></td>
                        <td><?php echo $item['comment'];?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        
        
            <!--            Review Form-->
            <?php if($_SESSION['logged_in_user']) { ?>
                <form class="form-horizontal" action="?action=addReview" method="POST">
                    <fieldset>
                        <!-- Message body -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="message">Your review</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="review" name="review" placeholder="Please enter your feedback here..." rows="5"></textarea>
                            </div>
                        </div>

                        </td>
                        <td align="center" valign="top" width="23%">
                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <input type="hidden" name="complex_id" value="<?php echo $complex[0]['complex_id'];?>">
                                    <button type="submit" class="btn btn-primary btn-md">Submit</button>
                                    <button type="reset" class="btn btn-default btn-md">Clear</button>
                                </div>
                            </div>
                    </fieldset>
                </form>
                <?php } ?>

                    <footer class="footer">
                        <?php include 'modules/footer.php'; ?>
                    </footer>

    </div>
    <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>