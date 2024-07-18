   <div class="main-toast">
      <div class="body-toast">
         <div class="toast-content">
               <i class='bx bx-check check'></i>

               <div class="message">
                  <div class="toast-title" id="title"></div>
                  <div class="toast-message" id="message"></div>
               </div>
         </div>
         <div class="progress-bar" id="bar"></div>
      </div>
   </div>

   <!-- JS Link -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="assets/js/autocomplete.js"></script>
   <script src="assets/js/custom.js"></script>
   <script>
      const selectImage = document.querySelector('.select-image');
      const inputFile = document.querySelector('#file');
      const imgArea = document.querySelector('.img-area');

      selectImage.addEventListener('click', function () {
         inputFile.click();
      })

      inputFile.addEventListener('change', function () {
         const image = this.files[0]
         if(image.size < 2000000) {
            const reader = new FileReader();
            reader.onload = ()=> {
               const allImg = imgArea.querySelectorAll('img');
               allImg.forEach(item=> item.remove());
               const imgUrl = reader.result;
               const img = document.createElement('img');
               img.src = imgUrl;
               imgArea.appendChild(img);
               imgArea.classList.add('active');
               imgArea.dataset.img = image.name;
            }
            reader.readAsDataURL(image);
         } else {
            alert("Image size more than 2MB");
         }
      })
      
   </script>
   <script>
      const selectImageTwo = document.querySelector('.select-image2');
      const inputFileTwo = document.querySelector('#file2');
      const imgAreaTwo = document.querySelector('.img-area2');

      selectImageTwo.addEventListener('click', function () {
         inputFileTwo.click();
      })

      inputFileTwo.addEventListener('change', function () {
         const image = this.files[0]
         if(image.size < 2000000) {
            const reader = new FileReader();
            reader.onload = ()=> {
               const allImg = imgArea.querySelectorAll('img');
               allImg.forEach(item=> item.remove());
               const imgUrl = reader.result;
               const img = document.createElement('img');
               img.src = imgUrl;
               imgArea.appendChild(img);
               imgArea.classList.add('active');
               imgArea.dataset.img = image.name;
            }
            reader.readAsDataURL(image);
         } else {
            alert("Image size more than 2MB");
         }
      })
   </script>