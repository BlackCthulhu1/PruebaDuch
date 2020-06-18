<?php
class Cl_User
{
	/**
	 * @var va a contener la conexión de base de datos
	 */
	protected $_con;

	/**
	 * Inializar DBclass
	 */
	public function __construct()
	{
		$db = new Cl_DBclass();
		$this->_con = $db->con;
	}

	/**
	 * Registro de usuarios
	 * @param array $data
	 */
	public function registration(array $data)
	{
		if (!empty($data)) {

			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);



			// escapar de las variables para la seguridad
			$name = mysqli_real_escape_string($this->_con, $trimmed_data['name']);
			$password = mysqli_real_escape_string($this->_con, $trimmed_data['password']);
			$cpassword = mysqli_real_escape_string($this->_con, $trimmed_data['confirm_password']);


			// Verifica la direccion de correo electrónico:
			if (filter_var($trimmed_data['email'], FILTER_VALIDATE_EMAIL)) {
				$email = mysqli_real_escape_string($this->_con, $trimmed_data['email']);
			} else {
				throw new Exception("Por favor, introduce una dirección de correo electrónico válida!");
			}


			if ((!$name) || (!$email) || (!$password) || (!$cpassword)) {
				throw new Exception(FIELDS_MISSING);
			}
			if ($password !== $cpassword) {
				throw new Exception(PASSWORD_NOT_MATCH);
			}
			$password = md5($password);
			$query = "INSERT INTO clientes (id_cliente, name, apellidos, email, password, phone, address, created, modified, status) VALUES (NULL,'$name', '','$email','$password' ,'', '',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 'Activo')";
			if (mysqli_query($this->_con, $query)) {
				mysqli_close($this->_con);
				return true;
			};
		} else {
			throw new Exception(USER_REGISTRATION_FAIL);
		}
	}
	/**
	 * Este metodo para iniciar sesión
	 * @param array $data
	 * @return retorna falso o verdadero
	 */
	public function login(array $data)
	{
		$_SESSION['logged_in'] = false;
		if (!empty($data)) {

			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);

			// escapar de las variables para la seguridad
			$email = mysqli_real_escape_string($this->_con,  $trimmed_data['email']);
			$password = mysqli_real_escape_string($this->_con,  $trimmed_data['password']);

			if ((!$email) || (!$password)) {
				throw new Exception(LOGIN_FIELDS_MISSING);
			}
			$password = md5($password);
			$query = "SELECT id_cliente, name, email, created FROM clientes where email = '$email' and password = '$password' ";
			$result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			$count = mysqli_num_rows($result);
			if ($count == 1) {
				mysqli_close($this->_con);
				$_SESSION = $data;
				$_SESSION['logged_in'] = true;
				$sesion=true;
				return true;
			} else {
			$query = "SELECT id_empleado, name, email, tipo_empleado FROM empleados where email = '$email' and password = '$password' ";
			$result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			$count = mysqli_num_rows($result);
			mysqli_close($this->_con);
			if ($count == 1) {
				$_SESSION = $data;
				$_SESSION['logged_in'] = true;
				$sesion=true;
				return true;
			}
				
			}
		} else {
			throw new Exception(LOGIN_FIELDS_MISSING);
		}
	}



	/**
	 * El siguiente metodo para verificar los datos de la cuenta para el cambio de contraseña
	 * @param array $data
	 * @throws Exception
	 * @return boolean
	 */

	public function account(array $data)
	{
		if (!empty($data)) {
			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);

			// escapar de las variables para la seguridad
			$password = mysqli_real_escape_string($this->_con, $trimmed_data['password']);
			$cpassword = $trimmed_data['confirm_password'];
			$user_id = mysqli_real_escape_string($this->_con, $trimmed_data['id_cliente']);

			if ((!$password) || (!$cpassword)) {
				throw new Exception(FIELDS_MISSING);
			}
			if ($password !== $cpassword) {
				throw new Exception(PASSWORD_NOT_MATCH);
			}
			$password = md5($password);
			$query = "UPDATE clientes SET password = '$password' WHERE id_cliente = '$user_id'";
			if (mysqli_query($this->_con, $query)) {
				mysqli_close($this->_con);
				return true;
			}
		} else {
			throw new Exception(FIELDS_MISSING);
		}
	}




	/**
	 * Este metodo para cerrar las sesión
	 */
	public function logout()
	{
		session_unset();
		session_destroy();
		header('Location: index.php');
	}

	/**
	 * Esto restablece la contraseña actual y la nueva contraseña para enviar correo
	 * @param array $data
	 * @throws Exception
	 * @return boolean
	 */
	
	public function forgetPassword(array $data)
	{
		require 'PHPMailer/PHPMailerAutoload.php';
		//Create a new PHPMailer instance
		$mail = new PHPMailer();
		$mail->IsSMTP();

		//Configuracion servidor mail
		$mail->From = "duchamp.tienda.online@gmail.com"; //remitente
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls'; //seguridad
		$mail->Host = "smtp.gmail.com"; // servidor smtp
		$mail->Port = 587; //puerto
		$mail->Username = 'duchamp.tienda.online@gmail.com'; //nombre usuario
		$mail->Password = 'Duchamp123'; //contraseña
		
		if (!empty($data)) {

			// escapar de las variables para la seguridad
			$email = mysqli_real_escape_string($this->_con, trim($data['email']));

			if ((!$email)) {
				throw new Exception(FIELDS_MISSING);
			}
			$password = $this->randomPassword();
			$password1 = md5($password);
			$query = "UPDATE clientes SET password = '$password1' WHERE email = '$email'";
			if (mysqli_query($this->_con, $query)) {
				mysqli_close($this->_con);
				$subject = "Nueva solicitud de contraseña";
                 $body = '<html>
				 <body style="margin: 0.2em; color: #000000;">
				 <div style="width: 80%; font-family: Arial, Helvetica, sans-serif; font-size: 1em; padding: 2em;">
				 <div align="center">
				 <img src="https://i.pinimg.com/originals/20/87/75/208775849081e0a4597d12440e65bd94.jpg" style="display: block;" alt="" />
				 </div><br><br>
				 <p> Su nueva contraseña es: '. $password.'</p>
				 ************************************<br>
				 Este E-Mail es una respuesta automática, un saludo ;)<br>
				 ************************************<br>
				 </div>
				 </body>
				 </html>';
				$txt = "Su nueva contraseña " . $password;
				$headers = "From: duchamp.tienda.online@gmail.com";
				$mail->AddAddress($email);
				$mail->Subject = $subject;
				$mail->MsgHTML($body);

				if ($mail->Send()) {
					return true;
				} else {
					echo'<script type="text/javascript">
						   alert("NO ENVIADO, intentar de nuevo");
						</script>';
				}	
			}
		} else {
			throw new Exception(FIELDS_MISSING);
		}
	}

	/**
	 * Esto generará una contraseña aleatoria
	 * @return string
	 */

	private function randomPassword()
	{
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //recuerde que debe declarar $pass como un array
		$alphaLength = strlen($alphabet) - 1; //poner la longitud -1 en caché
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //convertir el array en una cadena
	}
}
