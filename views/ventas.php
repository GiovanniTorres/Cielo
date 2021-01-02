<?php require_once ("./getters/getVenta.php") ; ?>
<table>
    <thead>
        <tr>
            <th>DNI</th>
            <th>Cliente</th>
            <th>Administrador</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Paqueteria</th>
            <th>Detalles</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i=0; $i < $countventa ; $i++) { ?>
        <tr>
            <td><?php print $getventa [$i] ["ventaDNI"] ?></td>
            <td><?php print $getventa [$i] ["clienteDNI"] ?></td>
            <td><?php print $getventa [$i] ["adminDNI"] ?></td>
            <td><?php print $getventa [$i] ["ve_fecha_hora"] ?></td>
            <td><?php print $getventa [$i] ["ve_total"] ?></td>
            <td><?php print $getventa [$i] ["ve_statpaq"] ?></td>
            <td>Detalles</td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<!--TIMESTAMP 01-Ene-1970 00:00:01-->







