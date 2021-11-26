<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<?php if(isset($_SESSION['transactionFileDataArray'])): ?>

    <form id="change-transaction" action="../app/app.php" method="GET">
        <button type="submit" value="1" class="change-transaction" name="change-transaction">Change transaction</button>
    </form>

<?php else: ?>
    <form id="add-transaction" action="../app/app.php" enctype="multipart/form-data" method="POST">
        <label for="transaction-file">Add transaction</label>
        <input type="file" id="transaction-file" name="transaction-file" />
        <button type="submit" value="1" name='add-transaction'>Add</button>
    </form>

<?php endif;?>