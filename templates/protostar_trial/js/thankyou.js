//SO: http://stackoverflow.com/questions/10126956/capture-value-out-of-query-string-with-regex
function getParams (str) {
   var queryString = str || window.location.search || '';
   var keyValPairs = [];
   var params      = {};
   queryString     = queryString.replace(/.*?\?/,"");

   if (queryString.length)
   {
      keyValPairs = queryString.split('&');
      for (pairNum in keyValPairs)
      {
         var key = keyValPairs[pairNum].split('=')[0];
         if (!key.length) continue;
         if (typeof params[key] === 'undefined')
         params[key] = [];
         params[key].push(keyValPairs[pairNum].split('=')[1]);
      }
   }
   return params;
}

// MDN: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math/random
// Returns a random integer between min (included) and max (included)
// Using Math.round() will give you a non-uniform distribution!
function getRandomIntInclusive(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

window.onload = function() {
    var url = document.location.href;
    var params = getParams(url);
    if (params['posted']) {
        var siteroot  = document.getElementById('siteroot').innerHTML;
        var post_question = document.getElementsByClassName('moduletable')[0];
        post_question.style.display = 'none';
        var parent = post_question.parentNode;
        var thankyou = document.createElement('img');
        var thankyou_src = siteroot + "templates/protostar_trial/images/Animations/0" + getRandomIntInclusive(1,5) + ".gif";
        thankyou.src = thankyou_src;
        thankyou.style.display = 'block';
        thankyou.style.cursor = 'pointer';
        thankyou.style['margin-left'] = 'auto';
        thankyou.style['margin-right'] = 'auto';
        parent.insertBefore(thankyou, post_question);
        thankyou.addEventListener('click', function() {
            thankyou.style.display = 'none';
            post_question.style.display = 'block';
        });
    }
}
