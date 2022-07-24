<?php
  $sql = "UPDATE $tableName SET budget=budget+budget*0.1 WHERE budget > 3000";
  $conn->query($sql) or exit($conn->error);

  if($conn->affected_rows == 0)
    exit("<p>Nenhum projeto cadastrado atende à condição <span>(orçamento superior a R$3.000,00)</span>. Nenhum registro foi alterado.</p>");
  
  $sql = "SELECT * FROM $tableName WHERE budget > 3000";
  $result = $conn->query($sql) or exit($conn->error);
  
  echo "<table>
          <caption>Dados dos projetos com orçamento atualizado</caption>
          <thead>
            <tr>
              <th>ID</th>
              <th>Orçamento</th>
              <th>Data de início</th>
              <th>Horas de execução</th>
            </tr>
          </thead>
          <tbody>";

  while($records=$result->fetch_array()){
    $id        = htmlentities($records[0], ENT_QUOTES, "UTF-8");
    $newBudget = htmlentities($records[1], ENT_QUOTES, "UTF-8");
    $startDate = htmlentities($records[2], ENT_QUOTES, "UTF-8");
    $hours     = htmlentities($records[3], ENT_QUOTES, "UTF-8");

    $formattedBudget = formatFinancialValue($newBudget);
    $formattedDate = formatDate($startDate);
    $formattedHours = formatHours($hours);

    echo "<tr>
            <td>$id</td>
            <td>$formattedBudget</td>
            <td>$formattedDate</td>
            <td>$formattedHours</td>
          </tr>";
  }

  echo "</tbody>
  </table>";