@php
    $footer = getContent('footer.content',true)->data_values;
    $element = getContent('footer.element',false,'',true);
    $policies = getContent('policy.element',false,'',true)
@endphp 
  
  <!-----Footer----->
  <footer class="site-footer">
      <div class="footer-top">
          <div class="container">
              <div class="footer-contact-wrap">
                  <div class="row">
                      <div class="col-md-4">
                          <ul class="footer-contact">
                              <li><i class="fa fa-map-marker" aria-hidden="true"></i></li>
                              <li class="content">
                                  <p class="address"><span>Location</span><br>
                                      Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                  </p>
                              </li>
                          </ul>
                      </div>
                      <div class="col-md-4">
                          <ul class="footer-contact">
                              <li><i class="fa fa-phone" aria-hidden="true"></i></li>
                              <li class="content">
                                  <p><span>Phone No.</span><br>
                                      <a href="tel:0411606649">0411606649</a>
                                  </p>
                              </li>
                          </ul>
                      </div>
                      <div class="col-md-4">
                          <ul class="footer-contact">
                              <li><i class="fa fa-envelope-o" aria-hidden="true"></i></li>
                              <li class="content">
                                  <p><span>Email ID</span><br>
                                      <a href="mailto:webmaster@scit-test.com">webmaster@scit-test.com</a>
                                  </p>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer-bottom">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-md-9">
                      <ul class="footer-nav">
                          @foreach($footer_pages as $k => $data)


                          <li><a href="{{route('pages',[$data->slug])}}">{{__($data->name)}}</a></li>


                          @endforeach

                      </ul>
                  </div>
                  <div class="col-md-3">
                      <p class="footer-social text-center">
                     
                      @foreach($footer_icons as $el )
                     
                          <a href="{{$el->data_values->link}}">@php echo $el->data_values->icon @endphp</a>
                         
                          @endforeach
                      </p>
                  </div>
              </div>
          </div>
          <div class="footer-description">
              <p>{{__($footer->short_details)}}</p>
          </div>
          <div class="copyright">
              <p> Copyright © {{date('Y')}} All Rights Reserved. Designed by <a href="https://www.scit-test.com/">{{$general->sitename}}</a></p>
          </div>
      </div>
  </footer>
  <!-----Footer End----->