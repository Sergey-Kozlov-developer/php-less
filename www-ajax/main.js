const form = document.getElementById("contactForm");
const success = document.getElementById("success");
const error = document.getElementById("error");
const errorsHolder = document.getElementById("errorsHolder");

form.addEventListener("submit", function (event) {
	event.preventDefault();
	console.log("SUBMIT!");
	success.hidden = true;
	error.hidden = true;
	errorsHolder.innerHTML = "";

	// собираем данные из формы with jQuery
	const formData = $(this).serialize();

	console.log(decodeURI(formData));

	jQuery
		.ajax({
			method: "POST",
			url: "http://localhost:443/mail.php",
			data: formData,
		})
		.done(function (msg) {
			console.log("Сработает в случае успеха");
			console.log(msg); // JSON string
			// получаем json из бэка
			msg = JSON.parse(msg); // JSON Object

			if (msg.status) {
				// УСПЕХ
				success.hidden = false;
				form.reset();
			} else {
				// ОШИБКА
				if (Array.isArray(msg.message)) {
					// распечатываем ошибки по одному
					console.log(msg.message);
					msg.message.forEach((item) => {
						const html = `
						<div hidden id="error" class="alert alert-danger" role="alert">${item}</div>`;
						errorsHolder.insertAdjacentHTML("beforeend", html);
					});
				} else {
					// произошла ошибка при отправке
					error.hidden = false;
				}
			}
		});
});
