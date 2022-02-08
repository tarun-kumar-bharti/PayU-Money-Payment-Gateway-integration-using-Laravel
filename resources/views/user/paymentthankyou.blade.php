@extends('layouts.default')

@section('top_header') 

 
@stop

@section('content')


<!-- Contact Start -->
			<div class="contain-body">
				<div class="row" style="margin:0px 0px;">
					<div class=" col-md-7 transaction-status">
						<div class="row">
							<div class="col-md-12" style="text-align:center;background-color:#C0C0C0;border-bottom:1px solid #d9ddd6;">
								<p style="margin:10px 0px;">Transaction status</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12" style="margin:10px 0px;">
								<p>
								Thank you. Your payment has been successfully received with the following details. 
								Please quote your transaction reference number for any queries relating to this request.
								Payment will be made within 2 working days of this transaction being executed.
								</p>
							</div>
						</div>
						<div class="row" style="font-weight:bold;">
							<div class=" col-md-12">
								<p>Transaction Status: Success</p>
								<p>Transaction Reference Number: VICI0003566350</p>
								<p>Transaction Date and Time: 30-05-2021 01:03:01</p>
								<p>Credit Card No.: XXXX XXXX XXXX 1234</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p>Payment Amount ($): 20.00</p> 
								<p>E-mail Id.: ritetome.amit@gmail.com</p>
								<p>Mobile No.: 9971006580</p>
								<p>Pay from: Payment Gateway</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 payment-plan-section">
						<div class="row" style="border:0px solid #d9ddd6;height:45px;background-color:#C0C0C0;">
							<div class="col-md-12">
								<p style="margin:10px 0px;">Your Plan Summary: {{$subscpObj->planname}}</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p style="margin:25px 0px 0px 0px;">Duration</p>
								@if($subscpObj->plan_duration==1)
									<p>1 month</p>
								@elseif($subscpObj->plan_duration>1 && $subscpObj->plan_duration<=11)
									<p>{{$subscpObj->plan_duration}} months</p>
								@else 
									<p>1 year</p>	
								@endif
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p style="margin:25px 0px 0px 0px;">Total amount</p>
								@if($subscpObj->plan_duration==12)	
									<p>${{@$planobj->yearly_price}}</p>
								@else 
									<p>${{@$planobj->monthly_price*$subscpObj->plan_duration}}</p>
								@endif
							</div>
						</div>
					</div>
				</div>
			
			</div>
            <!-- Contact End -->


@stop