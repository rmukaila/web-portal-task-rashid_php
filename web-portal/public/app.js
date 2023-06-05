// Function to open the modal
function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";


    document.getElementById("imageUpload").onchange = function (e) {
        var reader = new FileReader();
        reader.onload = function () {
            var selectedImage = document.getElementById("selectedImage");
            selectedImage.src = reader.result;
            selectedImage.style.display = "block";
        };
        reader.readAsDataURL(e.target.files[0]);
    };
}

