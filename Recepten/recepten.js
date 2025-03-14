async function fetchData(ingredients) {
  try {
    const ingredients = document
      .getElementById("ingredients")
      .value.toLowerCase();

    const options = new URLSearchParams();
    options.append("apiKey", "ecba64142f2c4d04a206e6311d8d86b5");
    options.append("ingredients", ingredients);
    options.append("number", "3");
    options.append("ignorePantry", "True");

    console.log(options);
    const response = await fetch(
      `https://api.spoonacular.com/recipes/findByIngredients?${options}`
    );
    if (!response.ok) {
      throw new Error(`Response status: ${response.status}`);
    }

    const json = await response.json();
    console.log(json);
  } catch (error) {
    console.error(error.message);
  }
}
