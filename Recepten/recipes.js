async function getData(ingredients) {
    try {
      const recepten = document
        .getElementById("recepten")
        .value.toLowerCase();
  
      const query = new URLSearchParams();
      query.append("apiKey", "ecba64142f2c4d04a206e6311d8d86b5");
      query.append("query", recepten);
  
      console.log(query);
      const response = await fetch(
        `https://api.spoonacular.com/recipes/complexSearch?${query}`
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