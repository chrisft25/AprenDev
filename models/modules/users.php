<?php
class User_model{
    // Connection instance
    private $connection;
    // table name
    private $table_name = "usuarios";
    // table columns
    public $idUsuario;
    public $nombreUsuario;
    public $idCentroEducativo;
    public $idCiudad;
    public $fotoPerfil;
    public $expLaboral;
    public $email;
    public $password;
    public $bioUsuario;
    public $trofeos;
    public $idRol;
    public $fechaRegistro;

    public function __construct($connection){
        $this->connection = $connection;
    }
    public function loginUsuario($data){
        $password= md5($data['password']);
        $query = "SELECT idUsuario,nombreUsuario FROM usuarios WHERE (email=:email OR username=:email) AND pass=:pass";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':username',$data['email']);
        $stmt->bindParam(':pass',$password);
        if($stmt->execute()){
            $cantidadResultados= $stmt->rowCount();
            if($cantidadResultados==1){
                $idUsuario= $stmt->fetchAll();
                return $idUsuario[0];
            }else{
                return "error";
            }
        }else{
            return "error";
        }
 
    }

    public function registrarUsuario($data){
        $fecha= strval(date('Y-m-d H:i:s'));
        $password= md5($data['password']);
        $query = "INSERT INTO " . $this->table_name. "(username,nombreUsuario,expLaboral,email,pass,bioUsuario,trofeos,idRol,fechaRegistro) VALUES(:username,:nombreUsuario,:expLaboral,:email,:password,:bioUsuario,0,2,:fechaRegistro)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':username',$data['username']);
        $stmt->bindParam(':nombreUsuario',$data['nombreUsuario']);
        $stmt->bindParam(':expLaboral',$data['expLaboral']);
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':password',$password);
        $stmt->bindParam(':bioUsuario',$data['bioUsuario']);
        $stmt->bindParam(':fechaRegistro', $fecha );
        if($stmt->execute()){
            return 1;
        }else{
            return "error";
        }
    }

    public function leerUsuario($idUsuario){
        $query= "SELECT * FROM ".$this->table_name." WHERE idUsuario=:username OR username=:username";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':idUsuario',$idUsuario);
        $stmt->bindParam(':username',$idUsuario);
        if($stmt->execute()){
            return $stmt;
        }else{
            return "error";
        }
    }

    public function verificarAmistad($data){
            $query= "SELECT * FROM amigos WHERE ((idUsuarioP=:idUsuarioP AND idUsuarioS=:idUsuarioS) OR (idUsuarioP=:idUsuarioS AND idUsuarioS=:idUsuarioP)) AND rechazado=0";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':idUsuarioP',$data['idUsuarioP']);
            $stmt->bindParam(':idUsuarioS',$data['idUsuarioS']);
            if($stmt->execute()){
                if($stmt->rowCount()>0){
                    $estado= $stmt->fetch();
                    if($estado['aceptado']==0){
                        return 2; //Solicitud enviada
                    }else{
                        return 1; //Aceptado
                    }
                }else{
                    return 0; //Ninguna amistad encontrada.
                }
            }else{
                return "error";
            }
    }

    public function enviarAmistad($data){
        $query = "INSERT INTO amigos(idUsuarioP,idUsuarioS,aceptado,rechazado) VALUES(:idUsuarioP,:idUsuarioS,0,0)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':idUsuarioP',$data['idUsuarioP']);
        $stmt->bindParam(':idUsuarioS',$data['idUsuarioS']);
        if($stmt->execute()){
            return 1;
        }else{
            return "error";
        }
    }

    public function leerSolicitudes($idUsuario){
        $query= "SELECT a.idAmigos as idAmigos,b.username as username FROM amigos a INNER JOIN usuarios b ON a.idUsuarioP=b.idUsuario WHERE a.idUsuarioS=:idUsuarioS AND a.rechazado=0 AND a.aceptado=0";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':idUsuarioS',$idUsuario);
        if($stmt->execute()){
            return $stmt->fetchAll();
        }else{
            return "error";
        }
    }

    public function aceptarSolicitud($idSolicitud){
        $query= "UPDATE amigos SET aceptado=1 WHERE idAmigos=:idSolicitud";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':idSolicitud',$idSolicitud);
        if($stmt->execute()){
            return 1;
        }else{
            return "error";
        }

    }

    public function rechazarSolicitud($idSolicitud){
        $query= "UPDATE amigos SET rechazado=1 WHERE idAmigos=:idSolicitud";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':idSolicitud',$idSolicitud);
        if($stmt->execute()){
            return 1;
        }else{
            return "error";
        }

    }
    
}
?>