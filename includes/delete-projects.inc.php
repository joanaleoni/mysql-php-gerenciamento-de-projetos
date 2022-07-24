<?php
  $sql = "SELECT * FROM $tableName WHERE hours_project < 100 AND budget < 1000";
  $result = $conn->query($sql) or exit($conn->error);
  $numberDeletedProjects = $conn->affected_rows;

  if($numberDeletedProjects == 0)
    exit("<p>Não há nenhum projeto cadastrado que atenda às condições de exclusão <span>(menos de 100 horas de execução e orçamento inferior a R$1000,00)</span>. Nenhum records foi excluído do banco de dados.</p>");
    
  echo "<p>Foi(foram) excluído(s) <span>$numberDeletedProjects</span> projeto(s) do banco de dados.</p>
        <table>
          <caption>Dados do(s) projeto(s) excluído(s)</caption>
          <thead>
            <tr>
              <th>ID</th>
              <th>Orçamento</th>
              <th>Data de início</th>
              <th>Horas de execução</th>
            </tr>
          </thead>
          <tbody>";

  while($records = $result->fetch_array()){
    $idDeletedProject        = htmlentities($records[0], ENT_QUOTES, "UTF-8");
    $budgetDeletedProject    = htmlentities($records[1], ENT_QUOTES, "UTF-8");
    $startDateDeletedProject = htmlentities($records[2], ENT_QUOTES, "UTF-8");
    $hoursDeletedProject     = htmlentities($records[3], ENT_QUOTES, "UTF-8");
    $formattedBudget         = formatFinancialValue($budgetDeletedProject);
    $formattedStartDate      = formatDate($startDateDeletedProject);
    $formattedHours          = formatHours($hoursDeletedProject);

    echo "<tr>
            <td>$idDeletedProject</td>
            <td>R$$formattedBudget</td>
            <td>$formattedStartDate</td>
            <td>$formattedHours</td>
          </tr>";
  }

  echo "  </tbody>
        </table>";

  $sql = "DELETE FROM $tableName WHERE hours_project < 100 AND budget < 1000";
  $conn->query($sql) or exit($conn->error);