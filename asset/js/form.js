$(function () {
  $("#button-submit").on("click", function () {
    // alert("ok");
    // return false;

    // console.log("button click");
    let valeurs = {
      nom: $("#nom").val(),
      prenom: $("#prenom").val(),
      tel: $("#tel").val(),
      email: $("#email").val(),
      num: $("#num").val(),
      rue: $("#rue").val(),
      cp: $("#cp").val(),
      ville: $("#email").val(),
      specialite: $("#specialite").val(),
      description: $("#description").val(),
      mdp: $("#mdp").val(),
    };

    let nom = $("#nom").val();
    let prenom = $("#prenom").val();
    let tel = $("#tel").val();
    let email = $("#email").val();
    let num = $("#num").val();
    let rue = $("#rue").val();
    let cp = $("#cp").val();
    let ville = $("#email").val();
    let specialite = $("#specialite").val();
    let description = $("#description").val();
    let mdp = $("#mdp").val();
    if (
      nom === "" ||
      prenom === "" ||
      tel === "" ||
      email === "" ||
      num === "" ||
      rue === "" ||
      cp === "" ||
      ville === "" ||
      specialite === "" ||
      description === "" ||
      mdp === ""
    ) {
      $("input").each(function () {
        if ($(this).val() == "") {
          console.log("check empty");
          $(this).addClass("error");
        } else {
          $(this).removeClass("error");
          $(this).prevAll("span").html("");
        }
      });
    }
    if (description === "") {
      $("#description").addClass("error");
    } else {
      $("description").removeClass("error");
    }

    if ($("#email").val() != "") {
      console.log("check mail");
      if (validateEmail($("#email").val())) {
        if (
          nom != "" &&
          prenom != "" &&
          tel != "" &&
          email != "" &&
          num != "" &&
          rue != "" &&
          cp != "" &&
          ville != "" &&
          specialite != "" &&
          description != "" &&
          mdp != ""
        ) {
          //test du format du mot de passe
          if (validateMdp(mdp)) {
            $("input").val("");
            $("textarea").val("");
            $.ajax({
              type: "POST",
              url: "?action=inscription",
              data: valeurs,
              success: function (retour) {
                if (retour === "err") {
                  $("#content").html("Erreur de traitement !");
                } else {
                  $("#content").html(retour);
                  document.location.href =
                    "http://localhost/projet_Web/?action=connexion";
                }
              },
            });
            alert("coucou ajax");
          } else {
            $("#mdp").addClass("error");
            alert("Format de mot de passe invalide");
            $("#mdp").val("");
          }
        }
      } else {
        $("#email").addClass("error");
        $("#email").val("Format de mail invalide");
      }
    }
    $("#email").on("click", function () {
      if ($("#email").val() === "Format de mail invalide") {
        $("#email").val("");
      }
    });

    function validateEmail(email) {
      let pattern =
        /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return pattern.test(email);
    }

    function validateMdp(mdp) {
      var regex =
        /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?!.*[<>;'"\\]).{8,}$/;
      return regex.test(mdp);
    }
  });
});
