<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <section>
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
              <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                  <h3>Alliance Frainchaise Hospital</h3>
                  <p>
                    Kenyatta Avenue,Nairodi <br>
                    <strong>Phone:</strong> +254 722000000<br>
                    <strong>Email:</strong> info@alliancefranchaise.com<br>
                  </p>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                  <h4>Join Our Newsletter</h4>
                  <p>Subscribe to our weekly newsletter</p>
                  <form action="" method="post">
                    <input type="email" name="email"><input type="submit" value="Subscribe">
                  </form>
                </div>

              </div>
            </div>
          </div>

          <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
              <div class="copyright">
                &copy; Copyright <strong><span>Masake</span></strong>. All Rights Reserved
              </div>
              <div class="credits">

                Designed by <a >masake</a>
              </div>
              <div>

                <?php 
                if (isset($_SESSION['email'])) {
                  echo "Hello";
                }

                  ?>
                
              </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
  
    </footer>
  </section>

</body>
</html>
