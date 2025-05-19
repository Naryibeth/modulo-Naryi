<?php
// require_once 'app/modelo/model.php';
namespace Naryi\Mensajes\controlador;
use Naryi\Mensajes\modelo\model;

$obj_model = new model();

// print_r(new model());

if(isset($_POST['enviar'])){
  
  $obj_model->set_usuario($_POST['usuario']);
  $obj_model->set_asunto($_POST['asunto']);
  $obj_model->set_mensaje($_POST['mensaje']);
  $obj_model->set_destinatario($_POST['destinatario']);
  $obj_model->registrar();

}
if(isset($_POST['editar'])){
  
  $obj_model->set_usuario($_POST['usuario']);
  $obj_model->set_asunto($_POST['asunto']);
  $obj_model->set_mensaje($_POST['mensaje']);
  $obj_model->set_destinatario($_POST['destinatario']);

  $obj_model->modificar($_POST['editar']);

}

if(isset($_POST['eliminar'])){
  $obj_model->set_id($_POST['eliminar']);
  $obj_model->eliminar();
}
if(isset($_POST['seleccion'])){
  $obj_model->set_id($_POST['seleccion']);
  $editar_mensaje = $obj_model->buscar();
}


$mensajes = $obj_model->consultar();

require_once 'app/vista/view.php';
?>