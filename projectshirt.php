<?php
// Define a mapping of project names to their respective logo folders or images
$project_folders = [
    'nosuya shirt'            => 'img/tshirt/FRONT BACK white s.jpg',
    'Make Some Money'          => 'img/tshirt/FRONT BACK BLACK MSM.jpg',
    'Ambel'                    => 'img/tshirt/Ambel.jpg',
    'MYRAS KEYBOARD SQUAD'     => 'img/tshirt/MYRAS KEYBOARD SQUAD.jpg',
    'Blessed AD'               => 'img/tshirt/Blessed Ad Glass and Aluminum Services.jpg',
];

// Get the selected project, default to 'nosuya shirt' if not set
$selected_project = isset($_POST['project_type']) ? $_POST['project_type'] : 'nosuya shirt';

// Set the folder path or image path based on the selected project
$logo_folder = isset($project_folders[$selected_project]) ? $project_folders[$selected_project] : $project_folders['nosuya shirt'];

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
    // If not a directory, assume it's a direct image file (like "Nosuya Shirt")
    $logos = [$logo_folder];  // This will contain the fallback image
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tshirt Designs Project</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom-style.css">

    <style>
        /* Apply a similar background to the homepage */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #6a11cb, #2575fc, #00c6ff, #ff8a00); /* Example gradient */
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
    <header class="bg-dark text-white text-center py-5">
        <div class="container">
            <div style="text-align: left;">
            <a href="homepage.html" class="btn btn-secondary">Back to Homepage</a>
            <a href="project.html" class="btn btn-secondary">Back </a>
            </div>
            <h1>T-Shirt Designs</h1>
            <p>Select to view T-shirt for a specific project:</p>

            <!-- Form to toggle between projects -->
            <div class="button-container mb-3">
                <form method="POST" action="" class="mt-3">
                    <button type="submit" name="project_type" value="nosuya shirt" class="btn btn-primary mx-2">Nosuya Shirt</button>
                    <button type="submit" name="project_type" value="Make Some Money" class="btn btn-primary mx-2">Make Some Money</button>
                    <button type="submit" name="project_type" value="Ambel" class="btn btn-primary mx-2">Ambel</button>
                    <button type="submit" name="project_type" value="MYRAS KEYBOARD SQUAD" class="btn btn-primary mx-2">MYRA'S KEYBOARD SQUAD</button>
                    <button type="submit" name="project_type" value="Blessed AD" class="btn btn-primary mx-2">Blessed Ad Glass and Aluminum Services</button>
                </form>
            </div>
        </div>
    </header>

    <main>
        <div class="container my-5">
            <h2 class="text-center"><?php echo ucfirst(str_replace('_', ' ', $selected_project)); ?></h2>

            <!-- Display logos for the selected project -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                // Check if the logos array has any logos
                if (!empty($logos)) {
                    foreach ($logos as $logo) {
                        // Construct the correct image path
                        if (is_dir($logo_folder)) {
                            $logo_path = $logo_folder . '/' . $logo; // For folder-based logos
                        } else {
                            $logo_path = $logo_folder; // For direct image
                        }

                        echo "<div class='col'>";
                        echo "<div class='card text-center'>";
                        echo "<img src='$logo_path' alt='$logo' class='card-img-top' style='max-width: 100%; height: auto;'>";
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

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; <?php echo date("Y"); ?> My Portfolio. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

