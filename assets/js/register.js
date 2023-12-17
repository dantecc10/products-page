function calculate_totals() {
  const total_price_target_id = "total-container";
  const subtotals_price_class = "subtotal-container";

  const total_articles_target_id = "total-articles-container";
  const articles_quantity_class = "quantity-input";

  n = document.getElementsByClassName(subtotals_price_class).length;
  var total = 0;
  for (let i = 0; i < n; i++) {
    // console.log("Suma = " + total); // Debug line
    valor = document.getElementsByClassName(subtotals_price_class)[i].outerText;
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
}


Venta = new Object = {
    Artículos,
    Total
}
  /*
  Artículos[]
    ID
    Precio
    Cantidad
    IMG
    Subtotal
  Total
  */

  data = {
    "Venta": {
      "Artículos": [
        {
          "ID": {},
          "Precio": {},
          "Cantidad": {},
          "IMG": {},
          "Subtotal": {}
        }
      ],
      "Total": {}
    }
  };


  Venta = new Object;
  Venta = {
      "Artículos": [
        {
          "ID": {},
          "Precio": {},
          "Cantidad": {},
          "IMG": {},
          "Subtotal": {}
        }
      ],
      "Total": {}
  };