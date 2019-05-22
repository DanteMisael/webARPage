<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1, user-scalable=no">

  <title>Registro de usuario</title>

</head>
<body data-view-form-context="view-form" data-device="desktop" data-rules-are-loaded="">
  <form action="FormularioRegistro.php" method="POST">
    <table>
      <tr>
        <td> <p > <b> Nombre Usuario* </b> </p><input type="text" name="nombreUser">
          <p> <b> Contrase�a* </b> </p><input type="password" name="Pass"
          <p> <b> Correo para enviarte la informaci�n*</b> </p><input type="text" name="correoe"
          <p> <b> Repetir contrase�a* </b> </p><input type="password" name="passConfirm">
          <input type="submit" name="btnRegistrar">
        </td>
      </tr>
    </table>
  </form>

  <?php
  require_once('PHPMailer.php');
  if(isset($_REQUEST['btnRegistrar'])){
    $nombreC = $_REQUEST['nombreUser'];
    $pass = $_REQUEST["Pass"];
    $passConfirm = $_REQUEST["passConfirm"];
    $correoe = $_REQUEST["correoe"];
    if(($nombreC != "") == true){
      if ($pass != "" && $pass == $passConfirm){
        $true = '$true';
        $dominio = "@www.reprobados.com";
        $mail = $nombreC . $dominio;
        $cmd = 'powershell.exe New-ADUSER -DisplayName \"'. $nombreC .'\" -Name \"'. $nombreC .'\" -UserPrincipalName \"'. $nombreC .'\"-EmailAddress \"'. $mail .'\" -Enabled:$true -Path \"OU=USUARIOS, DC=www, DC=reprobados,DC=com\" -AccountPassword (ConvertTo-SecureString -string \"'. $pass .'\" -AsPlainText -Force)';
        echo shell_exec($cmd);
        echo $cmd;

      	$mail = new PHPMailer();
      	//indico a la clase que use SMTP
      	$mail->IsSMTP();
      	//permite modo debug para ver mensajes de las cosas que van ocurriendo
      	$mail->SMTPDebug = 2;
      	//Debo de hacer autenticaci�n SMTP
      	$mail->SMTPAuth = true;
      	$mail->SMTPSecure = "ssl";
      	//indico el servidor de Gmail para SMTP
      	$mail->Host = "smtp.gmail.com";
      	//indico el puerto que usa Gmail
      	$mail->Port = 465;
      	//indico un usuario / clave de un usuario de gmail
      	$mail->Username = "materiot@gmail.com";
      	$mail->Password = "My719337915_";
      	$mail->SetFrom('materiot@gmail.com', 'Carlos Misael Mu�oz Elenes');
      	$mail->AddReplyTo("materiot@gmail.com","Carlos Misael Mu�oz Elenes");
      	$mail->Subject = "Bienvenido a SquirrelMail";
      	$mail->MsgHTML("Correo: $mail
      	FTP: $nombreC
      	Contrase�a: $pass      Funciona para el correo y ftp
      	Disfruta de nuestro servidor de correos!");
      	//indico destinatario
      	$address = $correoe;
      	$mail->AddAddress($address, $nombreC);
      	if(!$mail�>Send()) {
      	   echo "Error al enviar: " . $mail�>ErrorInfo;
      	} else {
      	   echo "Mensaje enviado!";
      	}

        $applicacion = '"hMailServer.Application"';
        $usuarioh = '"Administrator"';
        $contrah= '"My719337915_"';
        $dominioh = '"'."www.reprobados.com".'"';
        $cuentah= '"'.$nombreC.'@www.reprobados.com"';
        $contrasenah= '"'.$pass.'"';
        $my_file = 'C:\inetpub\wwwroot\Registro\cuentas\creacion.vbs';
        $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
        $data = "   Dim obApp
Set obApp = CreateObject($applicacion)

Call obApp.Authenticate($usuarioh, $contrah)

Dim obDomain
Set obDomain = obApp.Domains.ItemByName($dominioh)

Dim obAccount
Set obAccount = obDomain.Accounts.Add

obAccount.Address = $cuentah
obAccount.Password = $contrasenah
obAccount.Active = True
obAccount.MaxSize = 100

obAccount.Save";
fwrite($handle, $data);
fclose($handle);
	echo shell_exec($my_file);
        echo "</br> Usuario registrado con �xito";
      }else{
        echo "Las contrase�as no coinciden";
      }
    }else{
      echo "Tienes que ingresar un nombre almenos";
    }
  }
  ?>
</body>
</html>
