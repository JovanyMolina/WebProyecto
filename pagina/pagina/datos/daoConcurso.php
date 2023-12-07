<?php
//importa la clase conexión y el modelo para usarlos
require_once ('conexion.php'); 
require_once ('modelos\concursos.php'); 


class DAOConcurso
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
			$sentenciaSQL = $this->conexion->prepare("SELECT id,nombre,fechaInicio,fechaFin,estado FROM concurso");
			

            //Se ejecuta la sentencia sql, retorna un cursor con todos los elementos
			$sentenciaSQL->execute();
            
            //$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            /*Podemos obtener un cursor (resultado con todos los renglones como 
            un arreglo de arreglos asociativos o un arreglo de objetos*/
            /*Se recorre el cursor para obtener los datos*/
			foreach($resultado as $fila)
			{
				$obj = new concurso();
                $obj->id = $fila->id;
	            $obj->nombre = $fila->nombre;
	            $obj->fechaInicio = $fila->fechaInicio;
                $obj->fechaFin = $fila->fechaFin;
	            $obj->estado = $fila->estado;

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
	
	public function obtenerTodosActivados()
{
    try
    {
        $this->conectar();

        $lista = array();
        $sentenciaSQL = $this->conexion->prepare("SELECT id, nombre, fechaInicio, fechaFin, estado FROM concurso WHERE estado = 'Activado'");

        $sentenciaSQL->execute();

        $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

        foreach($resultado as $fila)
        {
            $obj = new concurso();
            $obj->id = $fila->id;
            $obj->nombre = $fila->nombre;
            $obj->fechaInicio = $fila->fechaInicio;
            $obj->fechaFin = $fila->fechaFin;
            $obj->estado = $fila->estado;

            $lista[] = $obj;
        }

        return $lista;
    }
    catch(PDOException $e){
        return null;
    } finally {
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
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM concurso WHERE id = ?");			          
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
	public function activar($id)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("UPDATE concurso SET estado = 'Activado' WHERE id=?");			          
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
	public function desactivar($id)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("UPDATE concurso SET estado = 'No activado' WHERE id=?");			          
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
     * Función para editar al usuario de acuerdo al objeto recibido como parámetro
     */
	public function editar(concurso $obj)
	{
		try 
		{
			$sql = "UPDATE concurso
                    SET
                    nombre = ?,
                    fechaInicio = ?,
                    fechaFin = ?,
                    estado = ?
                    WHERE id = ?;";

            $this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare($sql);
			$sentenciaSQL->execute(
				array($obj->nombre,
                      $obj->fechaInicio,
                      $obj->fechaFin,
					  $obj->fechaFin,
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
            
			$sentenciaSQL = $this->conexion->prepare("SELECT id,nombre,fechaInicio,fechaFin,estado FROM concurso WHERE id=?"); 
			//Se ejecuta la sentencia sql con los parametros dentro del arreglo 
            $sentenciaSQL->execute([$id]);
            
           // /Obtiene los datos/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $obj = new concurso();
            
            $obj->id = $fila->id;
            $obj->nombre = $fila->nombre;
            $obj->fechaInicio = $fila->fechaInicio;
            $obj->fechaFin = $fila->fechaFin;
            $obj->estado = $fila->estado;
    
           
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
	public function agregar(concurso $obj)
	{
		$clave = 0;
		try 
		{
			$sql = "INSERT INTO concurso  
			(nombre, fechaInicio, fechaFin, estado) 
			VALUES (:nombre, :fechaInicio, :fechaFin, :estado)";

	
			$this->conectar();
			$this->conexion->prepare($sql)
				->execute(array(
					':nombre' => $obj->nombre,
					':fechaInicio' => $obj->fechaInicio->format('Y-m-d'),
					':fechaFin' => $obj->fechaFin->format('Y-m-d'),
					':estado' => $obj->estado
					
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