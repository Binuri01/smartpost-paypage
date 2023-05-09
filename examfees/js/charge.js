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

/*tooltip modal*/
const tooltips = document.querySelectorAll('.tooltip');
tooltips.forEach(tooltip => {
  tooltip.setAttribute('data-title', tooltip.getAttribute('title'));
  tooltip.removeAttribute('title');
});


/*onclick modal*/
$(document).ready(function(){
    $('[data-toggle="modal"]').click(function(){
      var target_modal = $(this).attr('data-target');
      $(target_modal).modal('show');
    });
  });


  
  function validate() {
    var name = document.forms["payment-form"]["ename"].value;
    if(name==""){
      alert("Please enter the name");
      return false;
    }
  
    var email = document.forms["payment-form"]["email"].value;
    if(email==""){
      alert("Please enter the email");
      return false;
    }else{
      var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
      var x=re.test(email);
      if(x){
      }else{
        alert("Email id not in correct format");
        return false;
      } 
    } 
  
    var type = document.forms["payment-form"]["type"].value;
    if(type==""){
      alert("Please select type");
      return false;
    } 
  
    var accNo = document.forms["payment-form"]["accNo"].value;
    if(accNo==""){
      alert("Please enter the Account Number");
      return false;
    }
  
    var duration = document.forms["payment-form"]["duration"].value;
    if(amount==""){
      alert("Please enter the duration");
      return false;
    }

    var amount = document.forms["payment-form"]["amount"].value;
    if(amount==""){
      alert("Please enter the amount");
      return false;
    }
  
    var cardNo = document.forms["payment-form"]["cardNo"].value;
    if(cardNo==""){
      alert("Please enter the cardNo");
      return false;
    }
  }
  
