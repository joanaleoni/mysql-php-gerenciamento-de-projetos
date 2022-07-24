# Gerenciamento de projetos
Pequena aplicação web para gerenciamento de projetos, utilizando <strong>PHP e banco de dados SQL</strong>.

A aplicação conta com todas as operações do <strong>CRUD (Create, Read, Update, Delete)</strong>, através das seguintes opções de execução:
<ul>
  <li>Cadastro de projetos</li>
  <li>Listagem de ID e orçamento dos projetos cadastrados</li>
  <li>Mostrar o número de projetos com data de início após 01/01/2020</li>
  <li>Excluir do banco de dados projetos com menos de 100 horas de execução e orçamento inferior a R$1.000,00</li>
  <li>Atualizar o orçamento de projetos com orçamento superior a R$3.000,00, acrescentando taxa de 10%</li>
</ul>


### Descrição das funções utilizadas
<ul>
  <li><strong>keepData:</strong> função para manter os dados informados anteriormente no formulário caso o usuário já tenha feito uma tentativa de cadastro, mas foi impedido de cadastrar o projeto por fornecer ID já existente ou por não ter informado todos os dados necessários;</li>
  <li><strong>fillingValidade:</strong> função para validar o preenchimento dos campos do formulário;</li>
  <li><strong>formatDate:</strong> função para converter uma data para o formato brasileiro (DD/MM/AAAA);</li>
  <li><strong>formatHours:</strong> função para formatar horas, omitindo o campo de minutos para horas pontuais;</li>
  <li><strong>formatFinancialValue:</strong> função para formatar valores financeiros de acordo com o formato brasileiro.</li>
</ul>
