//Displays the modals and pop ups

//Modal:
var modal = document.getElementById("modal");

if(modal)
{
  var modalActionBTn = document.querySelector('.modal-footer .btn-danger');
  var modalTitle = modal.querySelector('.modal-title');
  var modalMessage = modal.querySelector('.modal-body');

  var delButtons = document.querySelectorAll('.icon-btn.delete');

  //Displays the 'Dele confirmation' modal
  if (delButtons.length != 0)
  {
    delButtons.forEach((btn) =>
    {
      btn.addEventListener('click', function(e){

        var clickedLink = e.target;
        var currentPage = document.querySelector('.page');

        //the clickedLink 'id' attribute contains the urlimage.
        //the currentPage 'id' attribute contains the pages's name
        //so we can come back to this page when the deletion is done
        var delLink =
          "index.php?action=deleteRubrique&idRubrique=".concat(
            clickedLink.getAttribute('data-id'), '&page=', currentPage.id);

        modalTitle.innerHTML = "Suppression";
        modalMessage.innerHTML = "Voulez-vous supprimer cette publication ?";
        modalActionBTn.href = delLink;
        modalActionBTn.innerHTML = "Supprimer";
      }, false);
    });
  }

  //Log out confirmation modal
  var logOut = document.querySelector('.deconnexion');
  if(logOut)
  {
    logOut.addEventListener('click', function(){
      modalTitle.innerHTML = "Deconnexion";
      modalMessage.innerHTML = "Vous êtes allez être déconnecté. Confirmer ?";
      modalActionBTn.innerHTML = "Se deconnecter";
      modalActionBTn.href = "admin.php?exit";
    }, false);
  }
}

//The sidebar pop up
function openMenu()
{
  document.querySelector('.sidebar').className = "sidebar pt-0 open";
  document.querySelector('.menu-icon').className = "menu-icon d-md-none white";
  document.querySelector('header').className = "dark-mode";
}

function closeMenu()
{
  document.querySelector('.sidebar').className = "sidebar pt-0";
  document.querySelector('.menu-icon').className = "menu-icon d-md-none";
  document.querySelector('header').className = "";
}


(function()
{
	function clickMenu()
	{
		if (document.querySelector('.sidebar').offsetHeight == "0")
			openMenu();
		else
			closeMenu();
	}

document.querySelector('.menu').addEventListener('click', clickMenu, false);
})();
