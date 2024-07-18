   function FloatNavbar()
   {
      let menu = document.querySelector("#menu-icon");

      let navbar = document.querySelector(".ul-navbar");

      menu.onclick = () => {
         menu.classList.toggle('ri-close-fill');
         navbar.classList.toggle('open');
      }
   }

   // ToastAlert(a, b)
   function ToastAlert(message, title) 
   {
      const myToast = document.querySelector(".body-toast");
      const progress = document.querySelector(".progress-bar");

      myToast.classList.add("active");
      progress.classList.add("active");

      $("#title").html(title);
      $("#message").html(message);

      setTimeout(()=> {
         myToast.classList.remove("active");
         myToast.style.display = 'none';
      }, 3000);
   }

   function Skeleton() 
   {
      const allSkeleton = document.querySelectorAll(".skeleton");

      window.addEventListener('load', function() {
         allSkeleton.forEach(item => {
               item.classList.remove('skeleton');
         });
      });
   }

   function Loader() 
   {
      setTimeout(()=>{
         $('.loader').fadeOut(500);
      },200);
      Skeleton();
   }

   function Filter()
   {
      var destination = document.getElementById("destination");
      const show = document.querySelectorAll(".hidden");
      
      destination.addEventListener('change', () => {
         if (destination.value !== '')
         {
               for (let i = 0; i <= show.length; i++)
               {
                  show[i].classList.add("showing");
                  show[i].classList.remove("hidden");
                  // console.log("GOOD");
               }
         }
         else 
         {
               for (let i = 0; i <= show.length; i++)
               {
                  show[i].classList.remove("showing");
                  show[i].classList.add("hidden");

                  // console.log("GOOD");
               }
               // console.log("BAD");
         }
      });
   }

   FloatNavbar();
   Loader();
   Filter();