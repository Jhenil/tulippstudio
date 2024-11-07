function increaseQuantity(productId, basePrice) {
  let quantityInput = document.getElementById("quantity-" + productId);
  let currentQuantity = parseInt(quantityInput.value);
  let maxQuantity = parseInt(quantityInput.max);

  if (currentQuantity < maxQuantity) {
    quantityInput.value = currentQuantity + 1;
    updateTotalPrice(productId, basePrice);
  }
}

function decreaseQuantity(productId, basePrice) {
  let quantityInput = document.getElementById("quantity-" + productId);
  let currentQuantity = parseInt(quantityInput.value);

  if (currentQuantity > 1) {
    quantityInput.value = currentQuantity - 1;
    updateTotalPrice(productId, basePrice);
  }
}

function updateTotalPrice(productId, basePrice) {
  let quantityInput = document.getElementById("quantity-" + productId).value;
  let totalPriceElement = document.getElementById("total-price-" + productId);
  let totalPrice = basePrice * quantityInput;
  totalPriceElement.innerHTML = "Price: ₹" + totalPrice;

  document.getElementById("selected-quantity-" + productId).value =
    quantityInput;
}
