function checkBox() {
  const checkbox = document.getElementById("ingredienten");
  const input = document.getElementById("ingredient-input");

  if (checkbox.checked === true) {
    input.disabled = false;
  } else {
    input.disabled = true;
  }
}

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
  data.setAttribute("class", "hidden");
  data.setAttribute("id", "hidden" + i);
  document.getElementById("recept-foto").append(div);

  div.append(image);
  div.append(title);

  div.append(data);
  title.append(json.results[i].title);
  image.src = json.results[i].image;

  for (let k = 0; k < NumberOfMissedIngredients; k++) {
    const MissingIngredientsDiv = document.createElement("div");
    document.getElementById("hidden" + i).append(MissingIngredientsDiv);
    MissingIngredientsDiv.setAttribute("id", "missing" + i + k);

    const MissingIngredientsName = document.createElement("p");
    document.getElementById("missing" + i + k).append(MissingIngredientsName);
    MissingIngredientsName.setAttribute("id", "name" + i + k);
    document
      .getElementById("name" + i + k)
      .append(json.results[i].missedIngredients[k].name);

    const MissingIngredientsAmount = document.createElement("p");
    document.getElementById("missing" + i + k).append(MissingIngredientsAmount);
    MissingIngredientsAmount.setAttribute("id", "amount" + i + k);
    document
      .getElementById("amount" + i + k)
      .append(json.results[i].missedIngredients[k].amount);

    const MissingIngredientsUnit = document.createElement("p");
    document.getElementById("missing" + i + k).append(MissingIngredientsUnit);
    MissingIngredientsUnit.setAttribute("id", "unit" + i + k);
    document
      .getElementById("unit" + i + k)
      .append(json.results[i].missedIngredients[k].unit);
  }

  let missingbutton = document.createElement("button");
  missingbutton.innerHTML = "add missing";
  missingbutton.setAttribute(
    "onclick",
    `getMissing(${i},${NumberOfMissedIngredients})`
  );
  div.append(missingbutton);
}

function sendData(number) {
  let text = document.getElementById("title" + number).innerHTML;
  let url = document.getElementById("img" + number).src;
  let DBdata = { title: text, image: url };

  console.log(DBdata);

  fetch("databaseAdd.php", {
    method: "POST",
    headers: {
      "Content-type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(DBdata),
  });
}

function getMissing(number, NumberOfMissedIngredients) {
  for (let k = 0; k < NumberOfMissedIngredients; k++) {
    let name = document.getElementById("name" + number + k).innerHTML;
    let amount = document.getElementById("amount" + number + k).innerHTML;
    let unit = document.getElementById("unit" + number + k).innerHTML;
    sendMissing(name, amount, unit);
  }
}
function sendMissing(name, amount, unit) {
  let missingData = { name: name, amount: amount, unit: unit };
  console.log(missingData);

   fetch("AddMissing.php", {
    method: "POST",
    headers: {
      "Content-type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(missingData),
  }); 
}
