<?php
  function keepData($session, $inputName){
    if(isset($session))
      if(isset($_SESSION[$inputName])){
        $sessionValue = $_SESSION[$inputName];
        echo "value='$sessionValue'";
      }
  }

  function fillingValidate($formElement){
    if(strlen($formElement) == 0) return false;
    return true;
  }

  function formatDate($originalDate){
    $dateArray = explode("-", $originalDate);
    return $dateArray[2] . "/" . $dateArray[1] . "/" . $dateArray[0];
  }

  function formatHours($originalHour){
    $hourArray = explode(".", $originalHour);
    if($hourArray[1] == "00") return $hourArray[0] . "h";
    return $hourArray[0] . "h" . $hourArray[1] . "min";
  }

  function formatFinancialValue($originalValue){
    return number_format($originalValue, 2, ",", ".");
  }