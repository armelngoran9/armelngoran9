var lightInputs = document.querySelectorAll('.light-input');

Array.from(lightInputs).forEach((input) => {
  input.addEventListener('blur', function(){
    active(input);
  }, false);
});

function active(element)
{
  //Gives and withdraw the active class to the input fields

  if (element.value && !isInputActive(element))
  {
    element.className += ' active';
  }

  else if (!element.value && isInputActive(element))
  {
      var classTab = element.className.split(" ");
      var i = classTab.indexOf('active');

      if(i != -1)
      {
        classTab.splice(i, 1);
      }
      element.className = classTab.join(' ');
  }
}

function isInputActive(inputElement)
{
  var inputClass = inputElement.className;
  var classTab = inputClass.split(" ");

  if (classTab.indexOf('active') != -1)
  {
    return true;
  }
  return false;
}
