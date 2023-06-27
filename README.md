# crud-usuarios


API para gerenciamento de Usuarios, através de níveis ACL, os úsuarios estão definidos em 3 níveis: Administrador, Moderador, e Financeiro.
O Administrador tem poder total, já o Moderador só pode visualizar o registro. O Financeiro está divido em 2 grupos, um que pode fazer tudo, e outro que só não pode excluir.

Tecnologias utilizadas:

- Laravel
- Laravel Passport (Autenticação de usuario)
- Gates, Policy do Laravel (ACL)


como a CRUD era meio que idêntica para todos, decidi criar um ControllerBase e utilizei o principio de Polimorfismo, para incorporar em cada um dos controllers,
é importante enfatizar, que cada nível de acesso (adm, mod, financeiro) é um úsuario, 

# Instalação

1 - Crie um banco de dados (de preferência MYSQL). Utilizei o MySQL Workbench para a criação do banco.

2 - Acesse o diretório server e configure o arquivo .env com os respectivos dados do banco (caso não exista, renomeie o .env.example para .env).

3 - No diretório server, execute o comando composer install.

4 - Após a finalização da instalação dos pacotes, execute o comando `php artisan migrate`. Este comando irá criar as tabelas no banco de dados.

5 - Execute o comando `php artisan passport:install` para a instalação do passport

6 - Execute o comando `php artisan db:seed` para adicionar alguns registros padrões

7 - Execute o comando php artisan serve para iniciar o servidor local na sua máquina(por padrão vem definido como 127.0.0.1:8000

8 - Via Postman ou equivalente, e coloque algum dos usuarios abaixos:
* Administrador
  
  email => admin@email.com
  
  password => 12345

* Moderador
  
  email => mod@email.com
  
  password => 12345

* Financeiro
  
  email => financial@email.com
  
  password => 12345

* Financeiro2
  
  email => financial2@email.com
  
  password => 12345
  
acesse a rota: `http://127.0.0.1:8000/api/login`

se o usuario estiver correto, ele retornará um Token de autenticação do tipo Bearer,
através desse Token, dependendo do nível de acesso que o usuario tiver, ele poderá fazer as requisições especificadas no arqvuio api.php do diretório routes

