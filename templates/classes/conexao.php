<?php

define('HOST', 'localhost');
define('USUARIO', 'user-minhaHistoria');
define('SENHA', 'Theo@27611');
define('DB', 'minha-historia');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');