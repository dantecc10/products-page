//var Artículos = new Object;
/*Artículos = {
    "id": 5,
    "name": 'Silla de ruedas',
    "description": 'Aquí iría la descripción.',
    "category": 'furniture', //equivale a la tabla de la base de datos
    "price": 150,
    "img": '',
    "quantity": 2,
    "stock": 7
}*/

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
  added_article.id = 2; // Datos de ejemplo
  added_article.name = "OPPO Reno 7"; // Datos de ejemplo
  added_article.description =
    "Potente celular con 8GB de RAM y procesador de 8 núcleos"; // Datos de ejemplo
  added_article.category = "Telefonía"; // Datos de ejemplo
  added_article.price = 3500; // Datos de ejemplo
  added_article.img =
    "https://chedrauimx.vtexassets.com/arquivos/ids/23484026-800-auto?v=638379275907530000&width=800&height=auto&aspect=true"; // Datos de ejemplo
  added_article.quantity = 1; // Datos de ejemplo
  added_article.stock = 3; // Datos de ejemplo

  Articles.push(added_article);
}

add_article();
