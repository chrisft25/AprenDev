<?php
class Challenge_model{
    // Connection instance
    private $connection;
    // table name
    private $table_name = "retos";
    // table columns
    public $idReto;
    public $descripcionReto;
    public $ejemplo;
    public $trofeos;
    public function __construct($connection){
        $this->connection = $connection;
    }

    public function leerRetos(){
        $query = "SELECT idReto,descripcionReto,ejemplo,trofeos FROM " . $this->table_name;
        $stmt = $this->connection->prepare($query);
        
        if($stmt->execute()){
            return $stmt;
        }else{
            return "error";
        }
 
    }

    public function leerReto($idReto){
        $query = "SELECT idReto,descripcionReto,ejemplo,trofeos FROM " . $this->table_name. " WHERE idReto=:idReto";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':idReto',$idReto);
        $stmt->execute();
        
        if($stmt->execute()){
            return $stmt;
        }else{
            return "error";
        }
    }

    public function crearReto($data){
        $query = "INSERT INTO" . $this->table_name. "(descripcionReto,ejemplo,trofeos) VALUES(:descripcionReto,:ejemplo,:trofeos)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':descripcionReto',$data['descripcionReto']);
        $stmt->bindParam(':ejemplo',$data['ejemplo']);
        $stmt->bindParam(':trofeos',$data['trofeos']);
        $stmt->execute();

        if($stmt->execute()){
            return $stmt;
        }else{
            return "error";
        }
    }

    public function editarReto($data){
        $query = "UPDATE " . $this->table_name. " SET descripcionReto=:descripcionReto,ejemplo=:ejemplo,trofeos=:trofeos WHERE idReto=:idReto";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':idReto',$data['idReto']);
        $stmt->bindParam(':descripcionReto',$data['descripcionReto']);
        $stmt->bindParam(':ejemplo',$data['ejemplo']);
        $stmt->bindParam(':trofeos',$data['trofeos']);
        $stmt->execute();

        if($stmt->execute()){
            return $stmt;
        }else{
            return "error";
        }
    }

    public function eliminarReto($idReto){
        $query = "DELETE FROM " . $this->table_name. " WHERE idReto=:idReto";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':idReto',$idReto);
        $stmt->execute();

        if($stmt->execute()){
            return $stmt;
        }else{
            return "error";
        }
    }

    public function leerPruebas($idReto){
        $query = "SELECT idPrueba,input,output FROM pruebas WHERE idReto=:idReto";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':idReto',$idReto);
        $stmt->execute();
        if($stmt->execute()){
            return $stmt;
        }else{
            return "error";
        }
    }

    public function leerPrueba($idPrueba){
        $query = "SELECT input,output FROM pruebas WHERE idPrueba=:idPrueba";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':idPrueba',$idPrueba);
        $stmt->execute();
        if($stmt->execute()){
            return $stmt;
        }else{
            return "error";
        }
    }

    public function verificarPrueba($data){
        $query="SELECT idPrueba FROM pruebas WHERE output=:output AND idPrueba=:idPrueba AND idReto=:idReto";
        $stmt= $this->connection->prepare($query);
        $stmt->bindParam(':idPrueba',$data['idPrueba']);
        $stmt->bindParam(':idReto',$data['idReto']);
        $stmt->bindParam(':output',$data['output']);

        if($stmt->execute()){
            return $stmt;
        }else{
            return "error";
        }
    }
}
?>