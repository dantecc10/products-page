var Articles = [];
var article_structure = {
  id: 0,
  name: "",
  category: "",
  price: 0,
  img: "",
  quantity: 0,
  stock: 0,
};

function get_data(index) {
  var data = [];
  data[0] = document
    .getElementsByClassName("data-id")
    [index].innerText.substring(4);
  data[1] = document.getElementsByClassName("data-name")[index].innerText;
  data[2] =
    document
      .getElementsByClassName("data-category")
      [index].innerText.charAt(11)
      .toLowerCase() +
    document
      .getElementsByClassName("data-category")
      [index].innerText.substring(12);
  data[3] = document
    .getElementsByClassName("data-price")
    [index].innerText.substring(1);
  data[4] = document.getElementsByClassName("data-img")[index].src;
  data[5] = document.getElementsByClassName("data-quantity")[index].value;
  data[6] = document.getElementsByClassName("data-stock")[index].value;
  // Subtotal: document.getElementsByClassName("data-subtotal")[index].innerText = ("$" + ((document.getElementsByClassName("data-price")[index].innerText.substring(1))*(document.getElementsByClassName("data-quantity")[index].value)));
  return data;
}

function create_json_data(Articles) {
  //var data = article_structure;
  var n = document.getElementsByClassName("articles-row").length;
  
  Articles = [];
  
  for (var i = 0; i < n; i++) {
    var data = get_data(i);
    Articles[i] = article_structure;
    Articles[i].id = data[0];
    Articles[i].name = data[1];
    Articles[i].category = data[2];
    Articles[i].price = data[3];
    Articles[i].img = data[4];
    Articles[i].quantity = data[5];
    Articles[i].stock = data[6];
  }
  //Articles.push(data);
  //console.log("JSON creado correctamente.");
  //return data; // No devolver, pues variable ya está en Articles[]
  return Articles;
}

function remove_product(number) {
  document.getElementsByClassName("articles-row")[number].remove();
  n = document.getElementsByClassName("delete-button").length;
  for (let i = 0; i < n; i++) {
    document
      .getElementsByClassName("delete-button")
      [i].setAttribute("onclick", "javascript:remove_product(" + i + ");");
  }
  create_json_data();
  calculate_totals();
}

function send_json_to_server(json_data) {
  // Suponiendo que tienes la variable Articles con la información de los artículos

  // Convertir Articles a formato JSON
  var articlesJSON = JSON.stringify(json_data);

  // Hacer la petición AJAX
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../../php scripts/save_cart.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Petición completada
      console.log("Artículos guardados en la sesión");
    }
  };
  xhr.send(articlesJSON);
}

function calculate_totals() {
  // Función para calcular totales de venta (artículos e importe)
  const total_price_target_id = "total-container";
  const subtotals_price_class = "subtotal-container";

  const total_articles_target_id = "total-articles-container";
  const articles_quantity_class = "quantity-input";

  n = document.getElementsByClassName("articles-row").length;
  if (n > 0) {
    n = document.getElementsByClassName(subtotals_price_class).length;
    for (let s = 0; s < n; s++) {
      quantity = document.getElementsByClassName(articles_quantity_class)[s]
        .value;

      price = document.getElementsByClassName("data-price")[s].innerHTML;
      price = price.substring(1, price.length);
      subtotal = parseFloat(quantity) * parseFloat(price);
      document.getElementsByClassName(subtotals_price_class)[s].innerText =
        "$" + subtotal;
    }

    var total = 0;
    for (let i = 0; i < n; i++) {
      // console.log("Suma = " + total); // Debug line
      valor = document.getElementsByClassName(subtotals_price_class)[i]
        .outerText;
      valor = valor.substring(1, valor.length);
      total = total + parseFloat(valor);
    }
    // Insertar cambio en el DOM (precio total)
    document.getElementById(total_price_target_id).innerHTML = "$" + total;

    n = document.getElementsByClassName(articles_quantity_class).length;
    var total = 0;
    for (let i = 0; i < n; i++) {
      // console.log("Artículos = " + total); // Debug line
      valor = document.getElementsByClassName(articles_quantity_class)[i].value;
      total = total + parseFloat(valor);
    }
    // Insertar cambio en el DOM (artículos totales)
    document.getElementById(total_articles_target_id).innerHTML =
      "(" + total + ")";
  } else {
    // Insertar ceros para los datos finales...
    document.getElementById(total_articles_target_id).innerText = "(0)";
    document.getElementById(total_price_target_id).innerText = "$0";
  }
}

function add_article() {
  // Obtener los valores del campo de entrada
  var bar_code_input = document.getElementById("input-barcode").value;
  if (
    bar_code_input != null &&
    bar_code_input != "" &&
    bar_code_input.length > 8
  ) {
    var objective = document.getElementById("table-products");
    var category = "juguetes";
    n = document.getElementsByClassName("articles-row").length;
    // Crear objeto XMLHttpRequest
    let xhr = new XMLHttpRequest();
    let url =
      "../../php scripts/build-table.php?filter=" +
      bar_code_input +
      "&table=" +
      category +
      "&client=sale&articlen=" +
      n;
    document.getElementById("input-barcode").value = "";
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // Procesar la respuesta del servidor
        if (this.responseText != null) {
          // La construcción de la tabla no es nula y procede
          objective.innerHTML += this.responseText;
          // Ejecutar función que actualice JSON y muestre totales actualizados
          create_json_data();
          calculate_totals();
        } else {
          // La respuesta es nula, interpretar como que no se encontraron datos y avisar vacío
        }
      }
    };
    xhr.open("GET", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();
  }
}

document.getElementById("input-barcode").focus();
calculate_totals();
