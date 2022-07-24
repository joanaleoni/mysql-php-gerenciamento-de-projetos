<?php
  $sql = "SELECT id, budget FROM $tableName";
  $result = $conn->query($sql) or exit($conn->error);

  echo "<table>
        <caption>ID e orçamento dos produtos cadastrados</caption>
          <thead>
            <tr>
              <th>ID</th>
              <th>Orçamento</th>
            </tr>
          </thead>
          <tbody>";

  while($records=$result->fetch_array()) {
    $id     = htmlentities($records[0], ENT_QUOTES, "UTF-8");
    $budget = formatFinancialValue(htmlentities($records[1], ENT_QUOTES, "UTF-8"));

    echo "<tr>
            <td>$id</td>
            <td>R$$budget</td>
          </tr>";
  }

  echo "  </tbody>
        </table>";