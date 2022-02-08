 <!-- Footer Start -->
            <div class="footer wow fadeIn" data-wow-delay="0.3s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-contact">
                                <h2>Address & Contact</h2>
                                <p><i class="fa fa-map-marker-alt"></i>
								Block E01, 3rd Floor, GDA Tower Complex,Indira Bal Vihar, Golghar, Gorakhpur, UP, 273001</p>
                                <p><i class="fa fa-phone-alt"></i>+91 91-1988-8893</p>
								<p><i class="fa fa-phone-alt"></i>+91 99-1961-2834</p>                               
								<p><i class="fa fa-envelope"></i>info@suchasgroup.com</p>
                                <div class="footer-social">
                                    <!--a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a-->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link">
                                <h2>Services Areas</h2>
                                <a href="{{route('healthcare')}}">Healthcare</a>                               
                                <a href="{{route('constructions')}}">Constructions</a> 
								<a href="{{route('associates')}}">Associates</a>
								<a href="{{route('infomedia')}}">Infomedia</a>
								<a href="{{route('technologies')}}">Software</a>								
								<a href="{{route('welfare')}}">Welfare</a> 
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link">
                                <h2>Useful Pages</h2>
                                <a href="{{route('aboutus')}}">About Us</a> 
                                <a href="{{route('contactus')}}">Contact Us</a>
								<a href="{{route('clients')}}">Clients</a>
								<a href="{{route('jobs')}}">Careers</a>
								<a href="{{route('faqs')}}">Faqs</a>
								<a href="{{route('inquiry')}}">Inquiry</a> 
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="newsletter"> 
                                
								<p>
                                    Subscribe to our Newsletter
                                </p>
								<p>
									<img src="{{asset('images/news.png')}}" style="width:100%;border:2px solid #000" />
								</p>
								{{Form::open(array('id'=>'newsletter','url'=>route('submitnewsletter.post'), 'method'=>'post'))}}
               
								
                                <div class="form">
                                    <input required type="email" name="newsletteremail" style="font-size:12px;" class="form-control" placeholder="Enter your email id">
                                    <button class="btn">Submit</button>
                                </div>								
								<br>
								<div id="successmsg"></div>
								 
								{{Form::close()}}  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container footer-menu">
                    <div class="f-menu">                       
                        <a href="{{route('privacypolicy')}}">Privacy policy</a>     
						<a href="{{route('tandc')}}">Terms & Conditions</a>     	
                        <a href="{{route('complaint')}}">Register Complaint</a>  
                    </div>
                </div>
                <div class="container copyright">
                    <div class="row">
                        <div class="col-md-12">
                            <p>&copy; <a href="/">Suchas Group</a>, All Right Reserved.</p>
                        </div>
                        <div class="col-md-12">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
  <!-- Footer End -->
  
 <script>
$(document).ready(function(){
 
	$('#newsletter').submit(function(e){  
		 User.userNewsLetter($(this),e); 
		 e.preventDefault(); 
	}); 
 });
</script>	

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyDMrCgWM2P7ATKiyxOyrpnzYLBIfUGmyYY",
    authDomain: "suchas-group.firebaseapp.com",
    projectId: "suchas-group",
    storageBucket: "suchas-group.appspot.com",
    messagingSenderId: "626592012721",
    appId: "1:626592012721:web:fd27379ac5336d11b44590",
    measurementId: "G-ZYWQD9ZEQ3"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>   
