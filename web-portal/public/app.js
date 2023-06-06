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

//function to do an ajax call to the backend and populate the table every 60
function refreshTable(){
    tableID = document.getElementById("imageUpload")
}


        // Function to perform search
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                for (var j = 0; j < td.length; j++) {
                    var cell = td[j];
                    if (cell) {
                        txtValue = cell.textContent || cell.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        }
