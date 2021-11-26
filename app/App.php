<?php

declare(strict_types = 1);

include_once "../helpers/helpers.php";
include_once "./classes/Transaction.php";

session_start();


if(!empty($_POST['add-transaction'])){

    if($_FILES['transaction-file']['error'] === 0){
        $transactionFileDataArray = array_map('str_getcsv', file($_FILES['transaction-file']['tmp_name']));

        $transaction = new Transaction($transactionFileDataArray);
        $transaction->setTotalAmounts();

        addSession('totalIncome',$transaction->getTotalIncome());
        addSession('totalExpense',$transaction->getTotalExpense());
        addSession('netTotal',$transaction->getNetTotal());
        
        addSession('transactionFileDataArray', $transactionFileDataArray);
        changeLocation();
    }else{
        addSession('error', $_FILES['transaction-file']['error']);
        changeLocation();
    }
}

if(!empty($_GET['change-transaction'])){
    session_unset();
    header("Location: ../public/index.php");
    exit();
}


