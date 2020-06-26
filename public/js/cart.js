function myfunc(e)
{
    var totale = e.parentNode.parentNode.parentNode.getElementsByClassName("totale")[0];
    var prix = e.parentNode.parentNode.parentNode.getElementsByClassName("prix")[0].innerText;
    var qty = e.value;
    totale.innerHTML = prix * qty;
}

function add(e)
{
    e.parentNode.querySelector('input[type=number]').stepUp();
    var qty = e.parentNode.querySelector('input[type=number]').value;
    var totale = e.parentNode.parentNode.parentNode.getElementsByClassName("totale")[0];
    var prix = e.parentNode.parentNode.parentNode.getElementsByClassName("prix")[0].innerText;
    totale.innerHTML = prix * qty;
}

function subtract(e)
{
    e.parentNode.querySelector('input[type=number]').stepDown();
    var qty = e.parentNode.querySelector('input[type=number]').value;
    var totale = e.parentNode.parentNode.parentNode.getElementsByClassName("totale")[0];
    var prix = e.parentNode.parentNode.parentNode.getElementsByClassName("prix")[0].innerText;
    totale.innerHTML = prix * qty;
}

function removeElem(e, t)
{
    e.preventDefault();
    t.parentNode.parentNode.remove();
}
