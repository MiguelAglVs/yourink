const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll("#formulario input");
const expresiones = {
  nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  apellido: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  ciudad: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  numero: /^[0-9\s?-]{10,13}$/, // 10 a 13 numeros.
  codigop: /^[0-9]{5,13}$/, // 5 a 13 numeros.
  direccion: /^[a-zA-ZÀ-ÿ]+\s?[0-9]+\s?[a-zA-Z]?\s?\#\s?[0-9a-zA-Z-\s?]+/, // 7 a 14 numeros.
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "nombre":
		validarCampo (expresiones.nombre, e.target, 'nombre');
		break;
		case "apellido":
		validarCampo (expresiones.apellido, e.target, 'apellido');
		break;
		case "correo":
		validarCampo (expresiones.correo, e.target, 'correo');
		break;
		case "direccion":
		validarCampo (expresiones.direccion, e.target, 'direccion');
		break;
		case "ciudad":
		validarCampo (expresiones.ciudad, e.target, 'ciudad');
		break;
		case "codigop":
		validarCampo (expresiones.codigop, e.target, 'codigop');
		break;
		case "numero":
		validarCampo (expresiones.numero, e.target, 'numero');
      break;
  }
};

const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.getElementById(`${campo}`).classList.remove("is-invalid");
    document.getElementById(`${campo}`).classList.add("is-valid");
  } else {
    document.getElementById(`${campo}`).classList.add("is-invalid");
  }
};

inputs.forEach((input) => {
  input.addEventListener("keyup", validarFormulario);
  input.addEventListener("blur", validarFormulario);
});
