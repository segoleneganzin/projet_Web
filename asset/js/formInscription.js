// *********************************************inscription nouveau praticien
$(function () {
  $("#button-submit").on("click", function () {

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
            //si mdp valide envoi avec AJAX
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
                    "?action=connexion";
                }
              },
            });
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

// *********************************************inscription nouveau patient
$(function () {
  $("#ajout-patient-submit").on("click", function () {
    let valeurs = {
      nom: $("#nom").val(),
      prenom: $("#prenom").val(),
      date_naissance: $("#date_naissance").val(),
      tel: $("#tel").val(),
      email: $("#email").val(),
      num: $("#num").val(),
      rue: $("#rue").val(),
      cp: $("#cp").val(),
      ville: $("#ville").val(),
    };

    let nom = $("#nom").val();
    let prenom = $("#prenom").val();
    let date_naissance = $("#date_naissance").val();
    let tel = $("#tel").val();
    let email = $("#email").val();
    let num = $("#num").val();
    let rue = $("#rue").val();
    let cp = $("#cp").val();
    let ville = $("#ville").val();
    if (
      nom === "" ||
      prenom === "" ||
      date_naissance === "" ||
      tel === "" ||
      email === "" ||
      num === "" ||
      rue === "" ||
      cp === "" ||
      ville === ""
    ) {
      $("input").each(function () {
        if ($(this).val() == "") {
          $(this).addClass("error");
        } else {
          $(this).removeClass("error");
          $(this).prevAll("span").html("");
        }
      });
    }

    if ($("#email").val() != "") {
      if (validateEmail($("#email").val())) {
        if (
          nom != "" &&
          prenom != "" &&
          date_naissance != "" &&
          tel != "" &&
          email != "" &&
          num != "" &&
          rue != "" &&
          cp != "" &&
          ville != ""
        ) {
          $.ajax({
            type: "POST",
            url: "?action=creation-patient",
            data: valeurs,
            success: function (retour) {
              $("#content").html(retour);
              document.location.href =
                "?action=recherche";
            },
          });
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
  });
});
