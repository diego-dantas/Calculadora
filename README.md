## Web Calc

O Web Calc e uma calculadora online com login e senha, que gera um histórico das operações realizadas pelo usuário.

A aplicação foi desenvolvida com back end em PHP e front end com Bootstrap e JQuery.
Para a utilizar a aplicação bastar seguir os passos a baixo. 

### Clone da aplicação 

git clone https://github.com/diego-dantas/calculadora.git
Obs: o clone deve ser feito na pasta raiz do seu servidor apache. 
##### Exeemplo: 
Servidor xampp, pasta htdocs.
Servidor wamp pasta www. 
Então antes de realizar o clone, verifique a seu servidor e a pasta raiz. 
 

### criação do banco de dados 
Estamos usando o banco de dados MySql, o servidor xampp e wamp já vem com o banco MySql por padrão. 

Inicie o servido de banco de dados, e execute os scripts abaixo na mesma sequencia. 
##### Criação do banco
create database calculadora_db;

### criação das tabelas 

##### Criação da tabela usuarios
create table usuarios (
    id int not null auto_increment primary key,
    nome varchar(100) not null,
    usuario varchar(100) not null,
    senha varchar(100) not null
);
##### Criação da tabela historico
create table historicos(
	id int not null primary key auto_increment,
    data date not null,
    operacao varchar(50) not null,
    idUsuario int,
    foreign key (idUsuario) references usuarios(id)
);

Após a criação do banco, inicie sua aplicação e já pode utilizar o Web Calc. 

