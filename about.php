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