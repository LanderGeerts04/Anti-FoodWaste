async function getData() {
  try {
    const recepten = document.getElementById("recepten").value.toLowerCase();
    const number = document
      .getElementById("recept-hoeveelheid")
      .value.toLowerCase();
    const randomNum = Math.floor(Math.random() * 30) + 1;
    const check = document.getElementById("ingredienten");

    const query = new URLSearchParams();
    query.append("apiKey", "ecba64142f2c4d04a206e6311d8d86b5");
    query.append("query", recepten);
    query.append("number", number);
    query.append("fillIngredients", "True");
    query.append("offset", randomNum);
    if (check.checked === true) {
      const ingredient = document
        .getElementById("ingredient-input")
        .value.toLowerCase();
      query.append("includeIngredients", ingredient);
    }

    console.log(query);
    const response = await fetch(
      `https://api.spoonacular.com/recipes/complexSearch?${query}`
    );
    if (!response.ok) {
      throw new Error(`Response status: ${response.status}`);
    }

    const json = await response.json();
    console.log(json);
    for (let i = 0; i < json.results.length; i++) {
      showRecipe(json, i);
    }
  } catch (error) {
    console.error(error.message);
  }
}

function showRecipe(json, i) {
  const div = document.createElement("div");
  div.setAttribute("class", "receptFoto");
  div.setAttribute("onclick", `sendData(${i})`);
  const image = document.createElement("img");
  image.setAttribute("id", "img" + i);
  const title = document.createElement("p");
  title.setAttribute("id", "title" + i);

  document.getElementById("recept-foto").append(div);

  div.append(image);
  div.append(title);
  title.append(json.results[i].title);
  image.src = json.results[i].image;
}
