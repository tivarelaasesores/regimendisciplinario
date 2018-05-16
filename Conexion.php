<?php
    class Conexion{
        //Atributos
        private $hostname = "localhost:3307";
		private $username = "root";
		private $password = "root";
		private $database = "proyecto";
		private $resultado = array();
		private $res = false;
        
        //Contructor
		public function __constructor(){	}

        //Sets & Gets
        public function setHostname($hostname){
            $this->hostname = $hostname;
        }
		public function getHostname(){
			return $this->hostname;
		}
        public function setUsername($username){
            $this->username = $username;
        }
		public function getUsername(){
			return $this->username;
		}
        public function setPassword($password){
            $this->password = $password;
        }
		public function getPassword(){
			return $this->password;
		}
        public function setDatabase($database){
            $this->database = $database;
        }
		public function getDatabase(){
			return $this->database;
		}
        public function setResultado($resultado){
            $this->resultado = $resultado;
        }
        
        //Funcion principal para conectar a la base de Datos
        function conectar(){
			try {
				$conexion= mysqli_connect($this->getHostname(), $this->getUsername(), $this->getPassword(), 
					$this->getDatabase()) or die("<p>No se encuentra el servidor</p>");
				return $conexion;
			} catch (Exception $e) {
				echo "<p>".$e->getMessage."</p>";
			}
		}        
        //Funcion Login para verificar las credenciales de autentificacion
        function Login($user, $pass){
			try {
				$sql= 'Call Select_Log_Usuario("'.$user.'","'.$pass.'");';
				$consulta = mysqli_query($this->conectar(), $sql);
				$this->resultado= mysqli_fetch_array($consulta);
				return $this->resultado;
			} catch (Exception $e) {
				echo "<p>".$e->getMessage."</p>";			
            }
		}
        
/*//////////////////////////////////////////////////////////////////////////////////
///////////////////////////////// Usuarios /////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////*/
        //Funcion Consulta general de usuarios habilitados, permite buscar por nombre
        function Select_G_Usuarios($busqueda){
            $cont = 0;
            $con = $this->conectar();
            $sql= "Call Select_G_Usuarios('".$busqueda."');'";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Consulta general de usuarios habilitados y deshabilitados, permite buscar por nombre
        function Select_G_UsuariosComplete($busqueda){
            $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_UsuariosComplete('".$busqueda."');'";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Insert de los usuarios
        function Insert_Usuarios($user,$pass,$rol){
            $con = $this->conectar();
            $sql="Call Insert_Usuarios('".$user."','".$pass."','".$rol."');";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
            return $this->res;
        }
        //Update usuarios general
        function Update_Usuarios($user, $pass, $rol, $state){
            $con = $this->conectar();
            $sql="Call Update_Usuarios('".$user."','".$pass."','".$rol."','".$state."');";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
            return $this->res;
        }
        //Update contraseña pidiendo el nombre de usuario, contraseña actual (cpass) y nueva (npass)
        function Update_Usuarios_Pass($user,$cpass,$npass){
            $con = $this->conectar();
            $sql="Call Update_Usuarios_Pass('".$user."','".$cpass."','".$npass."');'";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
            return $this->res;
        }
        
/*//////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// Roles ///////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////*/
        //Consulta general de Roles
        function Select_G_Roles(){
            $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_Roles();";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Insert de roles
       function Insert_Roles($name){
            $con = $this->conectar();
            $sql= "Call Insert_Roles('".$name."');";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
            return $this->res;
        }
        //Update de Roles
        function Update_Roles($Id,$name){
            $con = $this->conectar();
            $sql= "Call Update_Roles('".$id."','".$name."');";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
            return $this->res;
        }
/*/////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// Clientes ///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////*/
        //Consulta general de clientes habilitados, permite buscar por ID, Nombre, Apellidos o Correo
        function Select_G_Clientes($busqueda){
            $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_Clientes('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Consulta general de clientes habilitados y deshabilitados, permite buscar por ID, Nombre, Apellidos o Correo
        function Select_G_ClientesComplete($busqueda){
            $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_ClientesComplete('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Insert Clientes
        function Insert_Clientes($id,$nombre,$apellido1,$apellido2,$correo,$direccion, $telefono1, $telefono2, $cedulajuridica,$user){
            $con = $this->conectar();
            $sql= "Call Insert_Clientes('".$id."','".$nombre."','".$apellido1."','".$apellido2."','".$correo."','".$direccion."','".$telefono1."','".$telefono2."','".$cedulajuridica."','".$user."');";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close(); 
            return $this->res;
        }
        //Update Clientes
        function Update_Clientes($id,$nombre,$apellido1,$apellido2,$correo,$direccion, $telefono1, $telefono2, $cedulajuridica,$user){
            $con = $this->conectar();
            $sql= "Call Update_Clientes('".$id."','".$nombre."','".$apellido1."','".$apellido2."','".$correo."','".$direccion."','".$telefono1."','".$telefono2."','".$cedulajuridica."','".$user."');";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close(); 
            return $this->res;
        }
/*/////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// Empresas ///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////*/
        //Select de empresas habilitadas, permite buscar por Cedula Juridica, Nombre o Correo
        function Select_G_Empresas($busqueda){
            $cont = 0;
            $con = $this->conectar();
            $sql= "Call Select_G_Empresas('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Select de empresas habilitadas y deshabilitadas, permite buscar por Cedula Juridica, Nombre o Correo
        function Select_G_EmpresasComplete($busqueda){
            $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_EmpresasComplete('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Insert Empresas
        function Insert_Empresas($cedulajuridica,$nombre,$correo,$direccion, $telefono1, $telefono2, $foto){
            $con = $this->conectar();
            $sql= "Call Insert_Empresas('".$cedulajuridica."','".$nombre."','".$correo."','".$direccion."',".$telefono1.",".$telefono2.",'".$foto."');";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close(); 
            return $this->res;
        }
        //Update Empresas
        function Update_Empresas($cedulajuridica,$nombre,$correo,$direccion, $telefono1, $telefono2, $foto,$estado){
            $con = $this->conectar();
            $sql= "Call Update_Empresas('".$cedulajuridica."','".$nombre."','".$correo."','".$direccion."',".$telefono1.",".$telefono2.",'".$foto."',".$estado.");";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false; 
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close(); 
            return $this->res;
        }
/*/////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// Empleados //////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////*/
        //Select Empleados habilitados, permite busqueda por Id, Nombre, Correo o Usuario
        function Select_G_Empleados($busqueda){
            $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_Empleados('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Select Empleados habilitados y deshabilitados, permite busqueda por Id, Nombre, Correo o Usuario
        function Select_G_EmpleadosComplete($busqueda){
          $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_EmpleadosComplete('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Insert Empleados
        function Insert_Empleados($id,$nombre,$apellido1,$apellido2,$correo,$fnacimiento,$direccion, $telefono1, $telefono2, $foto, $user){
            $con = $this->conectar();
            $sql= "Call Insert_Empleados('".$id."','".$nombre."','".$apellido1."','".$apellido2."','".$correo."','".$fnacimiento."','".$direccion."',".$telefono1.",".$telefono2.",".$foto.",'".$user."');";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false; 
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();   
            return $this->res;
        }
        //Update Empleados
        function Update_Empleados($id,$nombre,$apellido1,$apellido2,$correo,$fnacimiento,$direccion, $telefono1, $telefono2, $foto, $user){
            $con = $this->conectar();
            $sql= "Call Update_Empleados('".$id."','".$nombre."','".$apellido1."','".$apellido2."','".$correo."','".$fnacimiento."','".$direccion."',".$telefono1.",".$telefono2.",".$foto.",'".$user."');";
            $con = $this->conectar();
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
            return $this->res;
        }
/*/////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////// Expediente Laboral ///////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////*/
        //Select Expediente Laboral de empleado y empresas habilitadas, permite busqueda por Id del Empleado, Nombre del empleado, Cedula Juridica o Nombre de la empresa
        function Select_G_ExpedienteL($busqueda){
            $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_ExpedienteL('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Select Expediente Laboral empleado y empresas habilitadas y deshabilitadas, permite busqueda por Id del Empleado, Nombre del empleado, Cedula Juridica o Nombre de la empresa
        function Select_G_ExpedienteLComple($busqueda){
           $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_ExpedienteLComplete('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Insert Expediente Laboral
        function Insert_ExpedienteL($idempleado,$cedulajuridica,$fecha_ingreso,$fecha_salida,$jefe,$idpuesto,$tipo_contrato,$salario_bruto, $horas_extras, $total_extras, $descuento, $salario_neto){
            $con = $this->conectar();
            $sql= "Call Insert_ExpedienteL('".$idempleado."','".$cedulajuridica."',".($fecha_ingreso =="Null"? $fecha_ingreso:"'".$fecha_ingreso."'").",".($fecha_salida =="Null"? $fecha_salida:"'".$fecha_salida."'").",'".$jefe."',".$idpuesto.",'".$tipo_contrato."',".$salario_bruto.",".$horas_extras.",".$total_extras.",".$descuento.",".$salario_neto.");";
			if(mysqli_query($con,$sql)){
                $this->res=true; 
            }else{
                $this->res = false;
                echo "<p>".$sql."</p>";   
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();   
            return $this->res;
        }
        //Update Expediente Laboral
        function Update_ExpedienteL($idempleado,$cedulajuridica,$fecha_ingreso,$fecha_salida,$jefe,$idpuesto,$tipo_contrato,$salario_bruto, $horas_extras, $total_extras, $descuento, $salario_neto){
            $con = $this->conectar();
            $sql= "Call Update_ExpedienteL('".$idempleado."','".$cedulajuridica."',".($fecha_ingreso =="Null"? $fecha_ingreso:"'".$fecha_ingreso."'").",".($fecha_salida =="Null"? $fecha_salida:"'".$fecha_salida."'").",'".$jefe."','".$idpuesto."','".$tipo_contrato."','".$salario_bruto."','".$horas_extras."','".$total_extras."','".$descuento."','".$salario_neto.");";
			if(mysqli_query($con,$sql)){
                $this->res=true;   
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close(); 
            return $this->res;
        }
/*/////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////// Puestos //////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////*/
        //Select puesto habilitados, permite busqueda por nombre de puesto o de empresa
        function Select_G_Puestos($busqueda){
            $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_Puestos('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Select puestos habilitados y deshabilitados, permite busqueda por nombre de puesto o de empresa
        function Select_G_PuestosComplete($busqueda){
           $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_PuestosComplete('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Insert Puestos
        function Insert_Puestos($cedulajuridica, $nombre, $salario, $tipo_jornada, $pago_hora, $pago_extras){
            $con = $this->conectar();
            $sql= "Call Insert_Puestos('".$cedulajuridica."','".$nombre."',".$salario.",'".$tipo_jornada."',".$pago_hora.",".$pago_extras.");";
			if(mysqli_query($con,$sql)){
                $this->res=true;   
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close(); 
            return $this->res;
        }
        //Update Puestos
        function Update_Puestos($id,$cedulajuridica, $nombre, $salario, $tipo_jornada, $pago_hora, $pago_extras){
            $con = $this->conectar();
            $sql= "Call Update_Puestos(".$id.",'".$cedulajuridica."','".$nombre."',".$salario.",'".$tipo_jornada."',".$pago_hora.",".$pago_extras.");";
			if(mysqli_query($con,$sql)){
                $this->res=true;   
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close(); 
            return $this->res;
        }
/*/////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////// Documentos ///////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////*/
        //Select documentos habilitados, permite busqueda por Id del empleado o nombre del empleado
        function Select_G_Documentos($busqueda){
           $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_Documentos('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Select documentos habilitados y deshabilitado, permite busqueda por Id del empleado o nombre del empleado
        function Select_G_DocumentosComplete($busqueda){
           $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_DocumentosComplete('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Insert Documentos
        function Insert_Documentos($idempleado,$nombre,$descripcion,$fecha_subida,$idcategoria,$ruta){
            $con = $this->conectar();
            $sql= "Call Insert_Documentos('".$idempleado."','".$nombre."','".$descripcion."','".$fecha_subida."','".$idcategoria."','".$ruta."',);";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close(); 
            return $this->res;
        }
        //Update Documentos
        function Update_Documentos($iddocumento,$idempleado,$nombre,$descripcion,$fecha_subida,$idcategoria,$ruta){
            $con = $this->conectar();
            $sql= "Call Update_Documentos('".$idempleado."','".$nombre."','".$descripcion."','".$fecha_subida."','".$idcategoria."','".$ruta."',);";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close(); 
            return $this->res;
        }
/*/////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////// Contratos ///////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////*/
        //Select Contratos habilitados, permite busqueda por nombre de la empresa, Id del documento o nombre de puesto
        function Select_G_Contratos($busqueda){
            $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_Contratos('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Select Contratos habilitados y deshabilitados, permite busqueda por nombre de la empresa, Id del documento o nombre de puesto
        function Select_ContratosComplete($busqueda){
           $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_ContratosComplete('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Insert Contratos
        function Insert_Contratos($cedulajuridica, $idpuesto,$nombre,$fecha_publicacion,$ruta){
            $con = $this->conectar();
            $sql= "Call Insert_Contratos('".$cedulajuridica."',".$idpuesto.",'".$nombre."','".$fecha_publicacion."','".$ruta."');";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";  
            }
            $con->close(); 
            return $this->res;
        }
        //Update Contratos
        function Update_Contratos($id,$cedulajuridica, $idpuesto,$nombre,$fecha_publicacion,$ruta){
            $con = $this->conectar();
            $sql= "Call Update_Contratos(".$id.",'".$cedulajuridica."',".$idpuesto.",'".$nombre."','".$fecha_publicacion."','".$ruta."');";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";
            }
            $con->close(); 
            return $this->res;
        }
        
/*/////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////// Registro_Emp_Contrato ////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////*/
        //Select registro empleado contrato habilitados, permite busqueda por Id contrato, nombre de la empresa o nombre del empleado
        function Select_G_RegistroEC($busqueda){
           $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_RegistroEC('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Select registro empleado contrato habilitados y deshabilitados, permite busqueda por Id contrato, nombre de la empresa o nombre del empleado
        function Select_RegistroECComplete($busqueda){
           $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_RegistroECComplete('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Insert Registros Empleado Contrato
        function Insert_RegitroEC($idcontrato,$cedulajuridica, $idempleado, $fecha_subida, $ruta){
            $con = $this->conectar();
            $sql= "Call Insert_RegistroEC(".$idcontrato.",'".$cedulajuridica."','".$idempleado."','".$fecha_subida."','".$ruta."');";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close(); 
            return $this->res;
        }
        //Update Registros Empleado Contrato
        function Update_RegitroEC($idcontrato,$cedulajuridica, $idempleado, $fecha_subida, $ruta){
            $con = $this->conectar();
            $sql= "Call Update_RegistroEC(".$idcontrato.",'".$cedulajuridica."','".$idempleado."','".$fecha_subida."','".$ruta."');";
			if(mysqli_query($con,$sql)){
                $this->res=true;
                echo "<p>".$sql."</p>";
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";
                
            }
            $con->close(); 
            return $this->res;
        }

/*/////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////// Addendums //////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////*/
        //Select addendum habilitados, permite busqueda por Id ademdum, Id contrato, Nombre de empleado o nombre de la empresa
        function Select_G_Addendum($busqueda){
            $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_Addendum('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){   
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Select addendum habilitados, permite busqueda por Id ademdum, Id contrato, Nombre de empleado o nombre de la empresa
        function Select_G_AddendumComplete($busqueda){
           $cont= 0;
            $con = $this->conectar();
            $sql= "Call Select_G_AddendumComplete('".$busqueda."');";
            $consulta = mysqli_query($this->conectar(), $sql);
			if($consulta){
                while ($row = mysqli_fetch_array($consulta)){
                    $this->resultado[$cont] = $row;
                    $cont++;
                }
                return $this->resultado;
            }else{
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close();
        }
        //Insert Addendum
        function Insert_Addendum($idcontrato, $cedulajuridica, $idempleado, $nombre, $fecha_subida, $ruta){
            $con = $this->conectar();
            $sql= "Call Insert_Addendum('".$idcontrato."','".$cedulajuridica."','".$idempleado."','".$nombre."','".$fecha_subida."','".$ruta."');'";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close(); 
            return $this->res;
        }
        //Update Addendum
        function Update_Addendum($idaddendum,$idcontrato,$cedulajuridica, $idempleado, $nombre, $fecha_subida, $ruta){
            $con = $this->conectar();
            $sql= "Call Insert_Addendum('".$idcontrato."','".$cedulajuridica."','".$idempleado."','".$nombre."','".$fecha_subida."','".$ruta."');'";
			if(mysqli_query($con,$sql)){
                $this->res=true;
            }else{
                $this->res = false;
                echo "<p>".mysqli_error($con)."</p>";    
            }
            $con->close(); 
            return $this->res;
        }
    }

?>