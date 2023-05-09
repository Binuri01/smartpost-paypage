/*var currentStep = 1;
var numSteps = 3;

$('.next-step').click(function() {
  if(currentStep < numSteps) {
    currentStep++;
    updateProgress(currentStep);
  }
});

$('.prev-step').click(function() {
  if(currentStep > 1) {
    currentStep--;
    updateProgress(currentStep);
  }
});

function updateProgress(step) {
  var progressWidth = ((step - 1) / numSteps) * 100;
  $('.progress').css('width', progressWidth + '%');
  $('.step.active').removeClass('active');
  $('#step' + step).addClass('active');
  $('.step-content').hide();
  $('.step' + step).show();
}*/



const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}