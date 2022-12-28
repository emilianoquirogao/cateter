<?php
 	if(isset($_SESSION['user'])&&$_SESSION['user']!='') {
		header('Location: ' . $url_inicio);
		die('Redirecting to ' . $url_inicio);
		exit;
	}
$submitted_username ='';
$datosincorrectos='';

    require_once("engine/.inc/common.php"); 
	$datosincorrectos='';

    if(!empty($_POST)) 
    { 
        $query = "SELECT id, username, password, email FROM usuarios WHERE username = :username"; 
        $query_params = array( 
            ':username' => $_POST['username']
        ); 
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params);
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query");
        } 
        $login_ok = false;
        $row = $stmt->fetch(); 
        if($row) 
        {
            $check_password =  $_POST['password']; 
            if($check_password === $row['password']) 
            { 
                $login_ok = true;
            }
        }
		if($login_ok) 
		{ 
			unset($row['password']); 
			$_SESSION['user'] = $row; 
			header("Location: " . $url_inicio); 
			die("Redirecting to: " . $url_inicio); 
		}
		else 
		{ 
			$datosincorrectos = "1"; 
			$submitted_username = strip_tags(htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8')); 
		} 
    } 
?>
		<div class="login-form mt-1">
            <div class="section">
                <img src="assets/img/misc/login.png" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h1>Ingreso</h1>
                <h4>Accedé a la app con tu usuario y contraseña</h4>
            </div>
            <div class="section mt-1 mb-5">
                <form action='<?php echo $url_login ?>' method='POST'>
				
					<?php if($datosincorrectos == "1"): ?>
					<div class="alert2 alert-danger m-b-0" role="alert">
					  Los datos ingresados son incorrectos.
					</div>
					<?php endif; ?>
					
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Usuario" value='<?php if(isset($submitted_username)) echo $submitted_username;?>' required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" autocomplete="off" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-button-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Entrar</button>
                    </div>

                </form>
            </div>
        </div>