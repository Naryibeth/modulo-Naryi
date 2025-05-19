<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mensajes</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
      <style>
        body{
          
          background: #fff url("assets/fondo.jpg") no-repeat center center fixed;
          background-size: cover;
          font-style: italic;
          font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .card, .modal-content{
          background: #fffa;
          border-radius: 10px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
          backdrop-filter: blur(10px);
        }

      </style>
        
</head>
<body>

<div class="container">
  <?php if(isset($editar_mensaje)){ ?>
    <div class="row text-center d-flex justify-content-center">
      <div class="col-md-6 card">
        <div class="card-header">
          <h1>Editar mensaje</h1>
        </div>
        <div class="card-body">
          <form method="POST">
            <div class="modal-body d-flex flex-column gap-4">
              <input class="form-control" type="text" name="usuario" placeholder="usuario de quien envia" value="<?php echo $editar_mensaje['usuario']?>">
              <input class="form-control" type="text" name="asunto" placeholder="explique el por que del mensaje" value="<?php echo $editar_mensaje['asunto']?>">
              <textarea name="mensaje" id="mensaje" placeholder="redacte su mensaje"> <?php echo $editar_mensaje['mensaje']?> </textarea>
              <input class="form-control" type="text" name="destinatario" placeholder="Ingrese el usuario del destinatario" value="<?php echo $editar_mensaje['destinatario']?>">
              <button type="submit" class="btn btn-secondary">Cancelar</button>
              <button type="submit" class="btn btn-success" name="editar" value="<?php echo $editar_mensaje['ID_info']?>" >Editar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php }else{ ?>

    <div class="card shadow mt-5 pt-3">
      <div class="card-head">
        <h1 class="text-center">CENTRO DE MENSAJES Y NOTIFICACIONES</h1>
      </div>
      <div class="card-body p-3">
        <button type="button" class="btn btn-success my-2" data-bs-toggle="modal" data-bs-target="#enviar_mensaje">
          Enviar un mensaje
        </button>
        <div class="table-responsive">
          <table class="table table-hover shadow table-striped text-center table-bordered">
            <thead>
              <tr>
                <th>Usuario</th>
                <th>Asunto</th>
                <th>Mensaje</th>
                <th>Destinatario</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <form method="POST">
                <?php if(isset($mensajes)) { foreach ($mensajes as $mensaje) { ?>
                  <tr>
                    <td> <?php echo $mensaje['usuario'] ?> </td>
                    <td> <?php echo $mensaje['asunto'] ?> </td>
                    <td> <?php echo $mensaje['mensaje'] ?> </td>
                    <td> <?php echo $mensaje['destinatario'] ?> </td>
                    <td>
                      <button class="btn btn-success" title="editar" type="submit" name="seleccion" value="<?php echo $mensaje['ID_info'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                        </svg>
                      </button>
                      <button class="btn btn-danger" title="Eliminar" type="submit" name="eliminar" value="<?php echo $mensaje['ID_info'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                        </svg>
                      </button>
                    </td>
                  </tr>
                <?php }}else{ ?>
                  <tr>
                    <td colspan="5"><h2>No hay registros de mensajes aun :</h2> </td>
                  </tr>
                <?php } ?>
              </form>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  <?php } ?>

  <!-- Modal -->
  <div class="modal fade" id="enviar_mensaje" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Enviar un nuevo mensaje</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST">
          <div class="modal-body d-flex flex-column gap-4">
            <input class="form-control" type="text" name="usuario" placeholder="Ingrese su usuario">
            <input class="form-control" type="text" name="asunto" placeholder="Ingrese el asunto">
            <textarea name="mensaje" id="mensaje" placeholder="Ingrese el mensaje"></textarea>
            <input class="form-control" type="text" name="destinatario" placeholder="Ingrese el destinatario">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" name="enviar">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="assets\bootstrap\js\bootstrap.bundle.min.js"></script>
</body>

</html>
    
</body>
</html>


