<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Faizan Ahmed">
    <title>Faizan Ahmed</title>
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/viewBlog.css">
    <script src="js/cancel.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="wrapper">
        <header>
            <nav class="reader">
                <ul>
                    <li><a href="index.php"><p>Home</p></a></li>
                    <li><a href="about.html"><p>About</p></a></li>
                    <li><a href="experience.html"><p>Experience</p></a></li>
                    <li><a href="projects.html"><p>Projects</p></a></li>
                    <li><a href=""><p><u>Blog</u></a></p></li>
                </ul>
            </nav>
        </header>

        <article>
            <h1>Previewing Post</h1>
            <section class="blogs">
            <?php
            // Database connection
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "admin";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST["title"];
                $description = $_POST["description"];
            }

            $dt = new DateTime('now', new DateTimeZone('UTC'));
            $formattedTime = $dt->format('j F Y G:i') . ' UTC';

            echo '<div class="row">';
            echo '  <div class="blogtitle">';
            echo '    <h2>' . htmlspecialchars($title) . '</h2>';
            echo '    <em>' . $formattedTime . '</em>';
            echo '  </div>';
            echo '  <p>' . nl2br(htmlspecialchars($description)) . '</p>';
            echo '</div>';
            ?>
            <form action="addPost.php" method="post">

                <div class="prev-btn">
                    <input type="submit" value="Submit">
                    <input id="cancel" name="cancel" type="button" value="Cancel">
                </div>

                <input class="hide" type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>">
                <textarea class="hide" id="description" name="description"><?php echo htmlspecialchars($description); ?></textarea>
            </form>
            
            </section>
        </article> 
    </div>
</body>