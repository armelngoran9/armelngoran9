
document.querySelector('form').addEventListener( 'submit', function(e){
    var error = false;
    var form = document.querySelector('form');

    //Chosing the fields to target depending on the form

    var fields = [];
    
    if(form.className == "groupe-form" || form.className == "updGroupe-form")
    {
       fields = ["nomGroupe", "nomRespo", "nomTreso"];
    }

    else if(form.className == "adherent-form"){
       fields = ["nom","prenoms", "contact"];
    }
    
    else if(form.className == "updAdherent-form")
    {
      fields = ["nom","prenoms", "contact", "idParrain"];
    }

    else if(form.className == "rubrique-form" || form.className == "updRubrique-form")
    {
       fields = ["nomRubrique"];
    }

    else if(form.className == "versement-form")
    {
       fields = ["nomRubrique", "montant", "idProprietaire"];
    }

    fields.forEach((fieldId) =>
    {
      if (isFieldEmpty(fieldId))
      {
        addError(fieldId);
        error = true;
      }
      else{
        removeError(fieldId);
      }
    });

    if(form.className == 'adherent-form'){
      var contact = document.querySelector("#contact");
      var contact_err = document.querySelector("#contact ~ .error");

      //if Not integer
      if(!( contact.value %1 === 0))
      {

        error = true;
        contact_err.value = "Entrez un numéro valide !";
        addError(contact.id);
      }
      else if(contact.value <= 0){
        error = true;
        contact_err.innerHTML = "Entrez un numéro valide !";
        alert(contact_err.innerHTML);
        addError(contact.id);
      }
      else{

        contact_err.innerHTML = "contact obligatoire";
        removeError(contact.id);
      }
    }


    if(form.className == 'versement-form'){
      var montant = document.querySelector("#montant");
      var montant_err = document.querySelector("#montant ~ .error");

      //if Not integer
      if(!( montant.value %1 === 0))
      {

        alert("0");
        error = true;
        montant_err.innerHTML = "Entrez une somme valide !";
        addError(montant.id);
      }
      else if(montant.value <= 0){

        error = true;
        montant_err.innerHTML = "Entrez une somme valide !";
        addError(montant.id);
      }
      else{
        montant_err.innerHTML = "montant obligatoire";
        removeError(montant.id);
      }
    }



    //Only for the updLogin form
    if(form.className == 'updLogin-form')
    {
      var password = document.querySelector('#newMdp');
      var pwdConfirmation = document.querySelector('#newMdp2');
      var errMessage = document.querySelector('.error2');

      //isEmpty defined in validateForms.js
      if (!isFieldEmpty(password.id) && !isFieldEmpty(pwdConfirmation.id))
      {
        if (password.value != pwdConfirmation.value){
          error = true;
          errMessage.style.display = "inline";
        }
        else {
          //So it doesn't conflict with the error message 1.
          errMessage.style.display = "none";
        }
      }
    }
    if (error){
      e.preventDefault();
    }
  }, false);


  function isFieldEmpty(fieldId)
  {
    var field  = document.getElementById(fieldId);
    return (field.value.trim()) ? false : true;
  }

  function addError(fieldId){
    //Add the 'invalid-input class'
    var field = document.getElementById(fieldId);
    var classTab = field.className.split(' ');

    //So that we don't add the 'invalid-input class twice'
    if (classTab.indexOf("invalid-input") == -1)
    {
      field.className += " invalid-input";

      //The field error message
      var fieldError = document.querySelector('#'.concat(fieldId,'~.error'));
      fieldError.style.display = 'inline';
    }
  }

  function removeError(fieldId){
    //removes the 'invalid-input' class off the field
    var field = document.getElementById(fieldId);
    var classTab = field.className.split(' ');
    var i = classTab.indexOf("invalid-input");

    if (i != -1)
    {
      var classTab = field.className.split(' ');
      classTab.splice(i, 1);
      field.className = classTab.join(" ");

      var fieldError = document.querySelector('#'.concat(fieldId,'~.error'));
      fieldError.style.display = 'none';
    }
  }

  var form = document.querySelector('form');