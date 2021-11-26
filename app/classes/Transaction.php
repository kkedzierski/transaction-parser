<?php

class transaction{

    private $transactionDataArray;
    private $totalIncome;
    private $totalExpense;
    private $netTotal;

    public function __construct(array $transactionDataArray){
        $this->transactionDataArray = $transactionDataArray;
    }

    public function setTotalAmounts($transactionDataArray = null){
        if(!$transactionDataArray){
            $transactionDataArray = $this->transactionDataArray;
        }
        $positiveAmountArray = [];
        $negativeAmountArray = [];
        $currency = "";
        for($i = 1; $i < count($transactionDataArray); $i++){
            if(strpos($transactionDataArray[$i][3], ',') !== false){
                $transactionDataArray[$i][3] = str_replace(',','',$transactionDataArray[$i][3]);
            }
            if($transactionDataArray[$i][3][0] === '-'){
                $negativeAmountArray[] = floatval('-' . substr($transactionDataArray[$i][3],2));
            }else{
                $currency = $transactionDataArray[$i][3][0];
                $positiveAmountArray[] = floatval(substr($transactionDataArray[$i][3],1));
            }       
        }
        $this->totalIncome = $this->formatNumber($currency, array_sum($positiveAmountArray));
        $this->totalExpense = $this->formatNumber($currency, array_sum($negativeAmountArray), true);
        $this->netTotal = $this->formatNumber($currency, (array_sum($positiveAmountArray) + array_sum($negativeAmountArray)));

    }

    private function formatNumber(string $currency, int|float $number, bool $isNegative = false): string{
        if($isNegative){
            return "-$currency" . number_format(floor(substr($number,1)*100)/100,2);
        }
        return $currency.number_format(floor($number*100)/100,2);
        
    }

    public function getTotalIncome(){
        return $this->totalIncome;
    }

    public function getTotalExpense(){
        return $this->totalExpense;
    }

    public function getNetTotal(){
        return $this->netTotal;
    }

}