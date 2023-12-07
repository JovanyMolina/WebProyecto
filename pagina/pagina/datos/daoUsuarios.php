<?php
//importa la clase conexión y el modelo para usarlos
require_once ('conexion.php'); 
require_once ('modelos\usuario.php'); 
require_once('RegistroUtil.php');

class DAOUsuario
{
    
	private $conexion; 
    
    /**
     * Permite obtener la conexión a la BD
     */
    private function conectar(){
        try{
			$this->conexion = Conexion::conectar(); 
		}
		catch(Exception $e)
		{
			die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
		}
    }
    
/**
    * Metodo que obtiene todos los usuarios de la base de datos y los
    * retorna como una lista de objetos  
    */
	public function obtenerTodos()
	{
		try
		{
            $this->conectar();
            
			$lista = array();
            /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL = $this->conexion->prepare("SELECT id,nombre,correo,institucion,tipo FROM usuario");
			
            //Se ejecuta la sentencia sql, retorna un cursor con todos los elementos
			$sentenciaSQL->execute();
            
            //$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            /*Podemos obtener un cursor (resultado con todos los renglones como 
            un arreglo de arreglos asociativos o un arreglo de objetos*/
            /*Se recorre el cursor para obtener los datos*/
			foreach($resultado as $fila)
			{
				$obj = new Usuario();
                $obj->id = $fila->id;
	            $obj->nombre = $fila->nombre;
	            $obj->correo = $fila->correo;
	            $obj->institucion = $fila->institucion;
	            $obj->tipo = $fila->tipo;
                
              
				//Agrega el objeto al arreglo, no necesitamos indicar un índice, usa el próximo válido
                $lista[] = $obj;
			}
            
			return $lista;
		}
		catch(PDOException $e){
			return null;
		}finally{
            Conexion::desconectar();
        }
	}
    

    public function autenticar($correo, $contrasena)
	{
		try
		{ 
            $this->conectar();
            
            //Almacenará el registro obtenido de la BD
			$obj = null; 
            
			$sentenciaSQL = $this->conexion->prepare("SELECT id,nombre,tipo FROM usuario 
            WHERE correo=? AND contrasena=?;"); 
			//Se ejecuta la sentencia sql con los parametros dentro del arreglo 
            $sentenciaSQL->execute(array($correo,$contrasena));
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			if($fila){
                $obj = new Usuario();
                
                $obj->id = $fila->id;
                $obj->nombre = $fila->nombre;
                $obj->tipo = $fila->tipo;
            
                return $obj;
            }
            return $obj;
		}
		catch(Exception $e){
            return null;
		}finally{
            Conexion::desconectar();
        }
    }
	
    
    /**
     * Elimina el usuario con el id indicado como parámetro
     */
	public function eliminar($id)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM usuarios WHERE id = ?");			          
			$resultado=$sentenciaSQL->execute(array($id));
			return $resultado;
		} catch (PDOException $e) 
		{
			//Si quieres acceder expecíficamente al numero de error
			//se puede consultar la propiedad errorInfo
			return false;	
		}finally{
            Conexion::desconectar();
        }
        
	}


	/**
     * Función para editar al empleado de acuerdo al objeto recibido como parámetro
     */
	public function editar(Usuario $obj)
	{
		try 
		{
			$sql = "UPDATE usuarios
                    SET
                    nombre = ?,
                    correo = ?,
                    contrasena = ?,
                    institucion = ?
                    WHERE id = ?;";

            $this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare($sql);
			$sentenciaSQL->execute(
				array($obj->nombre,
                      $obj->correo,
                      $obj->contrasena,
					  $obj->institucion,
					  $obj->id)
					);
            return true;
		} catch (PDOException $e){
			//Si quieres acceder expecíficamente al numero de error
			//se puede consultar la propiedad errorInfo
			return false;
		}finally{
            Conexion::desconectar();
        }
	}


/**
     * Metodo que obtiene un registro de la base de datos, retorna un objeto  
     */
    public function obtenerUno($id)
	{
		try
		{ 
            $this->conectar();
            
            //Almacenará el registro obtenido de la BD
			$obj = null; 
            
			$sentenciaSQL = $this->conexion->prepare("SELECT id,nombre,correo,contrasena,institucion,tipo FROM usuario WHERE id=?"); 
			//Se ejecuta la sentencia sql con los parametros dentro del arreglo 
            $sentenciaSQL->execute([$id]);
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $obj = new Usuario();
            
            $obj->id = $fila->id;
            $obj->nombre = $fila->nombre;
            $obj->correo = $fila->correo;
            $obj->contrasena = $fila->contrasena;
            $obj->institucion = $fila->institucion;
            $obj->tipo = $fila->tipo;
         
            return $obj;
		}
		catch(Exception $e){
            return null;
		}finally{
            Conexion::desconectar();
        }
	}


	
	/**
     * Agrega un nuevo usuario de acuerdo al objeto recibido como parámetro
     */
    public function agregar(Usuario $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO Usuario
                (nombre,
                correo,
                contrasena,
                institucion,
                tipo)
                VALUES
                (:nombre,
                :correo,
                :contrasena,
                :institucion,
                :tipo
                );";
                
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(array(
                    ':nombre'=>$obj->nombre,
                    ':correo'=>$obj->correo,
                    ':contrasena'=>$obj->contrasena,
                    ':institucion'=>$obj->institucion,
                    ':tipo'=>$obj->tipo

                 ));
                 
            $clave=$this->conexion->lastInsertId();
            return $clave;
		} catch (Exception $e){
			return $clave;
		}finally{
            
            /*En caso de que se necesite manejar transacciones, 
			no deberá desconectarse mientras la transacción deba 
			persistir*/
            
            Conexion::desconectar();
        }
	}

    public function agregarAA(Usuario $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO Usuario
                (nombre,
                correo,
                contrasena,
                tipo)
                VALUES
                (:nombre,
                :correo,
                :contrasena,
                :tipo
                );";
                
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(array(
                    ':nombre'=>$obj->nombre,
                    ':correo'=>$obj->correo,
                    ':contrasena'=>$obj->contrasena,
                    ':tipo'=>$obj->tipo

                 ));
                 
            $clave=$this->conexion->lastInsertId();
            return $clave;
		} catch (Exception $e){
			return $clave;
		}finally{
            
            /*En caso de que se necesite manejar transacciones, 
			no deberá desconectarse mientras la transacción deba 
			persistir*/
            
            Conexion::desconectar();
        }
	}
}