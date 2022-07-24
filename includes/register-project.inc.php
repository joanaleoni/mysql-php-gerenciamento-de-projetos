<?php
 $idProject = $conn->escape_string(trim($_POST['project-id']));
 $budget    = $conn->escape_string(trim($_POST['budget']));
 $startDate = $conn->escape_string(trim($_POST['start-date']));
 $hours     = $conn->escape_string(trim($_POST['hours']));

 if(!fillingValidate($idProject))
  exit("<p>Caro/a usuário/a, você não informou o <span>ID do projeto</span>. Aplicação encerrada. </p>");

 if(!fillingValidate($budget))
  exit("<p>Caro/a usuário/a, você não informou o <span>orçamento do projeto</span>. Aplicação encerrada. </p>");

 if(!fillingValidate($startDate))
  exit("<p>Caro/a usuário/a, você não informou a <span>data de início do projeto</span>. Aplicação encerrada. </p>");

 if(!fillingValidate($hours))
  exit("<p>Caro/a usuário/a, você não informou as <span>horas de execução do projeto</span>. Aplicação encerrada. </p>");

 $sql = "SELECT id FROM $tableName WHERE id='$idProject'";
 $conn->query($sql) or exit($conn->error);

 if($conn->affected_rows > 0)
  exit("<p>Caro/a usuário/a, já há um projeto de ID <span>$idProject</span> cadastrado no banco de dados. Por favor, insira um ID único para o projeto que deseja cadastrar.</p>");

 $sql = "INSERT $tableName VALUES('$idProject', $budget, '$startDate', $hours)";
 $conn->query($sql) or exit($conn->error);

 $formattedBudget    = formatFinancialValue($budget);
 $formattedStartDate = formatDate($startDate);

 $sql = "SELECT hours_project FROM $tableName WHERE id='$idProject'";
 $result = $conn->query($sql) or exit($conn->error);
 $formattedHours = formatHours(htmlentities($result->fetch_array()[0], ENT_QUOTES, "UTF-8"));

 echo "<p> Dados do projeto cadastrados com sucesso! <br><br>
        ID do projeto: <span>$idProject</span><br>
        Orçamento: <span>R$$formattedBudget</span><br>
        Data de ínicio: <span>$formattedStartDate</span><br>
        Quantidade de horas previstas para execução: <span>$formattedHours</span>
      </p>";