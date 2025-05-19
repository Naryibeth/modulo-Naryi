<?php
namespace Naryi\Mensajes\modelo;
// require_once 'app/conexion/conexion.php';
use Naryi\Mensajes\conexion\Conexion;
use PDO;
class model extends conexion{

  private $usuario;
  private $asunto;
  private $mensaje;
  private $destinatario;
  private $id;

  function set_usuario($valor){
    $this->usuario = $valor;
  }
  function set_asunto($valor){
    $this->asunto = $valor;
  }
  function set_mensaje($valor){
    $this->mensaje = $valor;
  }
  function set_destinatario($valor){
    $this->destinatario = $valor;
  }
  function set_id($valor){
    $this->id = $valor;
  }
  function __construct(){
    parent::__construct();
  }

  
  function registrar(){
    $sql = "INSERT INTO mensajes() VALUES(null,'$this->usuario','$this->asunto','$this->mensaje','$this->destinatario')";
    $query = $this->conex->prepare($sql);
    $query->execute();
  }
  
  function consultar(){
    $sql = "SELECT * FROM mensajes";
    $query = $this->conex->prepare($sql);
    $query->execute();
    if($query->rowCount() > 0) {
      return $query->fetchAll(PDO::FETCH_ASSOC);
    }else{
      return null;
    }
  }
  
  function modificar($id){
    $sql = "UPDATE mensajes SET usuario = '$this->usuario', asunto = '$this->asunto', mensaje = '$this->mensaje', destinatario = '$this->destinatario' WHERE ID_info = '$id'";
    $query = $this->conex->prepare($sql);
    $query->execute();
  }
  
  
  function buscar(){
    $sql = "SELECT * FROM mensajes WHERE ID_info = '$this->id'";
    $query = $this->conex->prepare($sql);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
  }
  
  function eliminar(){
    $sql = "DELETE FROM mensajes WHERE ID_info = '$this->id' ";
    $query = $this->conex->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

}




?>