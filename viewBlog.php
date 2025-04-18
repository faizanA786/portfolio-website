<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Faizan Ahmed">
    <title>Faizan Ahmed</title>
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/viewBlog.css">
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
            <h1>My Posts</h1>
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

            // Fetch blogs, latest first
            $sql = "SELECT title, description, datetime FROM BLOGS ORDER BY datetime DESC";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $dt = new DateTime($row['datetime']);
                $formattedTime = $dt->format('jS F Y H:i');

                echo '<div class="row">';
                echo '  <div class="blogtitle">';
                echo '    <h2>' . htmlspecialchars($row['title']) . '</h2>';
                echo '    <em>' . $formattedTime . '</em>';
                echo '  </div>';
                echo '  <p>' . nl2br(htmlspecialchars($row['description'])) . '</p>';
                echo '</div>';
            }
            ?>
                <!-- <div class="row">
                    <div class="blogtitle">
                        <h2>Example Blog</h2>
                        <em>28/04/25, 13:24 UTC</em>
                    </div>
                    <p>Hello this is an example of my blog layout it will look something very similiar to this, (or similiar to the work history part in my experience page).</p>
                </div>
                <div class="row">
                    <div class="blogtitle">
                        <h2>Rejected from every Spring Week - What I learned</h2>
                        <em>28/04/25, 13:24 UTC</em>
                    </div>
                    <p>Second Blog.</p>
                </div> -->
            </section>
        </article> 
    </div>
</body>