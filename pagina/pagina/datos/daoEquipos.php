<?php
//importa la clase conexión y el modelo para usarlos
require_once ('conexion.php'); 
require_once ('modelos\equipos.php'); 

class DAOEquipo
{
    
	private $conexion; 
    
    /**
     * Permite obtener la conexión a la BD
     */
    private function conectar(){
        try{
			$this->conexion = conexion::conectar(); 
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
	public function obtenerTodos($nombre)
	{
		try
		{
            $this->conectar();
            
			$lista = array();
            /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL = $this->conexion->prepare("SELECT id,nombreEquipo,estudiante1,estudiante2,estudiante3,Aprobado,NombreDelCoach FROM equipos WHERE NombreDelCoach=?");
			
			$sentenciaSQL->execute([$nombre]);

            //Se ejecuta la sentencia sql, retorna un cursor con todos los elementos
			$sentenciaSQL->execute();
            
            //$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            /*Podemos obtener un cursor (resultado con todos los renglones como 
            un arreglo de arreglos asociativos o un arreglo de objetos*/
            /*Se recorre el cursor para obtener los datos*/
			foreach($resultado as $fila)
			{
				$obj = new equipos();
                $obj->id = $fila->id;
	            $obj->nombreEquipo = $fila->nombreEquipo;
	            $obj->estudiante1 = $fila->estudiante1;
                $obj->estudiante2 = $fila->estudiante2;
	            $obj->estudiante3 = $fila->estudiante3;
				$obj->Aprobado = $fila->Aprobado;
				$obj->NombreDelCoach = $fila->NombreDelCoach;
	     
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
	public function obtenerTodosAdmin()
	{
		try
		{
            $this->conectar();
            
			$lista = array();
            /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL = $this->conexion->prepare("SELECT id,nombreEquipo,estudiante1,estudiante2,estudiante3,Aprobado,NombreDelCoach FROM equipos ");
			
			

            //Se ejecuta la sentencia sql, retorna un cursor con todos los elementos
			$sentenciaSQL->execute();
            
            //$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            /*Podemos obtener un cursor (resultado con todos los renglones como 
            un arreglo de arreglos asociativos o un arreglo de objetos*/
            /*Se recorre el cursor para obtener los datos*/
			foreach($resultado as $fila)
			{
				$obj = new equipos();
                $obj->id = $fila->id;
	            $obj->nombreEquipo = $fila->nombreEquipo;
	            $obj->estudiante1 = $fila->estudiante1;
                $obj->estudiante2 = $fila->estudiante2;
	            $obj->estudiante3 = $fila->estudiante3;
				$obj->Aprobado = $fila->Aprobado;
				$obj->NombreDelCoach = $fila->NombreDelCoach;
	     
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

       
    /**
     * Elimina el usuario con el id indicado como parámetro
     */
	public function eliminar($id)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM equipos WHERE id = ?");			          
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
	public function aprobar($id)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("UPDATE equipos SET Aprobado = 'Aprobado' WHERE id=?");			          
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
	public function Desaaprobar($id)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("UPDATE equipos SET Aprobado = 'No aprobado' WHERE id=?");			          
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
	public function AprobarTodos()
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("UPDATE equipos SET Aprobado = 'Aprobado'");			          
			$resultado = $sentenciaSQL->execute();
			return $resultado;
		} catch (PDOException $e) 
		{
			//Si quieres acceder expecíficamente al numero de error
			//se puede consultar la propiedad errorInfo
			return true;	
		}finally{
            Conexion::desconectar();
        }
	}
   /**
     * Función para editar al usuario de acuerdo al objeto recibido como parámetro
     */
	public function editar(equipos $obj)
	{
		try 
		{
			$sql = "UPDATE equipos
                    SET
                    nombreEquipo = ?,
                    estudiante1 = ?,
                    estudiante2 = ?,
                    estudiante3 = ?
                    WHERE id = ?;";

            $this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare($sql);
			$sentenciaSQL->execute(
				array($obj->nombreEquipo,
                      $obj->estudiante1,
                      $obj->estudiante2,
					  $obj->estudiante3,
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
            
			$sentenciaSQL = $this->conexion->prepare("SELECT id,nombreEquipo,estudiante1,estudiante2,estudiante3 FROM equipos WHERE id=?"); 
			//Se ejecuta la sentencia sql con los parametros dentro del arreglo 
            $sentenciaSQL->execute([$id]);
            
           // /Obtiene los datos/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $obj = new equipos();
            //var_dump($obj);
            $obj->id = $fila->id;
            $obj->nombreEquipo = $fila->nombreEquipo;
            $obj->estudiante1 = $fila->estudiante1;
            $obj->estudiante2 = $fila->estudiante2;
            $obj->estudiante3 = $fila->estudiante3;
    
           
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
	public function agregar(equipos $obj)
	{
		$clave = 0;
		try 
		{
			$sql = "INSERT INTO equipos  
			(nombreEquipo, estudiante1, estudiante2, estudiante3, Aprobado, NombreDelCoach) 
			VALUES (:nombreEquipo, :estudiante1, :estudiante2, :estudiante3, :Aprobado, :NombreDelCoach)";

	
			$this->conectar();
			$this->conexion->prepare($sql)
				->execute(array(
					':nombreEquipo' => $obj->nombreEquipo,
					':estudiante1' => $obj->estudiante1,
					':estudiante2' => $obj->estudiante2,
					':estudiante3' => $obj->estudiante3,
					':Aprobado' => $obj->Aprobado,
					':NombreDelCoach' => $obj->NombreDelCoach
				));
	
			$clave = $this->conexion->lastInsertId();
			return $clave;
		} catch (Exception $e){
			return $clave;
		} finally {
			Conexion::desconectar();
		}
	}
}