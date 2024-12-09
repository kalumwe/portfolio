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