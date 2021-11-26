<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<?php if(isset($_SESSION['error'])): ?>}
    <div id="error-info">
        <?= "Something goes wrong with file: " . $_SESSION['error']; ?>
    </div>
<?php endif; ?>