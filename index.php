<?php
require_once("config.php");
/* carrega somente um usuario
 
$root = new Usuario();
$root-> loadByID(3);
echo $root;

*/
/*$sql = new Sql();
$usuarios = $sql->select("SELECT * FROM tb_usuarios");
echo json_encode($usuarios);
*/
//$lista = Usuario::getList();
//echo json_encode($lista);

//carregarum usuario usando login e a senha

//$usuario = new Usuario();
//$usuario->login("user","1234");
//echo $usuario;
/* criando um insert
$aluno = new Usuario("aluno1","qwert");

$aluno->insert();

echo $aluno;
*/

$usuario = new Usuario();

$usuario->loadByID(5);

$usuario->update("professor","1234");
 
echo $usuario;
?>

