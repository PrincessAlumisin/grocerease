import products from './notification.js'

const deleteAllButton = document.querySelector('#deleteAllButton');
var table = document.getElementById("table");
var tbody = table.getElementsByTagName("tbody")[0];


products.data.length ? products.data.forEach((item) => {
    // Creating element for HTML table
    var row = document.createElement("tr");
    var prodId = document.createElement("td");
    var manuDate = document.createElement("td");
    var expDate = document.createElement("td");
    var deleteCell = document.createElement("td");
    var deleteButton = document.createElement("button");
    var deleteIcon = document.createElement("i");

    // Storing data from notification.js
    prodId.textContent = item.prodId;
    manuDate.textContent = item.manuDate;
    expDate.textContent = item.expDate;

    // Setting styles and classname
    row.classname = "row";
    deleteButton.style = "background-color: transparent; color: #ff0000; border: none; font-size: 20px; cursor: pointer;";
    deleteIcon.className = "bx bxs-trash";
    deleteButton.appendChild(deleteIcon);

    // For trashcan button function
    deleteButton.addEventListener("click", () => {
        // Delete the last row when the button is clicked
        let rowIndex = row.rowIndex;
        table.deleteRow(rowIndex);
    });
    deleteCell.appendChild(deleteButton);

    // Adding the element in HTML table
    row.appendChild(prodId);
    row.appendChild(manuDate);
    row.appendChild(expDate);
    row.appendChild(deleteCell)

    tbody.appendChild(row);
}) : alert("The Data is empty already!"); // if the data is empty

// Eventlistener for the delete all function
deleteAllButton.addEventListener("click", () => {
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }
})