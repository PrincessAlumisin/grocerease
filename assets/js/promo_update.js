function updatePrice(selectElement) {
    const selectedPromo = selectElement.value;
    const row = selectElement.closest('tr');
    const priceCell = row.querySelector('td[data-price]');
    const prodID = row.querySelector('.prodID').value; // Retrieve product ID from the hidden input

    const originalPrice = parseFloat(priceCell.dataset.price);

    if (selectedPromo === "Buy 1 Take 1") {
        priceCell.textContent = "₱" + originalPrice.toFixed(2);
    } else if (selectedPromo === "50%") {
        const newPrice = originalPrice * 0.5;
        priceCell.textContent = "₱" + newPrice.toFixed(2);
    } else if (selectedPromo === "20%") {
        const newPrice = originalPrice * 0.8;
        priceCell.textContent = "₱" + newPrice.toFixed(2);
    } else if (selectedPromo === "5%") {
        const newPrice = originalPrice * 0.95;
        priceCell.textContent = "₱" + newPrice.toFixed(2);
    } else {
        // If no promo is selected, revert back to the original price
        priceCell.textContent = "₱" + originalPrice.toFixed(2);
    }

    // Store the selected promo in local storage
    const selectedPromos = JSON.parse(localStorage.getItem("selectedPromos")) || {};
    selectedPromos[prodID] = selectedPromo;
    localStorage.setItem("selectedPromos", JSON.stringify(selectedPromos));
}

// Set the selected promos on page load
document.addEventListener("DOMContentLoaded", function() {
    const selectedPromos = JSON.parse(localStorage.getItem("selectedPromos")) || {};
    const selectElements = document.querySelectorAll('select[name="prodPromo"]');
    selectElements.forEach((selectElement) => {
        const row = selectElement.closest('tr');
        const prodID = row.querySelector('.prodID').value;
        if (selectedPromos[prodID]) {
            selectElement.value = selectedPromos[prodID];
            // Manually trigger the updatePrice function to update the displayed price
            updatePrice(selectElement);
        }
    });
});

console.log("Sending AJAX request with data:", { selectedPromo, prodID });