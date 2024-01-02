var myData; // Declara la variable fuera de la función de devolución de llamada
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
	send_json_to_server(json_cart);
	return json_cart;
}

function remove_product(number) {
	document.getElementsByClassName("articles-row")[number].remove();
	n = document.getElementsByClassName("delete-button").length;
	for (let i = 0; i < n; i++) {
		document.getElementsByClassName("delete-button")[i].setAttribute("onclick", "javascript:remove_product(" + i + ");");
	}
	calculate_totals();
	Articles = create_json_data();
	send_json_to_server(Articles);
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
	Articles = create_json_data();
	send_json_to_server(Articles);
}

function add_article() {
	var bar_code_input = document.getElementById("input-barcode").value;

	if (bar_code_input != null && bar_code_input != "" && bar_code_input.length > 8) {
		var foundDuplicate = false;

		for (let i = 0; i < document.getElementsByClassName("data-barcode").length; i++) {
			if (document.getElementsByClassName("data-barcode")[i].innerText == bar_code_input) {
				foundDuplicate = true;
				var stock = parseInt(document.getElementsByClassName("data-stock")[i].value);
				var quantity = parseInt(document.getElementsByClassName("data-quantity")[i].value);

				if (quantity < stock) {
					quantity += 1; // Incrementar la cantidad
					document.getElementsByClassName("data-quantity")[i].value = quantity;
				} else {
					alert("No hay suficiente stock del artículo ingresado.");
				}
				break; // Salir del bucle una vez encontrado el artículo
			}
		}

		if (!foundDuplicate) {
			// Realizar la lógica de AJAX y búsqueda
			var objective = document.getElementById("table-products");
			var category = "juguetes";
			n = document.getElementsByClassName("articles-row").length;

			let xhr = new XMLHttpRequest();
			let url = ("../../php scripts/build-table.php?filter=" + bar_code_input + "&table=" + category + "&client=sale&articlen=" + n);

			document.getElementById("input-barcode").value = "";

			xhr.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					if (this.responseText != null) {
						objective.innerHTML += this.responseText;
						Articles = create_json_data();
						calculate_totals();
					} else {
						alert("El código de barra no existe o no está asignado a un producto.");
					}
				}
			};

			xhr.open("GET", url, true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.send();
		}

		document.getElementById("input-barcode").value = "";
	}
	Articles = create_json_data();
	send_json_to_server(Articles);
}


document.getElementById("input-barcode").focus();
calculate_totals();

Articles = create_json_data();

function send_json_to_server(json_data) {
	// Convertir el objeto JSON a una cadena JSON
	var json_string = JSON.stringify(json_data);

	// Crear una solicitud AJAX
	var xmlhttp = new XMLHttpRequest();

	// Especificar el método y la URL del archivo PHP receptor
	xmlhttp.open("POST", "../../php scripts/json-cart-receiver.php", true);

	// Configurar el encabezado para indicar que se enviará un JSON
	xmlhttp.setRequestHeader("Content-Type", "application/json");

	// Función que se ejecuta al recibir la respuesta del servidor
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			// Manejar la respuesta del servidor si es necesario
			console.log(this.responseText);
		}
	};

	// Enviar la cadena JSON al archivo PHP
	xmlhttp.send(json_string);
}
/*function get_json_from_server() {
	// Convertir el objeto JSON a una cadena JSON
	var server_json_data;

	// Crear una solicitud AJAX
	var xmlhttp = new XMLHttpRequest();

	// Especificar el método y la URL del archivo PHP receptor
	url = ("../../php scripts/json-cart-receiver.php?send=true");
	xmlhttp.open("GET", url, true);

	// Configurar el encabezado para indicar que se enviará un JSON
	xmlhttp.setRequestHeader("Content-Type", "application/json");

	// Función que se ejecuta al recibir la respuesta del servidor
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			// Manejar la respuesta del servidor si es necesario
			server_json_data = JSON.parse(this.responseText);
			// calculate_totals();
			return server_json_data;
		}
	};
	// Enviar la cadena JSON al archivo PHP
	xmlhttp.send();
}*/

function get_json_from_server(callback) {
	var xmlhttp = new XMLHttpRequest();
	var server_json_data;

	var url = "../../php scripts/json-cart-receiver.php?send=true";
	xmlhttp.open("GET", url, true);
	xmlhttp.setRequestHeader("Content-Type", "application/json");

	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			server_json_data = JSON.parse(this.responseText);
			callback(server_json_data); // Llamar a la función de devolución de llamada con los datos
		}
	};
	xmlhttp.send();
}

get_json_from_server(function (data) {
	myData = data; // Asigna la respuesta JSON a la variable externa
});

function json_updater(receiver, sender) {
	get_json_from_server(function (data) {
		sender = data; // Asigna la respuesta JSON a la variable externa
	});
	receiver = sender;
	return receiver;
}

document.getElementById('sale-form').addEventListener('submit', function (event) {
	var paymentMethod = document.getElementById('payment-method-select').value;
	if (paymentMethod === '') {
		event.preventDefault(); // Detiene el envío del formulario si no se seleccionó una opción
		alert('Por favor, seleccione un método de pago.');
	}
	if ((document.getElementById('digital-ticket').checked) && ((document.getElementById('customer-email-input').value) == "")) {
		event.preventDefault(); // Detiene el envío del formulario si no se seleccionó una opción
		alert('Por favor, indique un correo Gmail para enviar el ticket de compra. Recuérdele al cliente revisar su bandeja de spam para buscar el ticket.');
	}
});

function digital_ticket_is_on() {
	if (document.getElementById('digital-ticket').checked) {
		document.getElementById('customer-email-input').classList.remove("visually-hidden");
		document.getElementById('customer-email-input').disabled = false;
	} else {
		document.getElementById('customer-email-input').classList.add("visually-hidden");
		document.getElementById('customer-email-input').disabled = true;
		document.getElementById('customer-email-input').value = "";
	}
}

function products_dom_builder() {

	var xhr = new XMLHttpRequest(); // Crear objeto XMLHttpRequest

	// Configurar la solicitud
	xhr.open('GET', '../php scripts/cart-loader.php', true); // Ruta a tu archivo PHP

	// Manejar el evento de carga
	xhr.onload = function () {
		if (xhr.status === 200) {
			// Mostrar la respuesta en un elemento HTML con id "respuesta"
			document.getElementById('table-products').innerHTML = xhr.responseText;
		} else {
			// Manejar errores si la solicitud falla
			console.error('Error al realizar la solicitud: ' + xhr.status);
		}
	};

	// Manejar errores de red
	xhr.onerror = function () {
		console.error('Error de red al realizar la solicitud');
	};

	// Enviar la solicitud
	xhr.send();
}

products_dom_builder();
calculate_totals();
json_updater(Articles, myData);
send_json_to_server(Articles);