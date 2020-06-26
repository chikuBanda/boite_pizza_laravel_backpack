var stripe = Stripe('pk_test_t5JEWCxP2WcYsi4iA9y2U2Ex00rYwS1skJ');
var $form = $('#checkout-form');
var elements = stripe.elements();

$form.submit(function(event){
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled', true);
    stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name: $('#card-name')
    }, stripeResponseHandler);
    return false;
});

function stripeResponseHandler(status, response)
{
    if(response.error)
    {
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(response.error.message);
        $form.find('button').prop('disabled', false);
    }
    else{
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        $form.get(0).submit();
    }
}
