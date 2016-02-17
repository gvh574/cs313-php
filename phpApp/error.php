<?php
if (!$_SESSION) {
    session_start();
}

$message = $_SESSION['message'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Error | IBC</title>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; ?>
    </head>
    <body>
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php'; ?>
        </header>
        <main>
            <h1>Error</h1>
            <?php
            echo '<p>'.$message.'</p>';
            ?>
        </main>

        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
            <?php echo 'Last Updated: ' . date('j F, Y', getlastmod()); ?>
        </footer>
    </body>
</html>
