  @extends('frontend.master')

  @section('content')

  <!-- Breadcrumb Area Start Here -->
  <div class="breadcrumbs-area position-relative">
      <div class="container">
          <div class="row">
              <div class="col-12 text-center">
                  <div class="breadcrumb-content position-relative section-content">
                      <h3 class="title-3">Contact Us</h3>
                      <ul>
                          <li><a href="index.html">Home</a></li>
                          <li>Contact Us</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Breadcrumb Area End Here -->

  <!-- Contact Us Area Start Here -->
  <div class="contact-us-area mt-no-text">
      <div class="container custom-area">
          <div class="row">
              <div class="col-lg-4 col-md-6 col-custom">
                  <div class="contact-info-item">
                      <div class="con-info-icon">
                          <i class="lnr lnr-map-marker"></i>
                      </div>
                      <div class="con-info-txt">
                          <h4>Our Location</h4>
                          <p>0812 123 456 789 / (800) 123 456 789 info@example.com</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 col-custom">
                  <div class="contact-info-item">
                      <div class="con-info-icon">
                          <i class="lnr lnr-smartphone"></i>
                      </div>
                      <div class="con-info-txt">
                          <h4>Contact us Anytime</h4>
                          <p>Mobile: 0812 345 678<br>Fax: 123 456 789</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-12 col-custom text-align-center">
                  <div class="contact-info-item">
                      <div class="con-info-icon">
                          <i class="lnr lnr-envelope"></i>
                      </div>
                      <div class="con-info-txt">
                          <h4>Support Overall</h4>
                          <p>Support24/7@example.com <br> tokobung@example.com</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 col-custom">
                  <form method="post" action="http://whizthemes.com/mail-php/reza/flosun/mail.php" id="contact-form" accept-charset="UTF-8" class="contact-form">
                      <div class="comment-box mt-5">
                          <h5 class="text-uppercase">Silahkan Hubungi Kami</h5>
                          <div class="row mt-3">
                              <div class="col-md-6 col-custom">
                                  <div class="input-item mb-4">
                                      <input class="border-0 rounded-0 w-100 input-area name gray-bg" type="text" name="con_name" id="con_name" placeholder="Name">
                                  </div>
                              </div>
                              <div class="col-md-6 col-custom">
                                  <div class="input-item mb-4">
                                      <input class="border-0 rounded-0 w-100 input-area email gray-bg" type="email" name="con_email" id="con_email" placeholder="Email">
                                  </div>
                              </div>
                              <div class="col-12 col-custom">
                                  <div class="input-item mb-4">
                                      <input class="border-0 rounded-0 w-100 input-area email gray-bg" type="text" name="con_content" id="con_content" placeholder="Subject">
                                  </div>
                              </div>
                              <div class="col-12 col-custom">
                                  <div class="input-item mb-4">
                                      <textarea cols="30" rows="5" class="border-0 rounded-0 w-100 custom-textarea input-area gray-bg" name="con_message" id="con_message" placeholder="Message"></textarea>
                                  </div>
                              </div>
                              <div class="col-12 col-custom mt-40">
                                  <button type="submit" id="submit" name="submit" class="btn flosun-button secondary-btn theme-color rounded-0">Send A Message</button>
                              </div>
                              <p class="col-8 col-custom form-message mb-0"></p>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!-- Contact Us Area End Here -->

  @endsection