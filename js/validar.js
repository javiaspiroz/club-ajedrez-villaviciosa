$(document).ready(function() {
    $("#basic-form").validate({
      rules: {
        username: {
          required: true,
          minlength: 3
        },
        pasword: {
          required: true,
          minlength: 3
        },
        fname : {
          required: true,
          minlength: 3
        },
        lname : {
          required: true,
          minlength: 3
        },
        email: {
          required: true,
          email: true
        }
      },
      messages : {
        username: {
          required: "Usuario es un valor requerido",
          minlength: "El usuario debería tener al menos 3 caracteres"
        },
        pasword: {
          required: "Contraseña es un valor requerido",
          minlength: "La contraseña debería tener al menos 3 caracteres"
        },
          fname: {
          required: "Nombre es un valor requerido",
          minlength: "El nombre debería tener al menos 3 caracteres"
        },
        lname: {
          required: "Apellido es un valor requerido",
          minlength: "El apellido debería tener al menos 3 caracteres"
        },
        email: {
          required: "Email es un valor requerido",
          email: "El formato del email debe ser abc@domain.tld"
        }
      }
    });
  });