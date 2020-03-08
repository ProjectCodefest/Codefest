<?php
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
?>
            <form action="./php/register.php" method="post">
				<div class="">
				    <input type="text" name="username" class="" placeholder="Voornaam" required/>
				</div>
                <div class="">
				    <input type="email" name="email" class="" placeholder="E-mail" required/>
				</div>
                <div class="input-group form-group">
				    <input type="password" name="password" class="" placeholder="Wachtwoord" required/>
				</div>
				<div class="form-group">
				    <input type="submit" name="register" value="Registreer" class="btn float-right login_btn btn-primary">
				</div>
            </form>