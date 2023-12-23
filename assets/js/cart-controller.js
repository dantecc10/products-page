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
	data[0] = document.getElementsByClassName("data-id")[index].innerText.substring(4);
	data[1] = document.getElementsByClassName("data-name")[index].innerText;
	data[2] = document.getElementsByClassName("data-category")[index].innerText.charAt(11).toLowerCase() + document.getElementsByClassName("data-category")[index].innerText.substring(12);
	data[3] = document.getElementsByClassName("data-price")[index].innerText.substring(1);
	data[4] = document.getElementsByClassName("data-img")[index].src;
	data[5] = document.getElementsByClassName("data-quantity")[index].value;
	data[6] = document.getElementsByClassName("data-stock")[index].value;
	// Subtotal: document.getElementsByClassName("data-subtotal")[index].innerText = ("$" + ((document.getElementsByClassName("data-price")[index].innerText.substring(1))*(document.getElementsByClassName("data-quantity")[index].value)));
	return data;
}

function create_json_data() {
	//var data = article_structure;
	var product_structure = {
		id: 0,
		name: "",
		category: "",
		price: 0,
		img: "",
		quantity: 0,
		stock: 0,
	};

	json_cart = new Object();
	var Products = [];
	n = document.getElementsByClassName("articles-row").length;
	for (i = 0; i < n; i++) {
		data = Object.assign({}, product_structure);
		data.id = get_data(i)[0];
		data.name = get_data(i)[1];
		data.category = get_data(i)[2];
		data.price = get_data(i)[3];
		data.img = get_data(i)[4];
		data.quantity = get_data(i)[5];
		data.stock = get_data(i)[6];
		Products.push(data);
	}
	//Articles.push(data);
	//console.log("JSON creado correctamente.");
	//return data; // No devolver, pues variable ya está en Articles[]
	json_cart = { Products };
	return json_cart;
}

function remove_product(number) {
	document.getElementsByClassName("articles-row")[number].remove();
	n = document.getElementsByClassName("delete-button").length;
	for (let i = 0; i < n; i++) {
		document.getElementsByClassName("delete-button")[i].setAttribute("onclick", "javascript:remove_product(" + i + ");");
	}
	Articles = create_json_data(Articles);
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
			quantity = document.getElementsByClassName(articles_quantity_class)[s].value;

			price = document.getElementsByClassName("data-price")[s].innerHTML;
			price = price.substring(1, price.length);
			subtotal = parseFloat(quantity) * parseFloat(price);
			document.getElementsByClassName(subtotals_price_class)[s].innerText = "$" + subtotal;
		}

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
		document.getElementById(total_articles_target_id).innerHTML = "(" + total + ")";
	} else {
		// Insertar ceros para los datos finales...
		document.getElementById(total_articles_target_id).innerText = "(0)";
		document.getElementById(total_price_target_id).innerText = "$0";
	}
}

function add_article() {
	// Obtener los valores del campo de entrada
	var bar_code_input = document.getElementById("input-barcode").value;
	if (bar_code_input != null && bar_code_input != "" && bar_code_input.length > 8) {
		for (let i = 0; i < document.getElementsByClassName("data-barcode").length; i++) {
			fetch_ajax = true;
			if (document.getElementsByClassName("data-barcode")[i].innerText == bar_code_input) {
				fetch_ajax = false;
				var stock = parseInt(document.getElementsByClassName("data-stock")[i].value);
				var quantity = parseInt(document.getElementsByClassName("data-quantity")[i].value);
				if (quantity < stock) {
					stock = stock + 1;
					document.getElementsByClassName("data-quantity")[i].value = stock;
				} else {
					alert("No hay suficiente stock del artículo ingresado.");
				}
			}
		}
		if (fetch_ajax == true) {
			// Empieza lógica de AJAX y búsqueda
			var objective = document.getElementById("table-products");
			var category = "juguetes";
			n = document.getElementsByClassName("articles-row").length;
			// Crear objeto XMLHttpRequest
			let xhr = new XMLHttpRequest();
			let url = ("../../php scripts/build-table.php?filter=" + bar_code_input + "&table=" + category + "&client=sale&articlen=" + n);
			document.getElementById("input-barcode").value = "";
			xhr.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					// Procesar la respuesta del servidor
					if (this.responseText != null) {
						// La construcción de la tabla no es nula y procede
						objective.innerHTML += this.responseText;
						// Ejecutar función que actualice JSON y muestre totales actualizados
						Articles = create_json_data(Articles);
						calculate_totals();
					} else {
						// La respuesta es nula, interpretar como que no se encontraron datos y avisar vacío
						alert("El código de barra no existe o no está asignado a un producto.");
					}
				}
			};
			xhr.open("GET", url, true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.send();
			// Termina lógica de AJAX y búsqueda
		}
		document.getElementById("input-barcode").value = "";
	}
}

document.getElementById("input-barcode").focus();
calculate_totals();

Articles = create_json_data(Articles);

