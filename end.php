<?php
$list_pass = json_decode(file_get_contents("pass.json"), true); // get password list
$json_var = json_decode(file_get_contents("var.json"), true); // get variables from var.json

function getPassType($pass, $list_pass){
    if (!isset($_COOKIE['password'])){
        return null;
    } else {
        if (isset($_COOKIE['password'], $list_pass)){
            return true;
        } else {
            return null;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/end.css">
    <title>Tu as finis !</title>
</head>
<body>
<div class="title">
    <?php
    $data = json_decode(file_get_contents("data.json"), true);
    if (isset($_COOKIE['password'])){
        $pass = $_COOKIE['password'];
    } else {
        $pass = "undefined";
    }
    $pass_type = getPassType($pass, $list_pass);
    if ($pass_type){
        if (isset($data[$pass]["retry"])){
            if ($data[$pass]["retry"] < 5){
                header('Location: index.php');
                return;
            }
        }
    ?>
    <div style="text-align: center;">

        <h1>Tu as finis !</h1>
            <h2>Mon meilleur score : <b><?php echo round((int)$data[$pass]["score"] / 40) ?> </b></h2>
            <h3>
                <br>Top joueurs : <br>
                <?php
                $list_players = [];
                foreach ($data as $current_data){
                    if (isset($current_data["score"])){
                        $list_players[$current_data["score"]] = $current_data["username"];
                    }
                }
                krsort($list_players);
                $i = 0;

                foreach($list_players as $score => $username)
                {
                    echo $username." a obtenu le score de ". round($score/40)."<br>";
                    if ($i >= 2) break;
                    $i++;
                }

                ?>
            </h3>
    </div>
    <?php
    } else {
        ?>
        <center>
            <h1>Tu as finis !</h1>
            <h2>Mot de passe invalide, le score ne peux pas être affiché</h2>
        </center>
    <?php
    }
    ?>
</div>
</body>
</html>