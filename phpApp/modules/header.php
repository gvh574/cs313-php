<div class="header clearfix">
    <nav>
        <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="?action=home">Home</a></li>
            <?php if(!isset($_SESSION['logged_in_user'])) {?>
            <li role="presentation"><a href="?action=loginSignin">Login / Sign Up</a></li>
            <?php } else { ?>
            <li role="presentation"><a href="?action=profile">Account</a></li>
            <li role="presentation"><a href="model/logout.php">Log out</a></li>
            <?php } ?>
        </ul>
    </nav>
    <a href="index.php?action=home"><h3 class="text-muted">Rate My Complex</h3></a>
</div>