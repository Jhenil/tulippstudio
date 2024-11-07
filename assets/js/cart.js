function increaseQuantity(productId, basePrice, maxQuantity) {
  let quantityInput = document.getElementById("quantity-" + productId);
  let currentQuantity = parseInt(quantityInput.value);

  if (currentQuantity < maxQuantity) {
    quantityInput.value = currentQuantity + 1;
    updateTotalPrice(productId, basePrice);
  } else {
    alert("Sorry, you can't add more. This is the maximum quantity available.");
  }
}

function decreaseQuantity(productId, basePrice) {
  let quantityInput = document.getElementById("quantity-" + productId);
  let currentQuantity = parseInt(quantityInput.value);

  if (currentQuantity > 1) {
    quantityInput.value = currentQuantity - 1;
    updateTotalPrice(productId, basePrice);
  } else {
    if (confirm("Remove this item from the cart?")) {
      document.getElementById("selected-quantity-" + productId).value = 0;
      document.getElementById("form-" + productId).submit();
    }
  }
}

function updateTotalPrice(productId, basePrice) {
  let quantityInput = document.getElementById("quantity-" + productId).value;
  let totalPriceElement = document.getElementById("price-" + productId);

  let totalPrice = basePrice * quantityInput;
  totalPriceElement.innerHTML = "Price: ₹" + totalPrice;

  document.getElementById("selected-quantity-" + productId).value =
    quantityInput;

  document.getElementById("form-" + productId).submit();
}

function removeItem(productId) {
  if (confirm("Remove this item from the cart?")) {
    document.getElementById("selected-quantity-" + productId).value = 0;
    document.getElementById("form-" + productId).submit();
  }
}
