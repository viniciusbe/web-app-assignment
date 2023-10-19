<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php
$email = $password = "";
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $f = fopen("autenticacao.txt", "r");

    $headers = fgetcsv($f);
    while (false != ($line = fgetcsv($f))) {
        if ($email == $line[0]) {
            $hashedPassword = hash('md5', $password);
            if ($hashedPassword == $line[1]) {
                $message = "Credenciais corretas";
                break;
            }
        }
    }

    if (empty($message)) {
        $message = "Email ou senha incorretos";
    }

    fclose($f);
}
?>

<body>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="field">
            <label for="email">Email:</label>
            <input type="text" name="email" placeholder="Digite seu email" />
        </div>

        <div class="field">
            <label for="password">Digite uma senha:</label>
            <input type="password" name="password" />
        </div>

        <div class="buttons_container">
            <input class="button" type="submit" value="Entrar" />
        </div>

        <span><?php echo $message; ?></span>
    </form>
</body>

</html>