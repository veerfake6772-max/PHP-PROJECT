<?php 

include("db.php");
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST"){


$email = $_POST["email"];
$pass = $_POST["pass"];

$sql = $conn->prepare("select name,password from user where email=?");
$sql -> bind_param("s",$email);
$sql -> execute();
$sql-> bind_result($name,$password);
$sql-> fetch();


if (password_verify($pass,$password)) {
    $_SESSION['name']=$name;
    header('location:home.php');
}
}

?>
<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header class="text-center mt-4">
            <h1> Login With Us</h1>
        </header>
        <main>
            <div
                class="container col=5"
            >
                <form action="" method="POST">
            
             <div class="form-floating mb-3">
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="formId1"
                    placeholder=""
                />
                <label for="formId1">Email</label>
            </div>
        

            <div class="form-floating mb-3">
                <input
                    type="password"
                    class="form-control"
                    name="pass"
                    id="formId1"
                    placeholder=""
                />
                <label for="formId1">Password</label>
            </div>
            
            <button
                type="submit"
                class="btn btn-primary"
            >
                Submit
            </button>
            
            
            </form>
            </div>
            
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
