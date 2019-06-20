<html>
    <div class="container" style="background-color:white">
<table class="table">
    <thead>
    <td>Usuario</td>
    <td>Aceptar</td>
    <td>Rechazar</td>
    </thead>
    <tbody>
    <?php
    for($i=0;$i<count($solicitudes);$i++){
        echo "<tr>";
        echo "<td>";
        echo $solicitudes[$i]['username'];
        echo "</td>";
        echo '<td><button class="btn btn-success" onclick="window.location.href=\'aceptarsolicitud.php?id='.$solicitudes[$i]['idAmigos'].'\'">Aceptar</button></td>';
        echo '<td><button class="btn btn-success" onclick="window.location.href=\'rechazarsolicitud.php?id='.$solicitudes[$i]['idAmigos'].'\'">Rechazar</button></td>';
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

</div>

</html>