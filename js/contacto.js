$(document).ready(function() {
    $("#contact-form").validate({
      rules: {
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
        },
        subject: {
            required: true,
            minlength: 50
        },
        newsletter: {
            required: false
        }
      },
      messages : {
        fname: {
            required: "Rellene el campo",
            minlength: "El nombre debería tener al menos 3 caracteres"
        },
        lname: {
            required: "Rellene el campo",
            minlength: "El nombre debería tener al menos 3 caracteres"
        },
        email: {
          email: "El formato del email debe ser example@email.com"
        },
        subject: {
            minlength: "La longitud del texto debe ser mínimo 50 caracteres"
        }
      }
    });
  });