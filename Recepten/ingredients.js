async function fetchData() {
  try {
    const ingredients = document
      .getElementById("ingredients")
      .value.toLowerCase();
    const number = document
      .getElementById("Ingrediënten-hoeveelheid")
      .value.toLowerCase();

    const options = new URLSearchParams();
    options.append("apiKey", "ecba64142f2c4d04a206e6311d8d86b5");
    options.append("ingredients", ingredients);
    options.append("number", number);
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
    for (let i = 0; i < json.length; i++) {
      makeDiv(json, i);
    }
  } catch (error) {
    console.error(error.message);
  }
}

function makeDiv(json, i) {
  const div = document.createElement("div");
  div.setAttribute("id", "receptFoto");
  const image = document.createElement("img");
  const title = document.createElement("p");
  document.getElementById("recept-foto").append(div);
  div.append(image);
  div.append(title);
  console.log(json);
  title.append(json[i].title);
  image.src = json[i].image;
}
