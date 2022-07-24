<?php
  $sql = "SELECT COUNT(*) FROM $tableName WHERE start_date_project > '2020-01-01'";
  $result = $conn->query($sql) or exit($conn->error);
  
  $numberProjects = htmlentities($result->fetch_array()[0], ENT_QUOTES, "UTF-8");  
  if($numberProjects > 0){
    echo "<p>Há <span>$numberProjects</span> projeto(s) cadastrado(s) com data de início após 01/01/2020.</p>
    <table>
      <caption>Dados dos projetos cadastrados com data de início após 01/01/2020</caption>
        <thead>
          <tr>
            <th>ID</th>
            <th>Orçamento</th>
            <th>Data de início</th>
            <th>Horas de execução</th>
          </tr>
        </thead>
        <tbody>";

    $sql = "SELECT * FROM $tableName WHERE start_date_project > '2020-01-01'";
    $result = $conn->query($sql) or exit($conn->error);
  
    while($records = $result->fetch_array()){
      $id                 = htmlentities($records[0], ENT_QUOTES, "UTF-8");
      $budget             = htmlentities($records[1], ENT_QUOTES, "UTF-8");
      $startDate          = htmlentities($records[2], ENT_QUOTES, "UTF-8");
      $hours              = htmlentities($records[3], ENT_QUOTES, "UTF-8");
      $formattedBudget    = formatFinancialValue($budget);
      $formattedStartDate = formatDate($startDate);
      $formattedHours     = formatHours($hours);
  
      echo "<tr>
              <td>$id</td>
              <td>R$$formattedBudget</td>
              <td>$formattedStartDate</td>
              <td>$formattedHours</td>
            </tr>";
    }
      
    echo "</tbdoy>
    </table>";

  }
  else
    echo "<p>Não há <span>nenhum</span> projeto cadastrado com data de início após 01/01/2020.</p>";