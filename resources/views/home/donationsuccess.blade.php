@extends('layouts.default')

@section('top_header') 

 
@stop

@section('content')
 
	  <style>
			 

	table.vitamins {
		margin: 20px 0 0 0;
		border-collapse: collapse;
		border-spacing: 0;
		background: #212121;
		color: #fff;
	}

	table.vitamins th, table.vitamins td {
		text-align: left;
	}

	table.vitamins thead {
		line-height: 12px;
		background: #2e63e7;
		text-transform: uppercase;
	}

	table.vitamins thead th {
		color: #fff;
		padding: 10px;
		letter-spacing: 1px;
		vertical-align: bottom;
	}

	table.vitamins thead th:nth-child(1) {
		width: 20%;
		text-align: left;
		padding-left: 20px;
	}

	table.vitamins thead th:nth-child(2) {
		width: 30%;
	}

	table.vitamins thead th:nth-child(3) {
		width: 35%;
	}

	table.vitamins thead th:nth-child(4) {
		width: 15%;
	}

	table.vitamins tbody {
		font-size: 1em;
		line-height: 15px;
	}

	table.vitamins tbody tr {
		border-top: 2px solid rgba(109, 176, 231, 0.8);
		transition: background 0.6s, color 0.6s;
	}

	table.vitamins tbody tr:nth-child(even) {
		background: rgba(255, 255, 255, 0.2);
	}

	table.vitamins tbody tr:hover {
		color: #000;
		background: rgba(255, 255, 255, 0.7);			 
	}

	table.vitamins tbody td {
		padding: 12px;
	}

	table.vitamins tbody tr:hover td:first-child {
		background: rgba(0,0,0,0);
	}

	table.vitamins tbody td:first-child {
		text-align: left;
		padding-left: 20px;				 
		background: rgba(109, 176, 231, 0.35);
		transition: backgrounf 0.6s;
	}

	table.vitamins tfoot {
		font-size: 0.8em;
	}

	table.vitamins tfoot tr {
		border-top: 2px solid #2e63e7;
	}

	table.vitamins tfoot td {
		color: rgba(255,255,215,0.6);
		text-align: left;
		line-height: 15px;
		padding: 15px 20px;
	}


	/* Mobile Layout */

	@media screen and (max-width: 400px) {
		h1 {
			font-size: 34px;
			line-height: 36px;
			padding-left: 15px;
		}

		article {
			margin: 10px 15px;
		}

		table.vitamins {
			font-size: 0.8em;
		}
	}
	</style>
	 <div class="faq wow fadeInUp">
		<div class="container"> 
		
		<div class="section-header text-center">
			<h2>Transaction Successful</h2>
		</div>	
		
		<p>
		 	 
		</p>
  
			<div class="row" style=""> 
			 
					<div class="col-md-12" id="printpdf"> 
					<?php 
					 
						 if(isset($additionalCharges)) {
							$additionalCharges=$additionalCharges;
							$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
						 }else{
							$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
						 }
						 $hash = hash("sha512", $retHashSeq);
				  
						 if($hash != $posted_hash) {
							 
					?>
						
						<p>Dear <strong>{{$firstname}}</strong>, </p>
						<p>Your transaction did not go through successfully from the payment gateway.</p>  
						
						<table class="vitamins" style="width:100%">	 
						
						<tr>
							<td width="50%"><strong>Information</strong></td>
							<td width="50%"><strong>Details</strong></td>
						</tr>
						
						<tr>
							<td width="50%">First name</td>
							<td width="50%">{{@$walfareObj->firstname}}</td>
						</tr>
						
						<tr>
							<td>Last name</td>
							<td>{{@$walfareObj->lastname}}</td>
						</tr>
						
						<tr>
							<td>Email</td>
							<td>{{@$walfareObj->email}}</td>
						</tr>
						
						<tr>
							<td>phone</td>
							<td>{{@$walfareObj->phone}}</td>
						</tr>
						
						<tr>
							<td>Address</td>
							<td>{{@$walfareObj->address}}</td>
						</tr>

						<tr>
							<td>City</td>
							<td>{{@$walfareObj->city}}</td>
						</tr>

						<tr>
							<td>State</td>
							<td>{{@$walfareObj->state}}</td>
						</tr>	
						
						<tr>
							<td>Zip</td>
							<td>{{@$walfareObj->zip}}</td>
						</tr>

						<tr>
							<td>Transaction Date</td>
							<td>{{@$walfareObj->transaction_date}}</td>
						</tr>
						
						<tr>
							<td>Donated Amount</td>
							<td>Rs. {{@$walfareObj->amount}}</td>
						</tr>
						
						<tr>
							<td>Transaction Reference Number</td>
							<td>{{@$walfareObj->trn}}</td>
						</tr>

						<tr>
							<td>Gateway Transaction Number</td>
							<td>{{@$walfareObj->gtn}}</td>
						</tr>

						<tr>
							<td>Payment Mode</td>
							<td>{{@$walfareObj->payment_mode}}</td>
						</tr>

						<tr>
							<td>Payment Status</td>
							<td>{{@$walfareObj->payment_status}}</td>
						</tr>
						
						
						<tr>
							<td>Reason</td>
							<td>Security breach</td>
						</tr>
						 
						</table>
						
						
						
						
						<a href="{{route('welfare')}}"><button  class="btn float-left mt-3" 
						style="background-color:#00C4CE; color:#FFF;" 
						type="button" id="sendMessageButton">Continue</button>
						</a>
						
						<button  class="btn float-left mt-3" 
						style="background-color:#00C4CE; color:#FFF;margin-left:10px;" 
						type="button" id="sendMessageButtonClick">Download</button>
					  
						
					<?php	}else{ ?>
						<p>Dear <strong>{{$firstname}}</strong>, </p>	   
						<p>Thank You for your donation.</p> 
						<p>Your payment status is <strong>{{$status}}</strong>.</p>	 
						<p>Your Transaction ID for this transaction is <strong>{{$txnid}}</strong>.</p>
						<p>We have received a payment of Rs. <strong>{{$amount}}</strong> </p> 
						 
						<div data-imgpath="{{@$certificate}}" id="printimg" style="background-size: contain;
								background-repeat: no-repeat;
								background-position: center;
								background-image:url('{{@$certificate}}'); 
								height:988px;
								width:100%;">	
							 
						</div>	
						 
						 
						<a href="{{route('welfare')}}"><button  class="btn float-left mt-3" 
						style="background-color:#00C4CE; color:#FFF;" 
						type="button" id="sendMessageButton">Continue</button>
						</a>
						
						<button  class="btn float-left mt-3" 
						style="background-color:#00C4CE; color:#FFF;margin-left:10px;" 
						type="button" id="sendMessageButtonClickDownload">Download</button>
						 
					<?php } ?>				 
					
						 
						 
					</div>
			</div> 

	</div>
</div> 

<script>
$(document).ready(function(){
	
	function downloadUrl(url, filename) {
	  let xhr = new XMLHttpRequest();
	  xhr.open("GET", url, true);
	  xhr.responseType = "blob";
	  xhr.onload = function(e) {
		if (this.status == 200) {
		  const blob = this.response;
		  const a = document.createElement("a");
		  document.body.appendChild(a);
		  const blobUrl = window.URL.createObjectURL(blob);
		  a.href = blobUrl;
		  a.download = filename;
		  a.click();
		  setTimeout(() => {
			window.URL.revokeObjectURL(blobUrl);
			document.body.removeChild(a);
		  }, 0);
		}
	  };
	  xhr.send();
	}
	
	$('#sendMessageButtonClickDownload').click(function () {
		downloadUrl($('#printimg').data('imgpath'), 'Appreciation-Certificate.jpg');		 
	}); 
	
	 
	
	$('#sendMessageButtonClick').click(function () {
		var can = document.querySelector('#printpdf');		 
		var html = "<html><head><title>Transaction Receipt</title></head><body>";			  
			html += $('#printpdf').html();
			html += "</body></html>";
		 var doc = new jsPDF("p", "pt"); 
		 
		  var options = {					
					 
				    margin: {horizontal: 10},				      
					theme: 'grid',
				     styles: {
						 fontSize: 7,
				         cellWidth: 400,
				         overflow: 'linebreak'
				     },
					 headStyles: {
						 fillColor:[9, 174, 236]
					 },
					columnStyles: { text: { cellWidth: 'auto' }},					  
					bodyStyles: { valign: 'top' },
				 };
		 doc.autoTable(options);		
		
		var specialElementHandlers = {
			'#editor': function (element, renderer) {
				return true;
			}
		};

		doc.fromHTML(html, 15, 15, {
			'width': '100%',
			'elementHandlers': specialElementHandlers 
				 
		});		   
		doc.save('Transaction-Receipt.pdf');
	});	
});
</script>	  

@stop 

	