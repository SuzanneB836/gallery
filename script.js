// Upload.php > UpdateFileName() > Verandert de tekst van de file input naar de naam van de geuploade file.

function updateFileName() {
    var fileInput = document.getElementById('getFile');
    var fileName = document.getElementById('fileName');
    var file = fileInput.files[0];
    
    if (file) {
      fileName.textContent = file.name;
    } else {
      fileName.textContent = 'Click to upload';
    }
  }
  