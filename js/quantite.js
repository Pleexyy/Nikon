var count = 1;

function plus(id) {
     var value = parseInt(document.getElementById(id).value, 10);
     value = isNaN(value) ? 0 : value;
     if (value < 10) {
          value++;
          document.getElementById(id).value = value;
     }
}
function minus(id) {
     var value = parseInt(document.getElementById(id).value, 10);
     // si valeur est bien un nombre
     value = isNaN(value) ? 0 : value;
     if (value > 1) {
          value--;
          document.getElementById(id).value = value;
     }
}