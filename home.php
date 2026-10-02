<?php

include("db.php");
session_start();
$result = $conn ->query("select * from users");



if ($_SERVER["REQUEST_METHOD"]==="POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];

    $sql = $conn->prepare("insert into users (name,email,phone,city) values(?,?,?,?)");
    $sql -> bind_param('ssss',$name,$email,$phone,$city);
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
            <nav
                class="navbar navbar-expand-sm navbar-light"
            >
                <div class="container">
                    <a class="navbar-brand bg-primary rounded px-2" href="#"> <?php if(isset(($_SESSION['name']))){
                        echo "HELLO ". strtoupper($_SESSION['name']);
                    }else{
                        echo "HELLO";
                    }; ?></a>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                
                            </li>
                            
                            
                               
                            </li>
                        </ul>
                        <a class="d-flex my-2 lg-0 btn btn-outline-primary"
                            name=""
                            id=""
                            class="btn btn-primary"
                            href="csv.php"
                            role="button"
                            >CSV</a
                        >
                        <a class="d-flex my-2 lg-0 btn btn-outline-primary"
                            name=""
                            id=""
                            class="btn btn-primary"
                            href="pdf.php"
                            role="button"
                            >PDF</a
                        >
                        
                        <form class="d-flex my-2 my-lg-0" action="logout.php">
                            
                            <button
                                class="btn btn-outline-primary my-2 my-sm-0"
                                type="submit"
                                
                            >
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            
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

                <?php if (isset($_SESSION['name'])) {?>
        <h3 class="text-center my-4 ">Users Dashboard</h3>
        <div
            class="container "
        >

        <div
            class="table-responsive"
        >
            <table
                class="table table-primary"
            >
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">City</th>
                        <th scope="col">Action</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php while($row =$result->fetch_assoc()){?>
                    <tr class="">
                        <td scope="row"><?= $row['id']?></td>
                        <td scope="row"><?= $row['name']?></td>
                        <td scope="row"><?= $row['email']?></td>
                        <td scope="row"><?= $row['phone']?></td>
                        <td scope="row"><?= $row['city']?></td>
                        <td scope="row"><a
                            name=""
                            id=""
                            class="btn btn-primary"
                            href="edit.php?id=<?php echo $row['id'] ?>"
                            role="button"
                            >EdIt</a
                        >
                        </td>
                        <td scope="row"><a
                            name=""
                            id=""
                            class="btn btn-primary"
                            href="delete.php?id=<?php echo $row['id'] ?>"
                            role="button"
                            >Delete</a
                        ></td>
                    </tr>

                    <?php }?>
 
                </tbody>
            </table>
        </div>
        
        </div>
        
        <?php } ?>
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

