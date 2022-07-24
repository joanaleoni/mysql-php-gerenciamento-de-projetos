<?php
    session_start();
    if(isset($_POST['send'])){
        $_SESSION['project-id'] = $_POST['project-id'];
        $_SESSION['budget']     = $_POST['budget'];
        $_SESSION['start-date'] = $_POST['start-date'];
        $_SESSION['hours']      = $_POST['hours'];
    }

  require_once "../includes/functions.inc.php";
?>
<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> MySQL e PHP </title> 
  <link rel="stylesheet" href="../css/style.css">
</head> 

<body> 
 <h1> Gerenciamento de projetos com MySQL e PHP </h1>
 <form action="index.php" method="post">
  <fieldset>
   <legend> Módulo de cadastro de projetos </legend>
   
   <label class="align"> ID do projeto: </label>
   <input type="text" name="project-id" placeholder="Forneça o ID do projeto" autofocus
   <?php keepData($_SESSION, 'project-id')?>><br>

   <label class="align"> Orçamento em R$: </label>
   <input type="number" name="budget" min="0" step=".01" 
   <?php keepData($_SESSION, 'budget')?>><br>

   <label class="align">Data de início: </label>
   <input type="date" name="start-date"
   <?php keepData($_SESSION, 'start-date')?>><br>

   <label class="align">Horas necessárias para execução do projeto: </label>
   <input type="number" name="hours" min="0" step=".01" 
   <?php keepData($_SESSION, 'hours');?>><br>

  </fieldset>
  <fieldset>

   <legend> Operações sobre o banco de dados </legend>
      <select name="op">
        <option value="register-project">Cadastrar projeto</option>
        <option value="list-id-and-budget">Listar ID e orçamento dos projetos cadastrados</option>
        <option value="number-of-projects-after-date">Mostrar o número de projetos com data de início após 01/01/2020</option>
        <option value="delete-projects">Excluir do banco de dados projetos com menos de 100 horas de execução e orçamento inferior a R$1.000,00</option>
      </select>
   <button name="send"> Executar operação </button>

  </fieldset>
 </form> 

 <?php
  require_once "../config/conn.php";
  require_once "../includes/create-open-database.inc.php";
  require_once "../includes/create-table.inc.php";

  if(isset($_POST['send'])){

    switch($_POST['op']){
      case "register-project": 
        require_once "../includes/register-project.inc.php";
        break;

      case "list-id-and-budget":
        require_once "../includes/list-id-and-budgets.inc.php";
        break;

      case "number-of-projects-after-date":
        require_once "../includes/show-num-projects.inc.php";
        break;
        
      case "delete-projects":
        require_once "../includes/delete-projects.inc.php";
        break;
    }
  }

  $_SESSION = array();
  session_destroy();
  $conn->close();
 ?>
</body> 
</html>