@extends('layouts.default')

@section('top_header') 

 
@stop

@section('content')
 
	 
	 <div class="faq wow fadeInUp">
		<div class="container"> 
		
		<div class="section-header text-center">
			<h2>Processing Payment...</h2>
		</div>	
		 
		<p style="text-align:center;">
				<br> 
				You will now be redirected to the payment gateway for further processing. <br>
				This may take some time.<br>
                Please do not hit Back or Refresh button while the transaction is under process.
				
				<br><br>
				<img src="{{asset('images/horizontal_loading.gif')}}" alt="Loading">
		</p>
  
			<div class="row" style=""> 
			 
					<div class="col-md-12"> 
					
					
                    <form action="{{$action}}" method="post" name="paymentForm" id="paymentForm">
                        <input type="hidden" name="key" value="{{$posted['key']}}"/>
                        <input type="hidden" name="hash" value="{{$hash}}"/>
                        <input type="hidden" name="txnid" value="{{$posted['txnid']}}"/>
                        <input type="hidden" name="surl" value="{{$posted['surl']}}"/>
                        <input type="hidden" name="furl" value="{{$posted['furl']}}"/>
                        <input type="hidden" name="service_provider" value="payu_paisa"/>

                        <input type="hidden" name="amount" value="{{$posted['amount']}}"/>
                        <input type="hidden" name="productinfo" value="{{$posted['productinfo']}}"/>
                        <input type="hidden" name="firstname" value="{{$posted['firstname']}}"/>
                        <input type="hidden" name="address1" value=""/>
                        <input type="hidden" name="city" value=""/>
                        <input type="hidden" name="country" value=""/>
                        <input type="hidden" name="email" value="{{$posted['email']}}"/>
                        <input type="hidden" name="phone" value="{{$posted['phone']}}"/>
						<input type="hidden" name="_token" value="{{$posted['_token']}}"/>
						 
                    </form>
						 
						 
					</div>
			</div> 

	</div>
</div> 

<script>
    var hash = '{{ $hash }}';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.paymentForm;
      payuForm.submit();
    } 
 

	$(document).ready(function(){		
		$('#paymentForm').submit(function(){
			submitPayuForm();		 
		});
		   
		 $('#paymentForm').trigger('submit');
	});
	
	 
</script>	   

@stop 

	