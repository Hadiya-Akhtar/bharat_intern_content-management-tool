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

    <?php
        require 'database.php';
        if(isset($_POST["submit"])){
        $title=$_POST["title"];
        $content=$_POST["content"];
        $sql = "INSERT INTO posts (title, content) values(?,?)";
            
        // Prepare statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("ss", $title, $content);

        // Execute statement
        if($stmt->execute()){
            echo "New post created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $stmt->error;
        }
    }
    ?>
    <h1>The Green</h1>
    <div class="navbar_for_others">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="create.php">Create</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>
    <div class="container">
        <form action="create.php" method="post">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br>
            <label for="content">Content:</label><br>
            <textarea id="content" name="content" rows="4" cols="50" required></textarea><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>