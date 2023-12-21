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

function add_article() {
  var added_article = Object.create(article_structure);
  // Llenando información:

  Articles.push(added_article);
}

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

function create_json_data() {
  var data = article_structure;
  var n = document.getElementsByClassName("articles-row").length;

  for (let index = Articles.length; index > 0; index--) {
    Articles.pop();
  }

  for (var i = 0; i < n; i++) {
    data_array = get_data(i);
    data.id = data_array[0];
    data.name = data_array[1];
    data.category = data_array[2];
    data.price = data_array[3];
    data.img = data_array[4];
    data.quantity = data_array[5];
    data.stock = data_array[6];
    Articles.push(data);
  }
  //console.log("JSON creado correctamente.");
  //return data; // No devolver, pues variable ya está en Articles[]
}

function remove_product(number) {
  document.getElementsByClassName("articles-row")[number].remove();
  Articles.splice(number, 1);
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

document.getElementById("input-barcode").focus();
