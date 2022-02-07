<?

require_once 'PizzeriaDB.php';

class Ofertas{


    private $id;
    private $titulo;
    private $imagen;
    private $descripcion;

    function __construct($id,$titulo,$imagen,$descripcion){
        $this->id= id;
        $this->titulo= titulo;
        $this->imagen= imagen;
        $this->descripcion= descripcion;
    }

    public function getId(){
        return $this->id;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getImagen(){
        return $this->imagen;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }

    public function insertar(){
        $conexion = PizzeriaDB::connectDB();
        $sql = "INSERT INTO oferta (titulo, imagen, descripcion) VALUES (\"".$this->titulo."\", \"".$this->imagen."\", \"".$this->descripcion."\")";
        $conexion->exec($sql);
    }
    public function getOfertas(){
        $conexion = PizzeriaDB::connectDB();
        $sql = "SELECT id, titulo, imagen,descripcion from oferta ";
        $consulta = $conexion->Query($sql);

        $ofertas=[];

        while($registro = $consulta->fetchObject()){
            $ofertas[] = new Ofertas($registro->id,$registro->titulo, $registro->imagen, $registro->descripcion);
            
            return $ofertas;
        }
    }

    public function getOfertasById($id){
        $conexion = PizzeriaDB::connectDB();
        $sql = "select id, titulo, imagen,descripcion from oferta where id=\"".$id."\"";
        $consulta = $conexion->Query($sql);

       

        $registro = $consulta->fetchObject();

        $ofertas = new Ofertas($registro->id,$registro->titulo, $registro->imagen, $registro->descripcion);
            
            return $ofertas;
    }

    public static function delete(){
        $conexion = PizzeriaDB::connectDB();
        $sql = "DELETE FROM oferta where id=\"".$this->id."\"";
        $conexion->exec($sql);
    }
}