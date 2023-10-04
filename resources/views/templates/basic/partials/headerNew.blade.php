@php
    $footer = getContent('footer.content',true)->data_values;
    $element = getContent('footer.element',false,'',true);
    $policies = getContent('policy.element',false,'',true)
@endphp 
 
 <!-----Header Start----->
 <header>
     <div class="header">
         <div class="login-header ">
             <div class="container">
                 <div class="row align-items-center">
                     <div class="col-md-6 col-5">
                         <ul class="header-contact">
                             @foreach($element as $el )
                     
                          <li><a href="{{$el->data_values->link}}">@php echo $el->data_values->icon @endphp</a></li>
                         
                          @endforeach
                         </ul>
                     </div>
                     <div class="col-md-6 col-12 d-flex justify-content-end login-wrap">
                         @guest
                         <div class="signup">
                             <a href="{{route('user.register')}}">Register</a>
                         </div>
                         <div class="signin">
                             <a href="{{route('user.login')}}">Login</a>
                         </div>
                         @endguest

                         @auth
                         <div class="signup">
                             <a href="{{route('user.home')}}" class="btn--base">Dashboard</a>
                         </div>
                         <div class="signin">
                             <a href="{{route('user.logout')}}" class="btn--base active">Logout</a>
                         </div>
                         @endauth
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="header-bottom">
         <div class="container">
             <nav class="navbar navbar-expand-lg navbar-light p-0">
                 <a class="navbar-brand" href="{{route('home')}}">
                     <img src="{{asset('assetsnew/images/logo.png')}}" alt="">
                 </a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse"
                     data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                     aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>

                 <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                         @foreach($pages as $k => $data)
                         @if($data->status == 1 && $data->name != 'About' && $data->name != 'FAQ')
                         <!-- <li><a href="{{route('pages',[$data->slug])}}">{{__($data->name)}}</a></li> -->
                         <li class="nav-item">
                             <a class="nav-link" aria-current="page"
                                 href="{{route('pages',[$data->slug])}}">{{__($data->name)}}</a>
                         </li>
                         @endif
                         @endforeach
                         <!-- <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="about.html">Privacy policy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="iclude.html">Here's How It Works</a>
                            </li>-->
                         <li class="nav-item">
                             <a class="nav-link" aria-current="page" href="{{route("blog")}}">Blog</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" aria-current="page" href="{{route('faq')}}">FAQ</a>
                         </li>
                         @guest
                         <li class="nav-item">
                             <a class="nav-link" aria-current="page" href="{{route('contact')}}">Contact us</a>
                         </li>
                         @endguest

                         @auth
                         <li class="nav-item">
                             <a class="nav-link" aria-current="page" href="{{route('ticket')}}">Support</a>
                         </li>


                         @endauth

                     </ul>
                 </div>
             </nav>
         </div>
     </div>
 </header>
 <!-- header-end -->