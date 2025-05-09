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
  let NumberOfMissedIngredients = json.results[i].missedIngredientCount;

  const div = document.createElement("div");
  div.setAttribute("class", "receptFoto");
  div.setAttribute(
    "onclick",
    `sendData(${i})` //${MissingIngredients},
  );
  const image = document.createElement("img");
  image.setAttribute("id", "img" + i);
  const title = document.createElement("p");
  title.setAttribute("id", "title" + i);
  const data = document.createElement("div");
  data.setAttribute("id", "hidden");
  document.getElementById("recept-foto").append(div);

  div.append(image);
  div.append(title);
  div.append(data);
  title.append(json.results[i].title);
  image.src = json.results[i].image;

  for (let k = 0; k < NumberOfMissedIngredients; k++) {
    const MissingIngredientsDiv = document.createElement("div");
    data.append(MissingIngredientsDiv);
    MissingIngredientsDiv.setAttribute("id", "missing" + k);

    const MissingIngredientsName = document.createElement("p");
    document.getElementById("missing" + k).append(MissingIngredientsName);
    MissingIngredientsName.setAttribute("id", "name" + k);
    document
      .getElementById("name" + k)
      .append(json.results[i].missedIngredients[k].name);

    const MissingIngredientsAmount = document.createElement("p");
    document.getElementById("missing" + k).append(MissingIngredientsAmount);
    MissingIngredientsAmount.setAttribute("id", "amount" + k);
    document
      .getElementById("amount" + k)
      .append(json.results[i].missedIngredients[k].amount);

    const MissingIngredientsUnit = document.createElement("p");
    document.getElementById("missing" + k).append(MissingIngredientsUnit);
    MissingIngredientsUnit.setAttribute("id", "unit" + k);
    document
      .getElementById("unit" + k)
      .append(json.results[i].missedIngredients[k].unit);
  }
}

function sendData(number) {
  let text = document.getElementById("title" + number).innerHTML;
  let url = document.getElementById("img" + number).src;
  let DBdata = { title: text, image: url };
  DBdata = Object.assign({ ing: "kaas" }, DBdata);
  console.log(DBdata);

  fetch("databaseAdd.php", {
    method: "POST",
    headers: {
      "Content-type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(DBdata),
  });
}
