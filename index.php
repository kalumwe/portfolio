<?php require_once './db_connect.php';
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- title, meta data, styles and icons -->
 <?php include('./includes/head.php'); ?>
</head>

<body id="page-top">
  <!-- Nav -->
    <?php include('./includes/nav.php'); ?>
  <!-- Nav End -->

  <!-- Intro Section-->
  <div id="home" class="intro route bg-imag mb-5" >
    <?php include('./intro.php'); ?>
  </div>
  <!-- Intro End-->

  <!-- About me Section -->
  <section id="about" class="about-mf sect-pt4 route mb-5 rounded">
    <?php 
      include('./about.php');
    ?>
  </section>
  <!-- About End -->

  <!-- Skills Section -->
  <section id="skills" class="services-mf route">
  <?php include('./skills.php'); ?>
  </section>
  <!-- Skills Section End -->
  

  <!-- Services Section -->
  <section id="service" class="services-mf route">
    <?php include('./services.php'); ?>S
  </section>
  <!-- Services Section End -->

  <!--Portfolio Section  -->
  <section id="work" class="portfolio-mf sect-pt4 route">
     <?php include('./portfolio.php'); ?>
  </section>
  <!-- Portfolio Section End -->

  <!--Blog  Section -->
  <section id="blog" class="blog-mf sect-pt4 route">
    <?php include('./blog.php'); ?>
  </section>
  <!-- Blog Section  End -->

  <!-- Contact-Footer Section  -->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/img3.jpg)">
     <?php include('./contact.php'); ?>
  </section>
  <!-- Contact-footer End -->

  <div id="whatsapp">
    <a href="#" ><span class="whatsapp"><i class="ion-social-whatsapp "></i></span></a>
  </div>

  <div id="chatbox">
    <div id="chat-messages"></div>
    <input type="text" id="chat-input" placeholder="Type a message...">
    <button id="send-button">Send</button>
  </div>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloade"></div>


</body>

<script>
 $(document).ready(function() {
  $('.skill-image').hover(
    function() {
      $(this).addClass('shake-animation');
    },
    function() {
      $(this).removeClass('shake-animation');
    }
  );
});
</script>

</html>

<?php 
 $conn = null;
 $conn2 = null;
  ?>