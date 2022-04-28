<?php
function conectar()
{
    $xc = mysqli_connect("localhost", "root", "","prueba2");
    return $xc;
    die();
}

function desconectar($xc)
{
    mysqli_close($xc);
}

$xc = conectar();
$sql = "SELECT * FROM alumnos";
$res = mysqli_query($xc, $sql);
desconectar($xc);

while($filas=mysqli_fetch_array($res))
{
    $id = $filas['idalumnos'];
    $nombre=$filas['nombres'];
    $apellido=$filas['apellidos'];

    echo "<tr>";
    print_r ("<th>Alumno: $id</th>"."<br>");
    print_r ("<td>Nombre: $nombre</td>"."<br>");
    print_r ( "<td>Apellido: $apellido</td>"."<br>");
    echo "<br>";
}
echo "<td><a class='btn btn-success' href='/editaralumno.php?id=$id'>Editar</a>
<a class='btn btn-danger' href='/eliminaralumno.php?id=$id>Eliminar</a></td>";
/// CURSOS///

$sql_c = "SELECT * FROM cursos";
$res_c = mysqli_query($xc, $sql_c);

while($filas=mysqli_fetch_array($res_c))
{
    $id = $filas['idcursos'];
    $nombre=$filas['nombre_curso'];
    $horas=$filas['horas'];
    $cred=$filas['creditos'];

    echo "<tr>";
    print_r ("<th>Curso número: $id</th>"."<br>");
    print_r ("<td>Nombre: $nombre</td>"."<br>");
    print_r ( "<td>Horas: $horas</td>"."<br>");
    print_r ( "<td>Creditos: $cred</td>"."<br>");
    echo "<br>";
}


/// MATRICULAS ///
$xc = conectar();
$sql_m = "SELECT * FROM matricula";
$res_m = mysqli_query($xc, $sql_m);
desconectar($xc);

while($filas=mysqli_fetch_array($res_m))
{
    $id = $filas['idmatricula'];
    $ida=$filas['idalumno'];
    $idc=$filas['idcurso'];
    $c=$filas['costo'];
    $ci=$filas['ciclo'];


    echo "<tr>";
    print_r ("<th>Matricula numero: $id</th>"."<br>");
    print_r ("<td>ID Alumno: $ida</td>"."<br>");
    print_r ( "<td>ID Curso: $idc</td>"."<br>");
    print_r ("<td>Costo del curso: $c</td>"."<br>");
    print_r ( "<td>Ciclo del alumno: $ci</td>"."<br>");
    echo "<br>";
}

?>