<?php
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['succes'])){
        echo $_SESSION['succes'];
        unset($_SESSION['succes']);
    }
?>
            <form action="./php/login.php" method="post">
				<div class="">
				    <input type="email" name="email" class="" placeholder="E-mail" required/>
				</div>
                <div class="">
				    <input type="password" name="password" class="" placeholder="Wachtwoord" required/>
				</div>
				<div class="">
				    <input type="submit" name="login" value="Login" class="">
				</div>
            </form>
            <a class="btn btn-outline-primary float-right" href="./index.php?page=register" role="button">Nog geen account?</a>