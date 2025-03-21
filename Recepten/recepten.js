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
    options.append("sort", "random");

    console.log(options);
    const response = await fetch(
      `https://api.spoonacular.com/recipes/findByIngredients?${options}`
    );
    if (!response.ok) {
      throw new Error(`Response status: ${response.status}`);
    }

    const json = await response.json();
    console.log(json);
    for (let i = 0; i < json.length; i++) {
      makeDiv(json, i);
    }
  } catch (error) {
    console.error(error.message);
  }
}

function makeDiv(json, i) {
  var div = document.createElement("div");
  div.setAttribute("id", "i");
  var image = document.createElement("img");
  document.body.append(div);
  div.append(image);
  div.append(json[i].title);
  image.src = json[i].image;
}
