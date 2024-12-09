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