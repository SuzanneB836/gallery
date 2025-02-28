<?php
// Include database connection
include 'db_connect.php';

// Variable to store messages
$message = "";

// Check if the form was submitted
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $descr = $_POST["descr"];
    $owner = $_POST["owner"];

    // Folder where images will be saved
    $uploadFolder = "uploads/";

    // Get the file extension (e.g., jpg, png)
    $fileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

    // Allowed image types
    $allowedTypes = ["jpg", "jpeg", "png"];

    // Check if the file type is valid
    if (!in_array($fileType, $allowedTypes)) {
        $message = "Error, alleen JPG, JPEG & PNG bestanden zijn toegestaan. Keer hier teug naar de <a href='main.php'>homepagina</a>.";
    } else {
        // Construct the new file name using the "name" input
        $newFileName = $name . '.' . $fileType;
        $filePath = $uploadFolder . $newFileName;

        // Move the uploaded file to the 'uploads' folder with the new name
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $filePath)) {
            // Save the file path and owner in the database
            $sql = "INSERT INTO item (name, descr, img, owner) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $name, $descr, $filePath, $owner);

            if ($stmt->execute()) {
                $message = "Succes! De knuffel is succesvol geüpload. Keer hier teug naar de <a href='main.php'>homepagina</a>.";
            } else {
                $message = "Oeps! Er was een error! Keer hier teug naar de <a href='main.php'>homepagina</a>." . $stmt->error;
            }

            $stmt->close();
        } else {
            $message = "Oeps! Er was een error bij het uploaden van de afbeelding. Keer hier teug naar de <a href='main.php'>homepagina</a>.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>

    <link rel="stylesheet" href="stylesheets/upload.css">
    <script src="script.js"></script>
</head>

<body>
    <div class="card">
        <h2>Upload je knuffel! 🧸</h2>

        <form action="upload.php" method="POST" enctype="multipart/form-data">

            <div class="input-container owner-cont">
                <label for="owner" class="owner-label input-label">Eigenaar</label>
                <input type="text" name="owner" id="owner" class="input-field" required>
                <span class="input-highlight"></span>
            </div>

            <div class="input-container name-cont">
                <label for="name" class="name-label input-label">Knuffelnaam</label>
                <input type="text" name="name" id="name" class="input-field" required>
                <span class="input-highlight"></span>
            </div>

            <div class="input-container desc-cont">
                <label for="descr" class="desc-label input-label">Beschrijving</label>
                <textarea name="descr" id="descr" class="input-field"></textarea>
                <span class="input-highlight"></span>
            </div>


            <div class="pic-cont">
                <div class="file-upload">
                    <label class="file-label">
                        <input type="file" id="getFile" name="image" class="file-input" onchange="updateFileName()" />
                        <span class="upload-icon">📁</span>
                        <p id="fileName">Klik hier om te uploaden</p>
                    </label>
                </div>
            </div>

            <div class="sub-cont">
                <button type="submit" name="submit">Verzenden</button>
            </div>

        </form>

        <div class="msg-cont">
            <!-- Display success/error message inside the card -->
            <?php if (!empty($message)): ?>
                <p class="message"><?php echo $message; ?></p>
            <?php endif; ?>
        </div>

    </div>

</body>

</html>