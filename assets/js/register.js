$(function () {
  //Requete Ajax inscription
  $("#btnRegister").on("click", function () {
    var login = $("#login").val();
    var password = $("#password").val();
    if (login != "") {
      if (password != "") {
        if (validateEmail(login) == true) {
          $.ajax({
            url: "controler/register.php",
            type: "POST",
            async: true,
            data: {
              login: login,
              password: password,
            },
            crossDomain: true,
            dataType: "json",
            timeout: 2000,
            cache: false,
          })
            .done(function (returnData) {
              response = returnData;
              if (response.type == "Success") {
                var elem = document.getElementsByClassName("elem");
                elem.innerHTML = response.data;
                alert("inscription réussie ");
                document.location.href = response.url;
              } else {
                var elem = document.getElementById("elem");
                elem.innerHTML = response.type + " " + response.data;
                alert(response.type);
              }
            })
            .fail(function (error) {
              var elem = document.getElementById("elem");
              elem.innerHTML = "Un compte existe deja avec cette adresse email";
              console.error(error);
            });
        } else {
          var elem = document.getElementById("elem");
          elem.innerHTML = "Veuillez renseigner une adresse email valide !";
        }
      } else {
        var elem = document.getElementById("elem");
        elem.innerHTML = "Le champs ne peut être vide";
      }
    } else {
      var elem = document.getElementById("elem");
      elem.innerHTML = "Le champs ne peut être vide";
    }
  });
});
