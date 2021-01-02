<?php require_once ("./getters/getCliente.php") ; ?>
<table>
    <thead>
        <tr>
            <th>DNI</th>
            <th>Administrador</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Usuario</th>
            <th>Edad</th>
            <th>RFC</th>
            <th>Telefono</th>
            <th>Mail</th>
            <th>Direccion</th>
            <th>CP</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i=0; $i < $countcliente ; $i++) { ?>
        <tr>
            <td><?php print $getcliente [$i]["clienteDNI"] ; ?></td>
            <td><?php print $getcliente [$i]["adminDNI"] ; ?></td>
            <td><?php print $getcliente [$i]["cl_nombre"] ; ?></td>
            <td><?php print $getcliente [$i]["cl_apellidos"] ; ?></td>
            <td><?php print $getcliente [$i]["cl_usuario"] ; ?></td>
            <td><?php print $getcliente [$i]["cl_edad"] ; ?></td>
            <td><?php print $getcliente [$i]["cl_rfc"] ; ?></td>
            <td><?php print $getcliente [$i]["cl_telefono"] ; ?></td>
            <td><?php print $getcliente [$i]["cl_mail"] ; ?></td>
            <td><?php print $getcliente [$i]["cl_direccion"] ; ?></td>
            <td><?php print $getcliente [$i]["cl_cp"] ; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>