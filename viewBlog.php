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
    <script src="js/blog.js" defer></script>
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
                <div class="sort">
                <?php
                // ADD NEW ENTRY FUNCTIONALITY
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
                    echo "<a href='addEntry.php'><u>Add New Entry</u></a><br><br>";
                } 
                ?>
                <form method="GET">
                    <select name="month" id="month">
                        <option value="">All Months</option>
                        <?php
                        // FILTER BY MONTH
                        $monthQuery = "SELECT DISTINCT DATE_FORMAT(datetime, '%Y-%m') AS yearmonth FROM BLOGS ORDER BY yearmonth DESC";
                        $monthResult = $conn->query($monthQuery);
                        $selectedMonth = $_GET['month'] ?? '';
                
                        while ($row = $monthResult->fetch_assoc()) {
                            $val = $row['yearmonth'];
                            $label = DateTime::createFromFormat('Y-m', $val)->format('F Y');
                            $selected = ($val == $selectedMonth) ? 'selected' : '';
                            echo "<option value=\"$val\" $selected>$label</option>";
                        }
                        ?>
                    </select>
                </form>
                </div>

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

                // Fetch blogs latest first (without ordering)
                if ($selectedMonth !== '') {
                    $stmt = $conn->prepare("SELECT title, description, datetime FROM BLOGS WHERE DATE_FORMAT(datetime, '%Y-%m') = ?");
                    $stmt->bind_param("s", $selectedMonth);
                    $stmt->execute();
                    $result = $stmt->get_result();
                } 
                else {
                    $sql = "SELECT title, description, datetime FROM BLOGS";
                    $result = $conn->query($sql);
                }

                // Store the results in an array
                $blogs = [];
                while ($row = $result->fetch_assoc()) {
                    $blogs[] = $row;
                }

                // Sort the array by 'datetime' in descending order using PHP's usort
                usort($blogs, function ($a, $b) {
                    // Convert datetime to timestamp for comparison
                    $timeA = strtotime($a['datetime']);
                    $timeB = strtotime($b['datetime']);
                    
                    // Return comparison result (descending order)
                    return $timeB - $timeA;
                });

                // Display the sorted blogs
                foreach ($blogs as $row) {
                    // Convert the datetime to a DateTime object and format it
                    $dt = new DateTime($row['datetime'], new DateTimeZone('UTC'));
                    $formattedTime = $dt->format('j F Y G:i') . ' UTC';

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