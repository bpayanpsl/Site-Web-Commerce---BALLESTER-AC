<script type="text/javascript">
function surligne(champ, erreur)
{
   if(erreur)
   {
      champ.style.backgroundColor = "#fba";
   }
   else
   {
      champ.style.backgroundColor = "";
	}
}

function verifPseudo(champ)
{
   if(champ.value.length < 2 || champ.value.length > 25)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifMdp(champ)
{
	if(champ.value.length < 6 || champ.value.length > 25)
   {
      surligne(champ, true);
      return false;
      champ.setCustomValidity("Nous voudrions une adresse e-mail.");
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifCP(champ)
{
	if(!/^[0-9]+$/.test(champ.value) && champ.value.length != 5)
	{
		surligne(champ, true);
		return false;
    }
    else
    {
       surligne(champ, false);
       return true;
    }
}

function verifTel(champ)
{
	if(!/^[0-9]+$/.test(champ.value) && champ.value.length != 10)
	{
		surligne(champ, true);
		return false;
    }
    else
    {
       surligne(champ, false);
       return true;
    }
}

function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function queDesLettres(champ) {
  if(!/^[a-zA-Z]+$/.test(champ.value)) { 
	surligne(champ, true);
    return false;
  }
  return true;
}
function queDesChiffres(champ) {
  if(!/^[0-9]+$/.test(champ.value)) {
    return false;
  }
  return true;
}

function verifForm(f)
{
   var pseudoOk = verifPseudo(f.id);
   var mdpOk = verifMdp(f.mdp);
   var nomOk = verifPseudo(f.nom);
   var prenomOk = verifPseudo(f.prenom);
   var adresseOk = verifPseudo(f.adresse);
   var villeOk = verifPseudo(f.ville);
   var cpOk = verifCP(f.cp);
   var mailOk = verifMail(f.mail);
   var mailOk = verifTel(f.telephone);
   
   if(pseudoOk && mailOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs.");
      return false;
   }
}
</script>
