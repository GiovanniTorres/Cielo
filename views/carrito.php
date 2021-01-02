<?php require_once ("./getters/getCarrito.php") ; ?>
<table>
    <thead>
        <tr>
            <th>DNI</th>
            <th>Articulo</th>
            <th>Venta</th>
            <th>Cantidad</th>
            <th>Precio Cantidad</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i=0; $i < $countcarrito ; $i++) { ?>
        <tr>
            <td><?php print $getCarrito [$i] ["carritoDNI"] ; ?></td>
            <td><?php print $getCarrito [$i] ["articuloDNI"] ; ?></td>
            <td><?php print $getCarrito [$i] ["ventaDNI"] ; ?></td>
            <td><?php print $getCarrito [$i] ["ca_cantidad"] ; ?></td>
            <td><?php print $getCarrito [$i] ["ca_precio_cant"] ; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>






