<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Faizan Ahmed">
    <title>Faizan Ahmed</title>
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="wrapper">
        <header>
            <nav class="reader">
                <ul>
                    <li><a href=""><p><u>Home</u></p></a></li>
                    <li><a href="about.html"><p>About</p></a></li>
                    <li><a href="experience.html"><p>Experience</p></a></li>
                    <li><a href="projects.html"><p>Projects</p></a></li>
                    <li><a href="viewBlog.php"><p>Blog</p></a></li>
                </ul>
            </nav>
        </header>

        <article>
            <h1>Computer Science @ QMUL</h1>

            <section>
                <p>Always learning and doing.</p>
            </section>

            <figure>
                <img src="images/desktop.jpg">
            </figure>

            <aside>
                <?php
                session_start();

                $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "admin";
                
                // Creates connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Checks connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                if (isset($_SESSION['UserID'])) {
                    echo "<a href='logout.php'>Logout</a>";
                } 
                else {
                    echo "<a href='login.html'>Login</a>";
                }
                ?>
            </aside>
        </article>

        <footer>&copy; 2025 Faizan Ahmed. All rights reserved.</footer>
    </div>
</body>