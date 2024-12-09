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