# Anti-FoodWaste App

## Probleem

We willen graag ons steentje bijdragen tegen voedselverspilling. We verspillen in Vlaanderen ongeveer 195 kg/inwoner[^1]. We willen dit tegengaan door meer bewust om te gaan met wat we al in de frigo hebben zitten, zodat we dit niet onnodig moeten weggooien. Onze oplossing bestaat uit een app die meerdere facetten heeft die elk helpen bij het verminderen van voedselverspilling en het efficiënter omgaan met het voedsel in de koelkast.

## Bijhouden van vervaldata

We willen dat er minder voedsel wordt weggegooid omdat het bijvoorbeeld vervallen is. Om dit te doen, moeten we in de eerste plaats voorkomen dat producten vervallen. Dit willen we doen door een notificatiesysteem in onze app te integreren dat een melding geeft wanneer een product bijna vervalt. We willen ook graag in onze app aangeven hoeveel tijd er nog zit tussen nu en het tijdstip dat een product vervalt. Dit zou al helpen met het inschatten wanneer een product opgegeten moet worden. We willen dit doen door een database van producten bij te houden. We willen dat onze gebruiker dit kan invoeren op drie mogelijke manieren: via de naam van het product op te zoeken, via de barcode in te geven en via de camera van de smartphone om de barcode te scannen.

## Het automatisch genereren van mogelijke recepten

Nu we een timer hebben wanneer ons voedsel vervalt, willen we natuurlijk ook dat we het kunnen consumeren. Vandaar dat het genereren van recepten met dit voedsel handig is. Het zorgt ervoor dat we deze artikelen ook sneller gaan gebruiken in ons eten, zodat deze vóór de vervaldatum opgeraken. We willen dit doen aan de hand van onze database van producten en van bestaande recept-API's[^2].

## Het automatisch maken van boodschappenlijstjes

We hebben het allemaal al wel eens voorgehad. Je staat in de winkel en je wilt een product kopen, maar je twijfelt of je dit nog thuis hebt. Je koopt het toch om zeker te zijn, en je komt thuis met de realisatie dat je het wel degelijk nog had. Je hebt bijgevolg dus te veel van het product en moet hier één van weggooien. Om dit tegen te gaan, willen we een boodschappenlijstjesmaker in onze app integreren die je er automatisch van op de hoogte stelt of je het product al in huis hebt en hoe lang het nog houdbaar is. Zo maak je boodschappenlijstjes voor producten die je echt nodig hebt en koop je niets overbodigs.

## Het maken van een weekmenu

Planning is alles, ook met voedsel. Door al onze informatie samen te voegen van bovenstaande functies, kunnen we een weekplanner in onze app integreren waarbij we recepten op verschillende dagen kunnen zetten. Hierdoor kunnen we automatisch slimme boodschappenlijstjes genereren voor elke dag. Het zou de bedoeling zijn dat men aan het begin van de week alles uitplant en dan de rest van de week gewoon de app moet opendoen en kijken wat men nog moet kopen. De app zorgt ervoor dat alles in huis is voor elk recept dat je gekozen hebt.



[^1]: _Monitor voedselverlies 2020_. (z.d.). Vlaanderen. https://www.vlaanderen.be/publicaties/monitor-voedselverlies-2020
[^2]: _A Recipe API with 2 Mllion Recipes - Recipe Search API - Edamam_. (z.d.). https://developer.edamam.com/edamam-recipe-api
[^2]: https://spoonacular.com/food-api/pricing

--- 
# Schematische weergave
![Pasted image 20241212143101](https://github.com/user-attachments/assets/1d0c3de3-eebd-4f22-a798-b20d073c5a01)
---
# Budget inschatting

- Eventueel recepten API kosten 
	- Maandelijks ongeveer 9 euro 
	- Open source is gratis (nog zoeken)
- Server kosten voor databases
	- Eigen NAS is gratis
- SQL server kosten
---
# Verdeling taken

| Lander    | Dries                           | Maarten        |
| --------- | ------------------------------- | -------------- |
| Input     | automatisch boodschappenlijstje | API integratie |
| Database  | Weekmenu                        | Login          |
| Front-end | Front-end                       | (front-end)    |
