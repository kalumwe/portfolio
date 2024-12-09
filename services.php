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