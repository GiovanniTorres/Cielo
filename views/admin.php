<?php require_once ("./getters/getAdmin.php") ; ?>
<table>
<thead>
    <tr>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Edad</th>
        <th>RFC</th>
        <th>Correo</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Código Postal</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
</thead>
<tbody>
    <?php for ($i=0; $i < $countadmin; $i++) { ?>
    <tr>
        <td><?php print $getadmin [$i]["adminDNI"] ; ?></td>
        <td><?php print $getadmin [$i]["ad_nombre"] ; ?></td>
        <td><?php print $getadmin [$i]["ad_apellidos"] ; ?></td>
        <td><?php print $getadmin [$i]["ad_edad"] ; ?></td>
        <td><?php print $getadmin [$i]["ad_rfc"] ; ?></td>
        <td><?php print $getadmin [$i]["ad_mail"] ; ?></td>
        <td><?php print $getadmin [$i]["ad_telefono"] ; ?></td>
        <td><?php print $getadmin [$i]["ad_direccion"] ; ?></td>
        <td><?php print $getadmin [$i]["ad_cp"] ; ?></td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>
    <?php } ?>
</tbody>
</table>