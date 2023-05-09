//create a stripe client
var stripe = Stripe('pk_test_51MXdaYD6qbEya7gHm7rmxT9iIEdvTD0eviZwx4KbHXUfL2KtLVgwgERW9cpD2rsEUy3w51KV6LvdxtBNJ36Ff5aI00kqVhKSf6');

//create an instace of elements
var elements = stripe.elements();

var style = {
    base: {
        color: '#32325d',
        lineHeight: '18px',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder':{
            color: '#aab7c4'
        }
    },

    invalid:{
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};


var card = elements.create('card', {style: style});

card.mount('#card-element');

//handle validation errors
card.addEventListener('change', function(event){
    var displayError = document.getElementById('card-errors');
    if(event.error){
        displayError.textContent = event.error.message;
    } else{
        displayError.textContent='';
    }
});

//handle form submission
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event){
    event.preventDefault();

    stripe.createToken(card).then(function(result){
        if(result.error){
            //inform the user if there was an error
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            //send the token to your server
            stripeTokenHandler(result.token);
        }
    });
});

function stripeTokenHandler(token){
    //Insert the token id to the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    //submit the form
    form.submit();
}

//Modal-delete
/*var modalBtn = document.querySelector('.modal-btn');
var modalBg = document.querySelector('.modal-bg');
var modalClose = document.querySelector('.modal-close');

modalBtn.addEventListener('click', function(){
    modalBg.classList.add('bg-active');
});

modalClose.addEventListener('click', function(){
    modalBg.classList.remove('bg-active');
});*/
  

