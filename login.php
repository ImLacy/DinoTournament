<?php
$json_var = json_decode(file_get_contents("var.json"), true); // get variables from var.json
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $json_var["title"] ?></title>
</head>
<body>

<form action="index.php" method="post">
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3><?php echo $json_var["title"] ?></h3>
                <p></p>
                <input type="submit" name="" value="Envoyer"/><br/>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Entrez vos informations</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Mot de passe*" name="password" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Pseudo*" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

</body>
</html>
