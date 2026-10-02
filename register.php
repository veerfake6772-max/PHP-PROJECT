<?php

include("db.php");
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $name = $_POST["name"];
    $email= $_POST["email"];
    $pass = password_hash($_POST["pass"],PASSWORD_BCRYPT);

    $sql = $conn ->prepare("insert into user (name,email,password) values(?,?,?)");
    $sql ->bind_param("sss",$name,$email,$pass);

  if (empty($name)) {
    echo "<script>alert('Name is Required')</script>";
} elseif (empty($pass)) {
    echo "<script>alert('Password is Required')</script>";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid Email Format')</script>";
} else {

    if ($sql->execute()) {
        header("Location: login.php");
        exit;
    }

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
            <h1> Register With Us</h1>
        </header>
        <main>
            <div
                class="container col=5"
            >
                <form action="" method="POST">

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="formId1"
                    placeholder=""
                />
                <label for="formId1">Name</label>
            </div>
            
            <div class="form-floating mb-3">
                <input
                    type="text"
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
