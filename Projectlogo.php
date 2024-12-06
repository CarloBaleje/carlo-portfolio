<?php
// Define a mapping of project names to their respective logo folders or images
$project_folders = [
    'the_vintage_lab'           => 'img/logo/The Vintage Lab.jpg',
    'paraluman_leasing_corp'    => 'img/logo/Paraluman Leasing Corp.jpg',
    'nosuya_habit'              => 'img/logo/Nosuya Habit.jpg',
    'mk'                        => 'img/logo/MK.png',
    'kenzo_athena'              => 'img/logo/KABG.jpg',
    'eva_beauty'                => 'img/logo/Eva Bueaty Products.jpg',
    'blessed_AD'                => 'img/logo/Blessed A.D Glass And Aluminum Services.jpg'
];

// Always set a default value for $selected_project
$selected_project = isset($_POST['project_type']) ? $_POST['project_type'] : 'the_vintage_lab';

// Set the folder path or image path based on the selected project
$logo_folder = isset($project_folders[$selected_project]) ? $project_folders[$selected_project] : $project_folders['the_vintage_lab'];

// Check if the path is a directory (for projects with a folder)
if (is_dir($logo_folder)) {
    // Scan the folder for images
    $logos = scandir($logo_folder);
    // Remove "." and ".." from the directory listing
    $logos = array_diff($logos, array('.', '..'));

    // If no logos are found, set an empty array
    if (empty($logos)) {
        $logos = [];
    }
} else {
    // If not a directory, assume it's a direct image file (like "The Vintage Lab")
    $logos = [$logo_folder]; // This will contain the fallback image
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logo Design Project</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        /* Animated Gradient Background */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #6a11cb, #2575fc, #00c6ff, #ff8a00); /* Base colors */
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            color: white;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* Header and Footer Styling */
        header,
        footer {
            background: rgba(0, 0, 0, 0.7);
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
        }

        header {
            padding: 50px 0;
        }

        footer {
            padding: 20px 0;
        }

        header h1,
        header p,
        footer p {
            color: white;
        }

        /* Section Titles */
        h2 {
            color: white;
            text-align: center;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
        }

        /* Buttons */
        .btn-primary {
            background-color: transparent;
            border: 2px solid white;
        }

        .btn-primary:hover {
            background-color: gray;
        }

        .btn-secondary {
            background-color: transparent;
            border: 2px solid white;
            color: white;
        }

        .btn-secondary:hover {
            background-color: gray;
            color: white;
        }
    </style>
</head>

<body>
    <header class="text-center">
        <div style="text-align: left;">
            <a href="homepage.html" class="btn btn-secondary">Back to Homepage</a>
            <a href="project.html" class="btn btn-secondary">Back</a>
        </div>

        <div class="container">
            <h1>Logo Design Project</h1>
            <p>Select to view logos for a specific project:</p> <br>
            <div class="button-container">
                <form method="POST" action="" class="mt-3">
                    <button type="submit" name="project_type" value="the_vintage_lab" class="btn btn-primary mx-2">The Vintage Lab</button>
                    <button type="submit" name="project_type" value="paraluman_leasing_corp" class="btn btn-primary mx-2">Paraluman Leasing Corp</button>
                    <button type="submit" name="project_type" value="nosuya_habit" class="btn btn-primary mx-2">Nosuya Habit</button>
                    <button type="submit" name="project_type" value="mk" class="btn btn-primary mx-2">MK</button>
                    <button type="submit" name="project_type" value="kenzo_athena" class="btn btn-primary mx-2">Kenzo & Athena's Baked Goodies</button><br><br>
                    <button type="submit" name="project_type" value="eva_beauty" class="btn btn-primary mx-2">Eva Beauty Products</button>
                    <button type="submit" name="project_type" value="blessed_AD" class="btn btn-primary mx-2">Blessed A.D Glass And Aluminum Services</button>
                </form>
            </div>
        </div>
    </header>

    <main>
        <div class="container my-5">
            <h2><?php echo ucwords(str_replace('_', ' ', $selected_project)); ?></h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                if (!empty($logos)) {
                    foreach ($logos as $logo) {
                        // Correctly form the path to the logo
                        $logo_path = is_dir($logo_folder) ? $logo_folder . '/' . $logo : $logo_folder;
                        echo "<div class='col'>";
                        echo "<div class='card text-center'>";
                        echo "<div class='d-flex justify-content-center align-items-center'>";
                        echo "<img src='$logo_path' alt='$logo' class='card-img-top' style='max-width: 100%; height: auto;'>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No logos available in this category.</p>";
                }
                ?>
            </div>
        </div>
    </main>

    <footer class="text-center">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Carlo J. Baleje. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
