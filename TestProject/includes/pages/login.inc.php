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

<div class="container">
    <div class="d-flex justify-content-center h-30 pt-5">
        <div class="card">
            <div class="card-header">
                <h4>Login</h4>
            </div>
        <div class="card-body">
            <form action="./php/login.php" method="post">
				<div class="input-group form-group">
				    <input type="email" name="email" class="form-control bg-dark" placeholder="E-mail" required/>
				</div>
                <div class="input-group form-group">
				    <input type="password" name="password" class="form-control bg-dark" placeholder="Wachtwoord" required/>
				</div>
				<div class="form-group">
				    <input type="submit" name="login" value="Login" class="btn float-right login_btn btn-primary">
				</div>
            </form>
        </div>
        <div class="card-footer">
            <a class="btn btn-outline-primary float-right" href="./index.php?page=register" role="button">Nog geen account?</a>
        </div>
    </div>
</div>