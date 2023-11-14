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
require 'database.php';

// Function to display post
function display_post($conn){
    $sql = "SELECT id, title, content FROM posts";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<h2>" . $row["title"] . "</h2>";
            echo "<p>" . $row["content"] . "</p>";
            echo "<hr>";
        }
    }
    else {
        echo "No post found";
    }
}
?>

    <div class="container">
        <?php 
        display_post($conn); 
        ?>
    </div>
</body>
</html>
</body>
</html>