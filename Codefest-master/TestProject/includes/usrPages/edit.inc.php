            <form action="./php/update.php" method="post">
				<div class="">
				    <input type="text" name="username" class="" placeholder="<?php echo $_SESSION['username'] ?>"/>
				</div>
                <div class="">
				    <input type="email" name="email" class="" placeholder="<?php echo $_SESSION['email'] ?>"/>
				</div>
                <div class="">
				    <input type="password" name="password" class="" placeholder="Wachtwoord"/>
				</div>
				<div class="">
				    <input type="submit" name="update" value="Aanpassen" class="">
				</div>
            </form>
            <a class="" href="./index.php?page=profile" role="button">Ga terug zonder iets te veranderen</a>