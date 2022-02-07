<?php 

require_once '../model/Ofertas.php';

move_uploaded_file($_FILES["imagen"]["tmp_name"], "../view/imagenes".$_FILES["imagen"]["name"]);

$titulo = $_POST['titulo'];
$imagen = $_FILES['imagen']['name'];
$descripcion = $_POST['descripcion'];

try{
    $clase = new Ofertas("", $titulo,$imagen,$descripcion);
    $clase-> insertar();
    header("Location: index.php");
}catch(Exception $ex){

    echo("No se ha podido guardar la informacion en el sistema");

}

?>