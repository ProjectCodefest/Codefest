<?php
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
?>

<div class="container">
    <div class="d-flex justify-content-center h-80 pt-5">
        <div class="card">
            <div class="card-header">
                <h4>Registreren</h4>
            </div>
        <div class="card-body">
            <form action="./php/register.php" method="post">
				<div class="input-group form-group">
				    <input type="text" name="firstname" class="form-control bg-dark" placeholder="Voornaam" required/>
				</div>
                <div class="input-group form-group">
				    <input type="text" name="lastname" class="form-control bg-dark" placeholder="Achternaam" required/>
				</div>
                <div class="input-group form-group">
                    <label>Woonplaats:</label>
                    <select name="city" class="form-control bg-dark" required>
                        <?php
                        $sql = "SELECT * FROM cities";
                        $sth = $conn->prepare($sql);
                        $sth->execute();
                        $result = $sth->fetchAll();
                        foreach($result as $city){ ?>
                            <option value="<?php echo $city['CityId']; ?>"><?php echo $city['CityName']; ?></option>
                        <?php } ?>
                    </select>
				</div>
                <div class="input-group form-group">
				    <input type="text" name="street" class="form-control bg-dark" placeholder="Straatnaam" required/>
				</div>
                <div class="input-group form-group">
				    <input type="text" name="housenumber" class="form-control bg-dark" placeholder="Huisnummer" required/>
				</div>
                <div class="input-group form-group">
				    <input type="text" name="postalcode" class="form-control bg-dark" placeholder="Postcode" required/>
				</div>
                <div class="input-group form-group">
				    <input type="email" name="email" class="form-control bg-dark" placeholder="E-mail" required/>
				</div>
                <div class="input-group form-group">
				    <input type="password" name="password" class="form-control bg-dark" placeholder="Wachtwoord" required/>
				</div>
				<div class="form-group">
				    <input type="submit" name="register" value="Registreer" class="btn float-right login_btn btn-primary">
				</div>
            </form>
        </div>
        <div class="card-footer">
            <a class="btn btn-outline-primary float-right" href="./index.php?page=login" role="button">Al een account?</a>
        </div>
    </div>
</div>