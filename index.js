
function checkName(tmp) {
  if (/^[A-Za-z\s]+$/.test(tmp.value) == false && tmp.value != "")
  {
    tmp.focus();
    tmp.value = "";
    tmp.style.borderColor = "#f00";
    tmp.placeholder = "Inserisci un nome valido";
  }
  else if (tmp.value != "")
  {
    tmp.style.borderColor = "#ccc";
  }
}


function checkSurname(tmp) {
  if (/^[A-Za-z\s]+$/.test(tmp.value) == false && tmp.value != "")
  {
    tmp.focus();
    tmp.value = "";
    tmp.style.borderColor = "#f00";
    tmp.placeholder = "Inserisci un cognome valido";
  }
  else if (tmp.value != "")
  {
    tmp.style.borderColor = "#ccc";
  }
}


function checkBDay(tmp) {
  if (tmp.value != "")
  {
    tmp.style.borderColor = "#ccc";
  }
}


function checkCodFiscale(tmp) {
  cod = tmp.value.toUpperCase();
  if(/^[0-9A-Z]{16}$/.test(cod) == false && cod != "")
  {
    tmp.focus();
    tmp.value = "";
    tmp.style.borderColor = "#f00";
    tmp.placeholder = "Inserisci un codice fiscale valido, di 16 caratteri";
  }
  else if (tmp.value != "") {
    var map = [1, 0, 5, 7, 9, 13, 15, 17, 19, 21, 1, 0, 5, 7, 9, 13, 15, 17,
      19, 21, 2, 4, 18, 20, 11, 3, 6, 8, 12, 14, 16, 10, 22, 25, 24, 23];
      var s = 0;
      for(var i = 0; i < 15; i++) {
        var c = cod.charCodeAt(i);
        if(c < 65)
        c = c - 48;
        else
        c = c - 55;
        if(i%2 == 0)
        s += map[c];
        else
        s += c < 10? c : c - 10;
      }
      var atteso = String.fromCharCode(65 + s % 26);
      if(atteso != cod.charAt(15))
      {
        tmp.focus();
        tmp.value = "";
        tmp.style.borderColor = "#f00";
        tmp.placeholder = "Inserisci un codice fiscale valido";
      }
      else {
        tmp.style.borderColor = "#ccc";
      }
    }
  }


  function checkCAP(tmp) {
    if (/^\d{5}$/.test(tmp.value) == false && tmp.value != "")
    {
      tmp.focus();
      tmp.value="";
      tmp.style.borderColor = "#f00";
      tmp.placeholder="Inserisci un CAP valido";
    }
    else if (tmp.value != "")
    {
      tmp.style.borderColor = "#ccc";
    }
  }


  function checkPhoneNum(tmp) {
    if (/^([+]39)?((3[\d]{2})([ ,\-,\/]){0,1}([\d, ]{6,9}))|(((0[\d]{1,4}))([ ,\-,\/]){0,1}([\d, ]{5,10}))$/.test(tmp.value) == false && tmp.value != "")
    {
      tmp.focus();
      tmp.value="";
      tmp.style.borderColor = "#f00";
      tmp.placeholder="Inserisci un telefono valido";
    }
    else if (tmp.value != "")
    {
      tmp.style.borderColor = "#ccc";
    }
  }

  /* Controlla la correttezza di una mail*/
  function checkEmail(tmp) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(tmp.value) == false && tmp.value != "")
    {
      tmp.focus();
      tmp.value="";
      tmp.style.borderColor = "#f00";
      tmp.placeholder="Inserisci una email valida";
    }
    else if (tmp.value != "")
    {
      tmp.style.borderColor = "#ccc";
    }
  }

  /* Controlla se i campi del form sono vuoti e li segnala*/
  function checkFieldAddUser(tmp) {
    var error = true;

    if (tmp.firstName.value == "") {
      tmp.firstName.style.borderColor = "#f00";
      error = false;
    }
    else {
      tmp.firstName.style.borderColor = "#ccc";
    }

    if (tmp.lastName.value == "") {
      tmp.lastName.style.borderColor = "#f00";
      error = false;
    }
    else {
      tmp.lastName.style.borderColor = "#ccc";
    }

    if (tmp.bday.value == "") {
      tmp.bday.style.borderColor = "#f00";
      error = false;
    }
    else {
      tmp.bday.style.borderColor = "#ccc";
    }

    if (tmp.bplace.value == "") {
      tmp.bplace.style.borderColor = "#f00";
      error = false;
    }
    else {
      tmp.bplace.style.borderColor = "#ccc";
    }

    if (tmp.codfisc.value == "") {
      tmp.codfisc.style.borderColor = "#f00";
      error = false;
    }
    else {
      tmp.codfisc.style.borderColor = "#ccc";
    }

    if (tmp.address.value == "") {
      tmp.address.style.borderColor = "#f00";
      error = false;
    }
    else {
      tmp.address.style.borderColor = "#ccc";
    }

    if (tmp.postcode.value == "") {
      tmp.postcode.style.borderColor = "#f00";
      error = false;
    }
    else {
      tmp.postcode.style.borderColor = "#ccc";
    }

    if (tmp.gender.value == "") {

      error = false;
    }

    if (tmp.agon.value == "") {

      error = false;
    }

    if (tmp.selForm.value != "plus") {

      if (tmp.phoneNum.value == "") {
        tmp.phoneNum.style.borderColor = "#f00";
        error = false;
      }
      else {
        tmp.phoneNum.style.borderColor = "#ccc";
      }

      if (tmp.email.value == "") {
        tmp.email.style.borderColor = "#f00";
        error = false;
      }
      else {
        tmp.email.style.borderColor = "#ccc";
      }
    }
    else if (tmp.selForm.value == "plus") {
      if (tmp.firstNameParent.value == "") {
        tmp.firstNameParent.style.borderColor = "#f00";
        error = false;
      }
      else {
        tmp.firstNameParent.style.borderColor = "#ccc";
      }
      if (tmp.lastNameParent.value == "") {
        tmp.lastNameParent.style.borderColor = "#f00";
        error = false;
      }
      else {
        tmp.lastNameParent.style.borderColor = "#ccc";
      }
      if (tmp.emailParent.value == "") {
        tmp.emailParent.style.borderColor = "#f00";
        error = false;
      }
      else {
        tmp.emailParent.style.borderColor = "#ccc";
      }
      if (tmp.phoneNumParent.value == "") {
        tmp.phoneNumParent.style.borderColor = "#f00";
        error = false;
      }
      else {
        tmp.phoneNumParent.style.borderColor = "#ccc";
      }
      if (tmp.parentela.value == "") {
        tmp.parentela.style.borderColor = "#f00";
        error = false;
      }
      else {
        tmp.parentela.style.borderColor = "#ccc";
      }
    }

    return error;
  }

  /* Controlla se i campi del form sono vuoti e li segnala*/
  function checkFieldLogIn(tmp) {
    var error = true;

    if (tmp.username.value == "") {
      tmp.username.style.borderColor = "#f00";
      error = false;
    }
    else {
      tmp.username.style.borderColor = "#ccc";
    }

    if (tmp.psw.value == "") {
      tmp.psw.style.borderColor = "#f00";
      error = false;
    }
    else {
      tmp.username.style.borderColor = "#ccc";
    }

    return error;
  }
