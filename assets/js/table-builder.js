function build_table(table) {
  // Obtener los valores de los campos de entrada
  let table = "toys";

  let objective = document.getElementById("table-toys");

  // Crear objeto XMLHttpRequest
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // Procesar la respuesta del servidor
      if (this.responseText != null) {
        // La construcción de la tabla no es nula y procede
        objective.innerHTML = this.responseText;
      } else {
        // La respuesta es nula, interpretar como que no se encontraron datos y avisar vacío
      }
    }
  };
  xhr.open("GET", "../../php scripts/build-table.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("table=" + table);
}
function encapsulated_bars_generator(bars, capsule1, capsule2) {
  let objective = document.getElementById("barcode-inner");

  // Crear objeto XMLHttpRequest
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // Procesar la respuesta del servidor
      if (this.responseText != null) {
        // La construcción de la tabla no es nula y procede
        objective.innerHTML = (capsule1 + this.responseText + capsule2);
      } else {
        // La respuesta es nula, interpretar como que no se encontraron datos y avisar vacío
        objective.innerHTML = ("Error fatal en generación de código de barras.");
      }
    }
  };
  xhr.open("GET", "../../php scripts/barcode-generator.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("bars=" + bars);
}