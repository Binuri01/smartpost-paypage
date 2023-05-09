<?php

// define variables and set to empty values
$nameErr = $imgErr = $descriptionErr = "";
$name = $img = $description = "";

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Admin-Utility Bill Payments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css" />

    
  </head>

  <body>
    <!-- Display a payment form -->
    <div class="container">
      <center><h2 class="header">Add Biller Details</h2></center>

      <a href = "billers.php" style="text-decoration:none; float: right"><button class="view-billers">View All Billers</button></a>
  
      <form id="payment-form" name = "payment-form" onsubmit="return validate()" method="post" action = "insert.php">

        <!--<input class="imgupload" id="img" type='file' accept="image/png, image/jpg, image/tiff, image/jpeg " name="img" required="required"><br><br>-->
          <div class="upload">
            <h3>Upload Image</h3>
            <div class="drag-area">
                <div class="icon">
                    <i class="fas fa-images"></i>
                </div>
                <span class="header">Drag & Drop</span>
                <span class="header">or <span class="button">browse</span></span>
                <input id="img" name="img" type="file" hidden>
                <span class="support">Supports: JPEG, JPG, PNG</span>
            </div>
          </div>
          <br>

          <input type="text" id="name" name="name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Name Of The Biller" value="<?php echo $name;?>" required="required"><br>
          
          <input type="radio" id="type" name="type" value="Electricity Bill">Electricity Bill
          <input type="radio" id="type" name="type" value="Water Bill">Water Bill
          <input type="radio" id="type" name="type" value="Telephone Bill">Telephone Bill
          <input type="radio" id="type" name="type" value="Other">Other<br><br>

          
          <textarea style="height:150px" id="description" name="description" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Add Description (Optional)" value="<?php echo $description;?>" required="required"></textarea><br>
          <span class="error"> <?php echo $descriptionErr;?></span>

          <button id="submit">
            <span id="button-text">Add Biller</span>
          </button>

      </form>
    </div>
    <script src="../js/charge.js"></script>
 
    <script>
      //drag & drop
      const dragArea = document.querySelector('.drag-area');
      const dragText = document.querySelector('.header');

      let button = document.querySelector('.button');
      let input = document.querySelector('input');

      let file;

      button.onclick = () => {
          input.click();
      };

      //when browse
      input.addEventListener('change', function(){
          file = this.files[0];
          dragArea.classList.add('active');
          displayFile();
      })

      //when file is inside the drag area
      dragArea.addEventListener('dragover',(event)=>{
          event.preventDefault();
          dragText.textContent = 'Release to Upload';
          dragArea.classList.add('active');
          //console.log('File is inside the drag area');
      });

      //when file leaves the drag area
      dragArea.addEventListener('dragleave', () => {
          dragText.textContent = 'Drag & Drop';
          dragArea.classList.remove('active');
          //console.log('File left the drag area');
      });

      //when the file is dropped in the drag area
      dragArea.addEventListener('drop',(event)=>{
          event.preventDefault();

          file = event.dataTransfer.files[0];
          //console.log(file);
          displayFile();

      });

      function displayFile(){
          let fileType = file.type;
          //console.log(fileType);

          let validExtensions = ['image/jpeg', 'image/jpg', 'image/png'];

          if(validExtensions.includes(fileType)){
              let fileReader = new FileReader();

              fileReader.onload = () => {
                  let fileURL = fileReader.result;
                  //console.log(fileURL);
                  let imgTag = `<img src="${fileURL}" alt="">`;
                  dragArea.innerHTML = imgTag;
              };
              fileReader.readAsDataURL(file);
          }else{
              alert('This file is not an Image');
              dragArea.classList.remove('active');
          }
      }

    </script>
  </body>
</html>
