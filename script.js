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

function openModal(src) {
    document.getElementById("modalImg").src = src;
    document.getElementById("imgModal").style.display = "block";
}

function closeModal() {
    document.getElementById("imgModal").style.display = "none";
}
