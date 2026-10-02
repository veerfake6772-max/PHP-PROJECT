<?php

include("db.php");
session_start();
if (isset($_GET['id'])) {
    $id =$_GET['id'];
    $sql = $conn->prepare("select * from users where id=?");
    $sql -> bind_param('i',$id);
    $sql->execute();
    $user = $sql->get_result()->fetch_assoc();
   
}





if ($_SERVER["REQUEST_METHOD"]==="POST") {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];

    $sql = $conn->prepare("update users set name=?,email=?,phone=?,city=? where id = ?");
    $sql -> bind_param('ssssi',$name,$email,$phone,$city,$id);
    if ($sql->execute()) {
        header("location:home.php");
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
        <header>
            
        </header>
        <main>

        <h3 class="text-center my-4 "> Enter User  Details</h3>
        <div
            class="container col-5 border shadow py-4 rounded"
        >
           <form method="POST">
    <div class="form-floating mb-3">
        <input
            type="text"
            class="form-control"
            name="name"
            id="formId1"
            placeholder=""
            value="<?php echo $user['name']?> "
        />
        <label for="formId1">User Name</label>
    </div>
    
    <div class="form-floating mb-3">
        <input
            type="text"
            class="form-control"
            name="email"
            id="formId1"
            placeholder=""
            value="<?php echo $user['email']?> "
        />
        <label for="formId1"> Email</label>
    </div>
    
<div class="form-floating mb-3">
    <input
        type="text"
        class="form-control"
        name="phone"
        id="formId1"
        placeholder=""
        value="<?php echo $user['phone']?> "
    />
    <label for="formId1">Phone </label>
</div>

<div class="form-floating mb-3">
    <input
        type="text"
        class="form-control"
        name="city"
        id="formId1"
        placeholder=""
        value="<?php echo $user['city']?> "
    />
    <label for="formId1">City</label>
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

