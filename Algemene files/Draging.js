function allowDrop(ev) {
    ev.preventDefault();
  }
  
function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}
  
function drop(ev) {
  ev.preventDefault();
}