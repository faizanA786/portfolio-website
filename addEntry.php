<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Faizan Ahmed">
    <title>Faizan Ahmed</title>
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/addEntry.css">
    <script src="js/addEntry.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="wrapper">
        <header>
            <nav class="reader">
                <ul>
                    <li><a href="index.php"><p>Home</p></a></li>
                    <!-- <li><a href="about.html"><p>About Me</p></a></li>
                    <li><a href="experience.html"><p>Experience</p></a></li>
                    <li><a href="projects.html"><p>Projects</p></a></li>
                    <li><a href="viewBlog.html"><p>Blog</a></p></li> -->
                    <li><u><p>Logged In!</p></u></li>
                </ul>
            </nav>
        </header>

        <aside>
            <form action="preview.php" method="post"> 
                <h1>New Blog</h1>
                <input type="text" id="title" name="title" placeholder="Blog Title...">
                <textarea id="description" name="description" placeholder="Blog Description..."></textarea>
                <div class="action">
                    <button id="submit" type="submit"><h2>Post</h2></button>
                    <button id="reset" type="button"><h2>Clear</h2></button>
                </div>
            </form> 
        </aside>

        <div class="popup" id="popup">
            <div class="children">
                <h1>You are about to clear the text fields.</h1>
                <div class="action">
                    <button id="confirm" type="button"><h2>Clear</h2></button>
                    <button id="cancel" type="button"><h2>Cancel</h2></button>
                </div>
            </div>
        </div>
    </div>
</body>