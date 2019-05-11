<?php
    require "empleados.php";


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud con PHP y MySQL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<body>

    <div class="container">
        <!--Esto hace poder  gestionar imagenes-->
        <form action="" method="post" enctype="multipart/form-data">

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Empleado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">

                                <!--Require es para que se llene los campos-->
                                <input type="hidden" required name="txtId" placeholder="" id="txtId" require="" value="<?php echo $txtId ?>">


                                <label for=""> Nombre:</label>
                                <input type="text" class="form-control" equired name="txtNombre" placeholder="" id="txtNombre" require="" value="<?php echo $txtNombre ?>">
                                <br>


                                <label for=""> Apellido:</label>
                                <input type="text" class="form-control" required name="txtApellido" placeholder="" id="txtApellido" require="" value="<?php echo $txtApellido ?>">
                                <br>


                                <label for="">Correo:</label>
                                <input type="email" class="form-control" required name="txtCorreo" placeholder="" id="txtCorreo" require="" value="<?php echo $txtCorreo ?>">
                                <br>


                                <label for="">Foto:</label>
                                <input type="file" class="form-control" accept="image/*" name="txtFoto" placeholder="" id="txtFoto" require="" value="<?php echo $txtFoto ?>">
                                <br>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button value="btnAgregar" <?php echo $accionAgregar; ?> class="btn btn-success" type="submit" name="accion">Agregar</button>
                            <button value="btnModificar" <?php echo $accionModificar; ?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
                            <button value="btnEliminar" <?php echo $accionEliminar; ?> class="btn btn-danger" type="submit" name="accion">Eliminar</button>
                            <button value="btnCancelar" <?php echo $accionCancelar; ?> class="btn btn-primary" type="submit" name="accion">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Agregar Registro
            </button>

        </form>



        <div class="row">

            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Foto</th>
                        <th>Nombre Completo</th>
                        <th>Correo </th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php foreach ($listaEmpleados as $empleado) { ?>
                    <tr>
                        <!--Se carga por defecto una imagen si no existe en la base de datos-->
                        <td> <img class="img-thumbnail" width="100px" src="../img/<?php echo $empleado['foto']; ?> " /> </td>
                        <td> <?php echo $empleado['nombre'];  ?> <?php echo $empleado['apellido']; ?> </td>
                        <td> <?php echo $empleado['correo']; ?> </td>
                        <td>

                            <form action="" method="post">

                                <input type="hidden" name="txtId" value="<?php echo $empleado['id_empreado']; ?>">
                                <input type="hidden" name="txtNombre" value="<?php echo $empleado['nombre']; ?>">
                                <input type="hidden" name="txtApellido" value="<?php echo $empleado['apellido']; ?>">
                                <input type="hidden" name="txtCorreo" value="<?php echo $empleado['correo']; ?>">
                                <input type="hidden" name="txtFoto" value="<?php echo $empleado['foto']; ?>">

                                <input type="submit" class="btn btn-info" value="Seleccionar" name="accion">
                                <button type="submit" class="btn btn-danger" value="btnEliminar" name="accion">Eliminar</button>

                            </form>

                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>

        <!--Para que modal desaparezca-->

        <?php if ($mostrarModal) { ?>
            <script>
                $('#exampleModal').modal('show');
            </script>

        <?php } ?>
    </div>

</body>

</html>