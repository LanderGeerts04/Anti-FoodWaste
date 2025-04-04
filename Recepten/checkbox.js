function checkBox() {
  const checkbox = document.getElementById("ingredienten");
  const input = document.getElementById("ingredient-input");

  if (checkbox.checked === true) {
    input.disabled = false;
  } else {
    input.disabled = true;
  }
}
