
            <!-- Top Bar Start -->
            <div class="top-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-12" style="padding-left:0px;">
                            <div class="logo">
                                <a href="/">
                                   
                                    <img src="images/logo.png" alt="Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 d-none d-lg-block">
                            <div class="row">
								
								
								 <div class="col-4">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-send-mail"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3>Follow Us</h3>
                                            <p>info@suchasgroup.com</p>
                                        </div>
                                    </div>
                                </div>
								
                                
                                <div class="col-3">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-call"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3>Support</h3>
                                            <p>+91 91-1988-8893</p>
                                        </div>
                                    </div>
                                </div>
								
								
								<div class="col-5">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-address"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3>Office</h3>
                                            <p>Block E01, 3rd Floor, 
											GDA Tower Complex,<br>  
											Indira Bal Vihar,  
											Golghar, Gorakhpur, UP, 273001</p>
                                        </div>
                                    </div>
                                </div>
								
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

            <!-- Nav Bar Start -->
            <div class="nav-bar">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                        <a href="#" class="navbar-brand">MENU</a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto">
                                <a href="{{route('home')}}" class="nav-item nav-link @if(@$pageflag==0) active @endif">Home</a>               
                                <a href="{{route('aboutus')}}" class="nav-item nav-link @if(@$pageflag==1) active @endif">About Us</a>
                                <a href="{{route('services')}}" class="nav-item nav-link @if(@$pageflag==2) active @endif">Services</a>								
								<a href="{{route('clients')}}" class="nav-item nav-link @if(@$pageflag==3) active @endif">Clients</a>								
 
								<a href="{{route('jobs')}}" class="nav-item nav-link @if(@$pageflag==4) active @endif">Careers</a> 
								<a href="{{route('contactus')}}" class="nav-item nav-link @if(@$pageflag==5) active @endif">Contact Us</a> 
								
                            </div>
							 
							<div class="ml-auto">
						 
							<a class="btn" href="{{route('inquiry')}}">Inquiry</a>
							 
							</div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Nav Bar End -->