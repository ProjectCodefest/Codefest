<div class="container">
    <div class="d-flex justify-content-center h-80 pt-5">
        <div class="card">
            <div class="card-header">
                <h4>Pas je informatie aan</h4>
            </div>
        <div class="card-body">
            <form action="./php/update.php" method="post" enctype="multipart/form-data">
                <div class="input-group form-group">
                    Profielfoto:<input type="file" name="image"/>
                </div>
				<div class="input-group form-group">
				    <input type="text" name="firstname" class="form-control bg-dark" placeholder="<?php echo $_SESSION['firstname'] ?>"/>
				</div>
                <div class="input-group form-group">
				    <input type="text" name="lastname" class="form-control bg-dark" placeholder="<?php echo $_SESSION['lastname'] ?>"/>
				</div>
                <div class="input-group form-group">
				    <label>Woonplaats:</label>
                    <select name="city" class="form-control bg-dark">
                        <option value="" disabled selected><?php $_SESSION['city']; ?></option>
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
				    <input type="text" name="street" class="form-control bg-dark" placeholder="<?php echo $_SESSION['street'] ?>"/>
				</div>
                <div class="input-group form-group">
				    <input type="text" name="housenumber" class="form-control bg-dark" placeholder="<?php echo $_SESSION['housenumber'] ?>"/>
				</div>
                <div class="input-group form-group">
				    <input type="text" name="postalcode" class="form-control bg-dark" placeholder="<?php echo $_SESSION['postalcode'] ?>"/>
				</div>
                <div class="input-group form-group">
				    <input type="email" name="email" class="form-control bg-dark" placeholder="<?php echo $_SESSION['email'] ?>"/>
				</div>
                <div class="input-group form-group">
				    <input type="password" name="password" class="form-control bg-dark" placeholder="Wachtwoord"/>
				</div>
				<div class="form-group">
				    <input type="submit" name="update" value="Aanpassen" class="btn float-right login_btn btn-primary">
				</div>
            </form>
        </div>
        <div class="card-footer">
            <a class="btn btn-outline-primary float-right" href="./index.php?page=profile" role="button">Ga terug zonder iets te veranderen</a>
        </div>
    </div>
</div>