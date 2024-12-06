<?php
// Initialize $selected_project with a default value
$selected_project = 'new'; // Default to 'new' if no form submission

// Check if the form was submitted to load new or old images
if (isset($_POST['project_type'])) {
    $selected_project = $_POST['project_type'];
}

// Set the folder path based on the selected project type
$image_folder = ($selected_project === 'old') ? 'img/pes/old/' : 'img/pes/new/';

// Check if the directory exists
if (is_dir($image_folder)) {
    // Scan the folder for images
    $images = scandir($image_folder);
    // Remove "." and ".." from the directory listing
    $images = array_diff($images, array('.', '..'));

    // Check if images are found
    if (empty($images)) {
        $images = []; // If no images found, set to an empty array
    }
} else {
    $images = []; // Set to empty array if directory doesn't exist
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Enhancing Project</title>

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
            background: linear-gradient(45deg, #6a11cb, #2575fc, #00c6ff, #ff8a00);
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

        /* Header Styling */
        header {
            background: rgba(0, 0, 0, 0.7);
            text-align: center;
            padding: 40px 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        header h1 {
            font-size: 2.5rem;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
        }

        header p {
            font-size: 1.2rem;
        }

        header .btn {
            margin-top: 20px;
        }

        /* Cards for Images */
        .card {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            border-bottom: 5px solid #ffd700;
            border-radius: 0;
        }

        .card p {
            color: black;
        }

        /* Footer */
        footer {
            background: rgba(0, 0, 0, 0.7);
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <!-- Header -->
<!-- Header -->
<header>
    <div style="text-align: left;">
        <!-- Back Buttons -->
        <div>
            <a href="homepage.html" class="btn btn-outline-light">Back to Homepage</a>
            <a href="project.html" class="btn btn-outline-light">Back</a>
        </div>

        <!-- Title and Description -->
        <div class="text-center">
            <h1>Photo Enhancing Project</h1>
            <p class="mt-2">View Enhanced or Original Images</p>
        </div>

        <!-- Form for selecting project type -->
        <form method="POST" action="" class="mt-3 text-center">
            <button type="submit" name="project_type" value="new" class="btn btn-primary mx-2">Edited</button>
            <button type="submit" name="project_type" value="old" class="btn btn-secondary mx-2">Original</button>
        </form>
    </div>
</header>






    <!-- Main Content -->
    <main>
        <div class="container my-5">
            <h2 class="text-center"><?php echo ucfirst($selected_project); ?> Photos</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                if (!empty($images)) {
                    foreach ($images as $image) {
                        $image_path = $image_folder . $image;
                        echo "<div class='col'>";
                        echo "<div class='card'>";
                        echo "<img src='$image_path' alt='$image' class='card-img-top'>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p class='text-center'>No images available in this category.</p>";
                }
                ?>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Carlo J. Baleje. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
