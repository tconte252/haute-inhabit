    function setAttributeOnload(object, attribute, val) {
      if(window.addEventListener) {
        window.addEventListener('load',
          function(){ object[attribute] = val; }, false);
      } else {
        window.attachEvent('onload', function(){ object[attribute] = val; });
      }
    }