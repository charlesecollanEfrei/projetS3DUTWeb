function verifForm(f) {
   var adresseOk = verifAdresse(f.adresse);
   var villeOk = verifVille(f.ville);
   var cpOk = verifCP(f.codePostal);
   var nomEntOk = verifNom(f.nomEnt);
   var adresseEntOk = verifAdresse(f.adresseEnt);
   var villeEntOk = verifVille(f.villeEnt);
   var cpEntOk = verifCP(f.codePostalEnt);
   var nomResponsableOk = verifNom(f.nomResponsable);
   var prenomResponsableOk = verifNom(f.prenomResponsable);
   var emailResponsableOk = verifMail(f.emailResponsable);
   var emailAutreOk = verifMail(f.emailAutre);
   var sujetStageOk = verifSujet(f.sujetStage);

   if(adresseOk && villeOk && cpOk && nomEntOk && adresseEntOk && villeEntOk && cpEntOk && nomResponsableOk && prenomResponsableOk && emailResponsableOk && emailAutreOk && sujetStageOk) {
      return true;
    }
   else {
      alert("Des champs sont vides ou alors sont mal écrit");
      return false;
   }
}


function surligne(champ, erreur) {
  if(erreur) {
    champ.style.backgroundColor = "#fba";
  }
  else {
  champ.style.backgroundColor = "";
  }
}




function verifAdresse(champ) {
   if(champ.value.length < 2 || champ.value.length > 100) {
      surligne(champ, true);
      return false;
   }
   else {
      surligne(champ, false);
      return true;
   }
}



function verifVille(champ) {
   if(champ.value.length < 2 || champ.value.length > 50) {
      surligne(champ, true);
      return false;
   }
   else {
      surligne(champ, false);
      return true;
   }
}


function verifCP(champ) {
  var cp = parseInt(champ.value);
  if(isNaN(cp) || cp < 1000 || cp > 99999) {
      surligne(champ, true);
      return false;
   }
   else {
      surligne(champ, false);
      return true;
   }
}


function verifNom(champ) {
   if(champ.value.length < 2 || champ.value.length > 100) {
      surligne(champ, true);
      return false;
   }
   else {
      surligne(champ, false);
      return true;
   }
}



function verifMail(champ) {
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value)) {
      surligne(champ, true);
      return false;
   }
   else{
      surligne(champ, false);
      return true;
   }
}



function verifSujet(champ) {
   if(champ.value.length < 2 || champ.value.length > 500) {
      surligne(champ, true);
      return false;
   }
   else {
      surligne(champ, false);
      return true;
   }
}
