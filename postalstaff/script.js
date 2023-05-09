//slider//
const sliderInput = document.getElementById('slider-input');
const page1 = document.querySelector('.page1');
const page2 = document.querySelector('.page2');

sliderInput.addEventListener('change', () => {
  if (sliderInput.checked) {
    page1.style.display = 'none';
    page2.style.display = 'block';
  } else {
    page1.style.display = 'block';
    page2.style.display = 'none';
  }
});



  // add an event listener to all radio buttons
const radioButtons = document.querySelectorAll('input[type="radio"]');
radioButtons.forEach(radio => {
  radio.addEventListener('change', (event) => {
    // get the index of the current form step
    const currentStep = document.querySelector('.form-step-active');
    const currentStepIndex = parseInt(currentStep.id.split('-')[1]);

    // update the ID of the next form step based on the selected option
    let nextStepIndex = currentStepIndex + 1;
    if (event.target.value === 'Mobile Bill Payments') {
      nextStepIndex = 2;
    } else if (event.target.value === 'Utility Bill Payments') {
      nextStepIndex = 3;
    } else if (event.target.value === 'Exam Fee Payment') {
      nextStepIndex = 4;
    } else if (event.target.value === 'Vehicle Fine Payment') {
      nextStepIndex = 5;
    }


    // update the classes of the current and next form steps
    currentStep.classList.remove('form-step-active');
    const nextStep = document.querySelector(`#step-${nextStepIndex}`);
    nextStep.classList.add('form-step-active');


    // update the classes of the progress steps
    const progressSteps = document.querySelectorAll('.progress-step');
    progressSteps.forEach((step, index) => {
      if (index === currentStepIndex || index === currentStepIndex + 0) {
        step.classList.add('progress-step-active');
      } else {
        //step.classList.remove('progress-step-active');
      }
    });

    // update the width of the progress bar
    const progressBar = document.getElementById('progress');
    progressBar.style.width = `${(currentStepIndex / 3) * 100}%`;
  });
});












