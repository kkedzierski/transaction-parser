<?php
    include_once "../helpers/helpers.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['transactionFileDataArray'])){
        $transactionFileDataArray = $_SESSION['transactionFileDataArray'];
    }
?>

<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Check #</th>
            <th>Description</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php if(isset($transactionFileDataArray)): ?>
            <?php for($i = 1; $i < count($transactionFileDataArray) ; $i++): ?>
                <tr>
                    <td> <?= $transactionFileDataArray[$i][0] ?></td>
                    <td> <?= $transactionFileDataArray[$i][1] ?></td>
                    <td> <?= $transactionFileDataArray[$i][2] ?></td>
                    <td> <?= changeAmmountColor($transactionFileDataArray[$i][3]) ?></td>
                </tr>
            <?php endfor; ?>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total Income:</th>
            <td>
                <?php if(isset($_SESSION['totalIncome'])){
                    echo $_SESSION['totalIncome'];
                } ?>
            </td>
        </tr>
        <tr>
            <th colspan="3">Total Expense:</th>
            <td>
                <?php if(isset($_SESSION['totalExpense'])){
                    echo $_SESSION['totalExpense'];
                } ?>
            </td>
        </tr>
        <tr>
            <th colspan="3">Net Total:</th>
            <td>
                <?php if(isset($_SESSION['netTotal'])){
                        echo $_SESSION['netTotal'];
                    } ?>
            </td>
        </tr>
    </tfoot>
</table>