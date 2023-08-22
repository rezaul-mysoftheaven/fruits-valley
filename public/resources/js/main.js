//To show the total price on order page in real time
function updateTotalPrice(currentPrice) {
    const quantityInput = document.getElementById('quantity');
    const quantity = parseInt(quantityInput.value);
    const totalPrice = currentPrice * quantity;

    const totalPriceElement = document.getElementById('total_price');
    totalPriceElement.textContent = `BDT: ${totalPrice}`;
}

//Redirect after close the Order Success Alert
document.addEventListener("DOMContentLoaded", function () {
    const closeButton = document.querySelector(".btn-close");
    closeButton.addEventListener("click", function () {
        window.location.href = frontendHomeRoute;
    });
});