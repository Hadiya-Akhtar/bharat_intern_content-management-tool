<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content_management_tool</title>
    <link rel="stylesheet" href="/bharat_intern_content-management-tool/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&family=Playpen+Sans&family=Poppins:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <h1>The Green</h1>
    <div class="navbar_for_others">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="create.php">Create</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>

    <?php
    if(isset($_POST["login"])){
        $email=$_POST["email"];
        $password=$_POST["password"];
        require_once "database.php";
        $sql= "select*from users where email='$email'";
        $result=mysqli_query($conn,$sql);
        $user= mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($user){
            if(password_verify($password, $user["password"])){
                /* session allow only the logged in user to access dashboard */
                header("Location: index.php");
                die();
            }
            else{
                echo "<div class='alert alert-danger'>Password dosen't match</div>";
            }
        }
        else{
            echo "<div class='alert alert-danger'>email dosen't match</div>";
        }
    }
    ?>

    <div class="container">
        <form action="login.php" method="post">
        <div class="form_group">
            <input type="email" class="form-control" name="email" placeholder="Enter email">
        </div>
        <div class="form_group">
            <input type="password" class="form-control" name="password" placeholder="Enter password">
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="login" name="login">
        </div>
        <p class="sign">Don't have an account!<a href="/bharat_intern_content-management-tool/phpfiles/signup.php">Signup</a></p>
        </form>
        
    </div>
</body>
</html>