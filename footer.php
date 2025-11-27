<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Vku Sport</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <style>
      html, body {
         height: 100%;
         margin: 0;
      }
      .wrapper {
         min-height: 100%;
         display: flex;
         flex-direction: column;
      }
      main {
         flex: 1; /* chiếm khoảng trống còn lại để đẩy footer xuống */
      }
   </style>
</head>

<body>
   <div class="wrapper">
      <main>
         <!-- Nội dung trang chính -->
         <div class="container py-5">
            <!-- <h2>Danh sách sân bóng</h2> -->
            <!-- nội dung hiển thị sân bóng hoặc thông báo -->
         </div>
      </main>

      <!-- start #footer -->
      <footer id="footer" class="text-white py-5" style="background-color: #959595;">
         <div class="container">
            <div class="row">
               <div class="col-lg-2 col-12">
                  <img width="110" src="./assets/logo_fb.png" alt="logo" class="logo">
               </div>
               <div class="col-lg-4 col-12">
                  <h4 class="font-rubik font-size-20">About</h4>
                  <div class="d-flex flex-column flex-wrap">
                     <p class="font-size-14 font-rale text-white-50">
                        Vku Sport thành lập năm 2025. Chúng tôi là nơi cho thuê sân bóng đá uy tín tại Việt Nam, chuyên cung cấp các sản phẩm sân bóng đá chất lượng, giá rẻ nhất thị trường.
                     </p>
                  </div>
               </div>
               <div class="col-lg-3 col-12">
                  <h4 class="font-rubik font-size-20">Feature</h4>
                  <div class="d-flex flex-column flex-wrap">
                     <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Hồ sơ cá nhân</a>
                     <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Blog</a>
                  </div>
               </div>
               <div class="col-lg-3 col-12">
                  <h4 class="font-rubik font-size-20">Contact</h4>
                  <div class="d-flex flex-column flex-wrap">
                     <p class="font-rale font-size-14 text-white-50 pb-1">Hotline: 0398262626</p>
                     <p class="font-rale font-size-14 text-white-50 pb-1">Address: Việt Nam</p>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <div class="copyright text-center bg-dark text-white py-2">
         <p class="font-rale font-size-14">&copy; Copyrights 2025. Design By <span class="color-second">Vku Sport</span></p>
      </div>
      <!-- !end #footer -->
   </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
   <script src="index.js"></script>
</body>

</html>
