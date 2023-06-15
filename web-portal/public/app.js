// Function to open the modal
function openModal() {
    var modal = document.getElementById("myModal");
    var inputImage = document.getElementById("imageUpload");
    var selectedImage = document.getElementById("selectedImage");
    modal.style.display = "block";

    //code for closing modeal when user clicks anywhere else
    window.onclick = function(event) {
        if (event.target == modal) {
        
        inputImage.value = "";
        selectedImage.src = ""
          modal.style.display = "none";
        }
      }

      //code for closing modal by clicking modal close icon
      modalClose = document.getElementById("modalClose")
      modalClose.onclick = function() {
        
        inputImage.value = "";
        selectedImage.src = ""
        modal.style.display = "none";
      }


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


    // Function to update the table
    function updateTable() {
        // Perform the table update here
        
        // Example code to fetch new data from an API endpoint
        fetch('get_data_only')
            .then(response => response.json())
            .then(data => {
                // Assuming the table has an id of "myTable"
                var table = document.getElementById("myTable");
                
                // Clear existing table rows except first row(table heads)
                while (table.rows.length > 1) {
                    table.deleteRow(1);
                }
                
                // Iterate through the new data and add rows to the table
                data.forEach(item => {
                    var row = table.insertRow();
                    var cell1 = row.insertCell();
                    var cell2 = row.insertCell();
                    var cell3 = row.insertCell();
                    var cell4 = row.insertCell();
                    cell4.bgColor=item.colorCode;
                    // console.log(cell4)
                    cell1.textContent = item.task;
                    cell2.textContent = item.title;
                    cell3.textContent = item.description;
                    cell4.textContent = item.colorCode;
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
    
    // Function to update the table every 60 minutes
    function scheduleTableUpdate() {
        updateTable(); // Update immediately
        
        setInterval(updateTable, 60 * 60 * 1000); // Schedule updates every 60 minutes (60 * 60 * 1000 milliseconds)
    }
    
    // Call the function to start updating the table
    document.onload=scheduleTableUpdate();
    
    
