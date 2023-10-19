<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar conta</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Nunito:ital,wght@0,400;0,500;1,400&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="./global.styles.css">
    <link rel="stylesheet" href="./form.styles.css"> -->
</head>

<?php
// define variables and set to empty values
$name = $email = $age = $phone = $password = $os = $from = $job = "";
$emptyErr = $phoneErr = $emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $os = $_POST["os"];
    $from = $_POST["from"];
    $job = $_POST["job"];

    $fields = array($name, $email, $age, $phone, $password, $os, $from, $job);

    if (in_array("", $fields)) {
        $emptyErr = "Erro: preencha todos os campos";
    } else {
        if (!preg_match("/^\(?[1-9]{2}\)? ?(?:[2-8]|9[0-9])[0-9]{3}\-?[0-9]{4}$/", $phone)) {
            $phoneErr = "Formato de telefone inválido";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de email inválido";
        }
    }

    if (count(array_filter(array($emptyErr, $phoneErr, $emailErr))) == 0) {
        $message = "Nome: $name\nEmail: $email";
        echo "<script>alert('$message');</script>";
    }
}
?>

<body>
    <header class="header">
        <h1>Tecnologia</h1>
        <h2><i>Só o que você precisa saber</i></h2>
    </header>


    <main class="main">
        <nav class="sidenav">
            <a href="home.html">Home</a>
            <a href="form.html">Criar conta</a>
            <a href="table.html">Comparação</a>
        </nav>

        <div class="container">
            <article class="content">
                <h1>Criar conta</h1>

                <form id="form" class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="field">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" placeholder="Digite seu nome" autocomplete="off" />
                    </div>


                    <div class="field">
                        <label for="email">Email:</label>
                        <input type="text" name="email" placeholder="Digite seu email" />
                        <span style="color: red;"><?php echo $emailErr; ?></span>
                    </div>


                    <div class="field_row">
                        <div class="field">
                            <label for="age">Idade:</label>
                            <input type="number" name="age" placeholder="Digite sua idade">
                        </div>

                        <div class="field">
                            <label for="phone">Celular: </label>
                            <input type="text" id="phone" name="phone" placeholder="(99) 99999-9999">
                            <span style="color: red;"><?php echo $phoneErr; ?></span>
                        </div>
                    </div>

                    <div class="field checkbox_container">
                        <label for="os">Qual sistema operacional usa:</label>

                        <div>
                            <input type="checkbox" id="linux" name="os" value="linux" />
                            <label for="linux">Linux</label>
                        </div>

                        <div>
                            <input type="checkbox" id="windows" name="os" value="windows" />
                            <label for="windows">Windows</label>
                        </div>

                        <div>
                            <input type="checkbox" id="macOS" name="os" value="macos" />
                            <label for="macOS">MacOS</label>
                        </div>

                        <div>
                            <input type="checkbox" id="other" name="os" value="other">
                            <label for="other">Outro</label>
                        </div>
                    </div>


                    <div class="field">
                        <label for="from">Como encontrou nosso site?</label>
                        <input list="sites" name="from" id="from">
                        <datalist id="sites">
                            <option value="Google" />
                            <option value="LinkedIn" />
                            <option value="Instagram" />
                            <option value="Twitter" />
                        </datalist>
                    </div>



                    <div class="field radio_container">
                        <p>Está buscando vagas de emprego?</p>

                        <div>
                            <input type="radio" id="yes" value="yes" name="job" />
                            <label for="yes">Sim</label>
                        </div>

                        <div>
                            <input type="radio" id="no" value="no" name="job" />
                            <label for="no">Não</label>
                        </div>
                    </div>

                    <div class="field">
                        <label for="password">Digite uma senha:</label>
                        <input type="password" name="password" />
                    </div>

                    <div class="buttons_container">
                        <input class="button" type="reset" value="Limpar" />
                        <input class="button" type="submit" value="Salvar" />
                        <span style="color: red;"><?php echo $emptyErr; ?></span>
                    </div>

                    <input hidden readonly value="true" name="sendNewsletter" />

                </form>
            </article>

            <footer class="footer">
                <p>
                    This site is build with ❤ by Vinícius Bernardes
                </p>
                <p>
                    All code on this site is licensed under the MIT license.
                </p>
            </footer>
        </div>
    </main>
</body>

</html>