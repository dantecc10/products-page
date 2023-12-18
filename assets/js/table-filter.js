function table_filter() {
  const search_text = document.getElementById("filtering_input").value;
  // Obtener los valores de los campos de entrada
  //let table = "juguetes";
  if (search_text != "" && search_text != null && search_text != " ") {
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
    xhr.open("GET", "php scripts/build-table.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("filter=" + search_text);
  }
}

/*
function build_table() {
  // Obtener los valores de los campos de entrada
  let table = "juguetes";

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
  xhr.open("GET", "php scripts/build-table.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("table=" + table);
}
build_table();
*/