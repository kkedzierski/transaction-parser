<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/app.css?v=<?= time(); ?>" >
    <title>Transaction parser</title>
</head>
<body>
    <?php include_once "error.php"; ?>
    <?php include_once 'addTransactionForm.php'; ?>
    <?php include_once 'transactionsTable.php'; ?>
</body>
</html>