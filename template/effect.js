var i=1;
var qty = 3;
function effect () {
    i++;
    if (i>qty) i=1;
    var _url = "url(images/bg-top"+i+".jpg)";
    document.getElementById('header').style.backgroundImage = _url;
}

setInterval(function(){effect()},5000);