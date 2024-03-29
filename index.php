<?php
ob_start();

 require_once './includes/db_connect.php';
 require_once './includes/utility_funcs.php';

 $conn = dbConnect('read', 'pdo', "db1");
 $qry = $conn->query("SELECT *, CONCAT(first_name, ' ', last_name) AS name FROM about_me LIMIT 0, 1");
 foreach ($qry->fetch() as $key => $value) {
          $meta[$key] = $value;
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <?php include'./includes/head.php'; ?>
 <style>
  .skill-image {
    transition: transform 1.3s ease;
  }
  .shake-animation {
  animation: shake 1.3s infinite alternate;
}

@keyframes shake {
  from {
    transform: translateX(-4.4px);
  }
  to {
    transform: translateX(4.4px);
  }
}
  </style>
</head>

<body id="page-top">
  <!-- Nav -->
    <?php include'./includes/nav.php'; ?>
  <!-- Nav End -->

  <!-- Intro -->
  <div id="home" class="intro route bg-imag mb-5" >
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="intro-title mb-4">I am <?php echo isset($meta['name']) ? sanitize($meta['name']) : ''; ?></h1>
          <p class="intro-subtitle"><span class="text-slider-items"><?php echo isset($meta['skills']) ? sanitize($meta['skills']) : ''; ?></span><strong class="text-slider"></strong></p>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
          <div class="intro-grid"></div>
          <div id="intro-grid2"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Intro End-->

  <section id="about" class="about-mf sect-pt4 route mb-5 rounded">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
           <div class="col-md-12 mb-3">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      About me
                    </h5>
                  </div>
                 <?php echo isset($meta['about']) ? html_entity_decode($meta['about']) : ''; ?>
                </div>
              </div>
                
              <div class="col-md-12">
                <div class="row my-2">
                  <div class="col-sm-7 col-md-5 mb-3">
                    <div class="about-info ">
                      <p><span class="title-s">Name: </span> 
                        <span><?php echo isset($meta['name']) ? sanitize($meta['name']) : ''; ?></span></p>
                      <p><span class="title-s">Profile: 
                      </span> <span><?php echo isset($meta['profile']) ? sanitize($meta['profile']) : ''; ?></span></p>
                      <p><span class="title-s">Email: </span> 
                        <span class="my-email"><?php echo isset($meta['email']) ? sanitize($meta['email']) : ''; ?></span></p>
                      <p><span class="title-s">Phone: </span> 
                        <span><?php echo isset($meta['phone']) ? sanitize($meta['phone']) : ''; ?></span></p>
                    </div>
                  </div>
                  <div class="col-sm-5 col-md-5">
                    <div class="about-img d-flex justify-content-center">
                      <img src="img/<?= sanitize($meta['profile_picture']) ?>" class="rounded-circle b-shadow-a mb-4" id = "mePic" alt="" >
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <a href="./includes/download.php?file=my_cv.pdf" class="button button-a button-big button" data-text="Download CV"><span>Download CV</span></a>  
                  </div>              
              </div>            
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Skills Section -->
  <section id="skills" class="services-mf route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Skills
            </h3>
          </div>
        </div>
      </div>
      <div class="row">      
         <?php
            $sql = "SELECT * FROM skills WHERE category = 'frontend'";
            $result = $conn->query($sql);
            $error = $conn->errorInfo()[2];
            if($result->rowCount() > 0) {       
          ?>
        <div class="col-md-6">
        <h3 class="s-title text-center">Frontend</h3>
          <div class="service-box">
            <div class="service-content">
              
              <?php 
                  while($row = $result->fetch()) {   ?>
              <a href="<?= sanitize($row['link_url']) ?>" target="_blank" rel="noreferrer">
                 <img src="<?= sanitize($row['img_url']) ?>" class="skill-image m-1" alt="<?= sanitize($row['name']) ?>" width="80" height="80"/> </a>
                 <?php } ?>
            </div>
          </div>         
        </div>
       <?php
        }?>

<?php
            $sql = "SELECT * FROM skills WHERE category = 'backend'";
            $result = $conn->query($sql);
            $error = $conn->errorInfo()[2];
            if($result->rowCount() > 0) {       
          ?>
        <div class="col-md-6">
        <h3 class="s-title text-center">Backend</h3>
          <div class="service-box">
            <div class="service-content">
              <?php 
                  while($row = $result->fetch()) {   ?>
              <a href="<?= sanitize($row['link_url']) ?>" target="_blank" rel="noreferrer">
                 <img src="<?= sanitize($row['img_url']) ?>" class="skill-image m-1" alt="<?= sanitize($row['name']) ?>" width="83" height="83"/> </a>
                 <?php } ?>
            </div>
          </div>         
        </div>
       <?php  
        }?>
		
		<?php
            $sql = "SELECT * FROM skills WHERE category = 'other'";
            $result = $conn->query($sql);
            $error = $conn->errorInfo()[2];
            if($result->rowCount() > 0) {       
          ?>
        <div class="col-md-6">
        <h3 class="s-title text-center">Other Technologies</h3>
          <div class="service-box">
            <div class="service-content ">
              <?php 
                  while($row = $result->fetch()) {   ?>
              <a href="<?= sanitize($row['link_url']) ?>" target="_blank" rel="noreferrer">
                 <img src="<?= sanitize($row['img_url']) ?>" class="skill-image m-1" alt="<?= sanitize($row['name']) ?>" width="80" height="80"/> </a>
                 <?php } ?>
            </div>
          </div>         
        </div>
       <?php  
        }?>
		
		<?php
            $sql = "SELECT * FROM skills WHERE category = 'database'";
            $result = $conn->query($sql);
            $error = $conn->errorInfo()[2];
            if($result->rowCount() > 0) {       
          ?>
        <div class="col-md-6">
        <h3 class="s-title text-center">Database Systems</h3>
          <div class="service-box">
            <div class="service-content d-flex justify-content-center">
              <?php 
                  while($row = $result->fetch()) {   ?>
              <a href="<?= sanitize($row['link_url']) ?>" target="_blank" rel="noreferrer">
                 <img src="<?= sanitize($row['img_url']) ?>" class="skill-image m-1" alt="<?= sanitize($row['name']) ?>" width="84" height="84"/> </a>
                <?php } ?>
            </div>
          </div>         
        </div>
       <?php  
        }?>

    
       </div>
      </div>
    </div>
  </section>
  <!-- Skills Section End -->
  

  <!-- Services Section -->
  <section id="service" class="services-mf route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Services
            </h3>
            <p class="subtitle-a">
              Here are the services I offer.
            </p>
            <div class="ine-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">      
         <?php
            $sql = "SELECT * FROM services";
            $result = $conn->query($sql);
            $error = $conn->errorInfo()[2];
            if($result->rowCount() > 0) {
               while($row = $result->fetch()) {         
          ?>
        <div class="col-md-6">
          <div class="service-box">
            <div class="service-ico mb-4">
              <span class="ico-circle"><?= html_entity_decode($row['icon']) ?></span>             
            </div>
            <div class="service-content">
              <h2 class="s-title"><?= sanitize($row['name']) ?></h2>
              <p class="s-description text-center">
               <?= html_entity_decode($row['description']) ?>
              </p>
            </div>
          </div>         
        </div>
       <?php } 
        }?>

         <div class="col-md-12">
          <div class="service-box">
            <div class="service-content" >
              <p class="s-description text-center mb-5">              
                <?= sanitize($meta['summary']) ?>
              </p>
            </div>
              <div class="d-flex justify-content-center">
               <a href="#contact" class="button button-a button-big button" data-text="Download CV"><span>contact me</span></a> 
               </div> 
            </div>
        </div>
       </div>
      </div>
    </div>
  </section>
  <!-- Services Section End -->

  <!--Portfolio Section  -->
  <section id="work" class="portfolio-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Projects
            </h3>
            <p class="subtitle-a">
              Check out some my of my cool projects.
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
          <?php
            $sql = "SELECT *, DATE_FORMAT(created, '%D %b. %y') AS p_date FROM project";
            $result = $conn->query($sql);
            $error = $conn->errorInfo()[2];
            if($result->rowCount() > 0) {
               while($row = $result->fetch()) {         
            ?>
        <div class="col-md-4">
          <div class="work-box">
            <a href="<?= sanitize($row['link']) ?>" target="_blank">
              <div class="work-img">
                <img src="img/<?= sanitize($row['image']) ?>" alt="" class="img-fluid">
              </div>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-12">
                    <h2 class="w-title"><?= sanitize($row['name']) ?></h2>
                    <div class="w-more">
                      <span class="w-ctegory">Web Design</span> / <span class="w-date"><?= sanitize($row['p_date']) ?></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like m-0">
                    <a href="<?= sanitize($row['link']) ?>" target="_blank"><i class="bi bi-link-45deg"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      <?php }
          }
      ?>
      </div>
    </div>
  </section>
  <!-- Portfolio Section End -->

  <!--Blog  Section -->
  <section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Blog
            </h3>
            <p class="subtitle-a">
              My awesome Blog.
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
      <?php
          $conn2 = dbConnect('read', 'pdo', "db2");
            $sql = "SELECT p.*, a.profile_picture, c.name AS category, CONCAT(a.first_name, ' ', a.last_name) AS author_name 
             FROM posts p INNER JOIN category c ON c.id = p.category_id 
             INNER JOIN author a ON a.id = p.author_id WHERE p.status = 1 LIMIT 6, 3";
            $result = $conn2->query($sql);
            $error = $conn2->errorInfo()[2];
            if($result->rowCount() > 0) {
               while($row=$result->fetch()) {         
      ?>
        <div class="col-md-4">
          <div class="card card-blog">
            <div class="card-img">
              <a href="//localhost:8080/blog_site/index.php?page=single-post&id=<?= (int) $row['id'] ?>" target="_blank">
                <img src="img/<?= sanitize($row['img_path']) ?>" alt="" class="img-fluid"></a>
            </div>
            <div class="card-body">
              <div class="card-category-box">
                <div class="card-category">
                  <h6 class="category"><?= sanitize($row['category']) ?></h6>
                </div>
              </div>
              <h3 class="card-title">
                <a href="//localhost:8080/blog_site/index.php?page=single-post&id=<?= (int) $row['id'] ?>" target="_blank">
                See more ideas about <?= sanitize($row['category']) ?></a></h3>
               <?php
                  //first two sentences of article in $extract[0] are immediately displayed.
                  $extract = getFirst($row['post'], 1);    ?>
                  <p class="card-description"><?php echo html_entity_decode($extract[0]); ?></p>
            </div>
            <div class="card-footer">
              <div class="post-author">
                <a href="#">
                  <img src="img/<?= sanitize($row['profile_picture']) ?>" alt="" class="avatar rounded-circle">
                  <span class="author"><?= sanitize($row['author_name']) ?></span>
                </a>
              </div>
              <div class="post-date">                
                <span class="ion-ios-clock-outline"></span> <?php $timeElapsed = getTimeElapsed(sanitize($row['date_published']));
                 echo $timeElapsed; ?>
              </div>
            </div>
          </div>
        </div>
        <?php }
          }
      ?>

      </div>
    </div>
  </section>
  <!-- Blog Section  End -->

  <!-- Contact-Footer Section  -->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/img3.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-mf">
            <div id="contact" class="box-shadow-full">
              <div class="row">
                <div class="col-md-6">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      Contact Me
                    </h5>
                  </div>
                  <div>
                      <form action="./contactform/feedback-handler.php" method="post" role="form" class="contactForm">
                      <div id="sendmessage">Your message has been sent. Thank you!</div>
                      <div id="errormessage"></div>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please write your name at least 4 chars" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter subject at least 8 chars " />
                              <div class="validation"></div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write your message" placeholder="Message"></textarea>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center my-3">
                          <button type="submit" class="button button-a button-big button-rouded">Send Message</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-6 mt-4">
                  <div class="title-box-2 pt-4 pt-md-0">
                    <h5 class="title-left">
                      Let's Chat
                    </h5>
                  </div>
                  <div class="more-info mb-5">
                    <p class="lead mb-4">
                     <?= sanitize($meta['summary']) ?>
                    </p>
                    <ul class="list-ico d-md-flex ">
                      <!--<li><span class="ion-ios-location"></span>LUSAKA, ZAMBIA</li>-->
                      <li class="mr-4"><span class="ion-ios-telephone mt-1"></span><?= sanitize($meta['phone']) ?></li>
                      <li><span class="ion-email"></span><a href="mailto:" class="my-email"><?= sanitize($meta['email']) ?></a></li>
                    </ul>
                  </div>
                  <div class="socials d-flex justify-content-center">
                    <ul>
                      <li><a href="https://www.linkedin.com/in/kalumba-mweshi-347b01251/">
                        <span class="ico-circle mr-2 "><i class="ion-social-linkedin"></i></span></a></li>
                      <li><a href="https://github.com/kalumwe">
                        <span class="ico-circle mr-2"><i class="ion-social-github"></i></span></a></li>
                      <li><a href=""><span class="ico-circle mr-2"><i class="ion-social-facebook"></i></span></a></li>
                      <li><a href="" ><span class="ico-circle mr-2"><i class="ion-social-whatsapp"></i></span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <?php include'./includes/footer.php'; ?>
    </footer>
  </section>
  <!-- Contact-footer End -->
  <div id="whatsapp">
  <a href="#" ><span class="whatsapp"><i class="ion-social-whatsapp "></i></span></a>
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