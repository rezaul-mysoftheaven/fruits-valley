// cart.js
document.addEventListener('DOMContentLoaded', function () {
    // Call calculateFinalTotal() when the page is loaded
    calculateFinalTotal();
});

function changeQuantity(fruitId, action) {
    const quantityInput = document.getElementById('quantity-' + fruitId);
    let newQuantity = parseInt(quantityInput.value);

    if (action === 'decrease') {
        newQuantity = Math.max(newQuantity - 1, 1);
    } else if (action === 'increase') {
        newQuantity = newQuantity + 1;
    }

    quantityInput.value = newQuantity;
    updateTotal(fruitId);
}

function updateTotal(fruitId) {
    const quantityInput = document.getElementById('quantity-' + fruitId);
    const totalPriceElement = document.getElementById('total-price-' + fruitId);
    const fruitPrice = parseFloat(quantityInput.getAttribute('data-price'));
    const quantity = parseInt(quantityInput.value);
    const total = fruitPrice * quantity;

    totalPriceElement.textContent = 'BDT: ' + total.toFixed(2);
    calculateFinalTotal();
}

function calculateFinalTotal() {
    const totalPrices = document.querySelectorAll('[id^=total-price-]');
    let finalTotal = 0;

    totalPrices.forEach((totalPrice) => {
        const priceText = totalPrice.textContent.replace('BDT: ', '');
        const price = parseFloat(priceText);
        finalTotal += price;
    });

    const finalTotalElement = document.getElementById('final-total');
    finalTotalElement.textContent = 'BDT: ' + finalTotal.toFixed(2);
}

function addToCart(fruitId) {
    // ... your existing add to cart logic ...
    // After adding an item to the cart, update the cart icon notification badge
    updateCartIconNotification();
}

function removeFromCart(fruitId) {
    // ... your existing remove from cart logic ...
    // After removing an item from the cart, update the cart icon notification badge
    updateCartIconNotification();
}

function updateCartIconNotification() {
    const cartIconBadge = document.querySelector('.cart-icon .badge');
    const totalItemsInCart = document.querySelectorAll('[id^=quantity-]').length;
    if (totalItemsInCart > 0) {
        cartIconBadge.textContent = totalItemsInCart;
        cartIconBadge.style.display = 'inline-block';
    } else {
        cartIconBadge.style.display = 'none';
    }
}
