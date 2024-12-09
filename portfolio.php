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