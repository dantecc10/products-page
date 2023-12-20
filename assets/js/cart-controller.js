var article_structure = {
    id: 0,
    name: "",
    description: "",
    category: "",
    price: 0,
    img: "",
    quantity: 0,
    stock: 0,
  };

var Articles = [];

function add_article() {
  var added_article = Object.create(article_structure);
  // Llenando información:
  Articles.push(added_article);
}

function create_json_data() {
  var data = {};
  var n = document.getElementsByClassName("articles-row").length;
  for (var i = 0; i < n; i++) {
    
    img = document.getElementsByClassName("mini-image")[i].src;
  }
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
