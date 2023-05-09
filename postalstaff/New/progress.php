<?php
    session_start();

    if(isset($_POST['nextStep'])) {
        // Move to the next step
        $_SESSION['currentStep']++;
    }

    if(isset($_POST['prevStep'])) {
        // Move to the previous step
        $_SESSION['currentStep']--;
    }

    // Define the steps and their respective sections
    $steps = array(
        1 => 'step1',
        2 => 'step2',
        3 => 'step3'
    );

    // Check if the current step is valid
    if(!isset($_SESSION['currentStep']) || !array_key_exists($_SESSION['currentStep'], $steps)) {
        $_SESSION['currentStep'] = 1;
    }

    // Get the current step's section ID
    $currentSection = $steps[$_SESSION['currentStep']];

    // Redirect to the current step's section
    header('Location: #'.$currentSection);
    exit;
?>

