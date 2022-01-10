

//Settings animation
var settingsBtn = document.querySelector('.settings-btn');

if(settingsBtn)
{
  settingsBtn.addEventListener('click', function(){
    if(settingsBtn.getAttribute('aria-expanded') == 'false'){
      activeSettingsBtn();
    }
    else{
      desactiveSettingsBtn();
    }
  })

  window.addEventListener('click',function(e){
    if(!settingsBtn.contains(e.target)){
      desactiveSettingsBtn();
    }
  })

  function activeSettingsBtn(){
    var classTab = settingsBtn.className.split(" ");
    if(classTab[classTab.length - 1] != "active"){
      settingsBtn.className += ' active';
    }
  }

  function desactiveSettingsBtn(){
    var classTab = settingsBtn.className.split(" ");

    if(classTab[classTab.length - 1] == "active"){
      classTab.pop();
      settingsBtn.className = classTab.join(' ');
    }
  }
}
