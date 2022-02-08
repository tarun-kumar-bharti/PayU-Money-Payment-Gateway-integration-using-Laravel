<?php

namespace App\Http\Controllers;
use Auth;
use View;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\models\User;  

use App\models\Welfare;

 
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use File;
use stdClass;
use Session;
 
class HomeController extends BaseController
{
    public $loggedinUsername;
    public $loggedinUserEmail;
    public $loggedinUserrole;
    public $loggedinUserrolearray;
    public $loggedinUserrolecode;
    public $loggedinUserid; 
    public $reporting_to;
  
  
    public function __construct() { 
		 
        $user = Auth::user(); 
		if($user){
			$this->loggedinUserid     = $user->id;
			$this->loggedinUsername   = $user->name;
			$this->loggedinUserEmail  = $user->email;  
			$roles    = Auth::user()->roles;
		  
			
			$brancharray = array();
			$reportingarray = array();
			$approverarray = array();
			$membersUnderLoggeninUser = array();
			 
			 
			$this->loggedinUserrolearray = array();
			if(count($roles)>1){ 
				foreach($roles as $role){ 
					$this->loggedinUserrolearray[$role->name] = $role->display_name;
					$reportingarray[] = $role->pivot->reporting_to;
					$approverarray[]  = $role->pivot->approver_id; 
					 
				} 
			}else{ 
				$this->loggedinUserrolearray[$roles[0]->name]= $roles[0]->display_name;
				$reportingarray[] = $roles[0]->pivot->reporting_to;
				$approverarray[]  = $roles[0]->pivot->approver_id; 
			}
			
			
		   $this->loggedinUserrolecode = $roles[0]->name;
		   $this->loggedinUserrole     = $roles[0]->display_name; 
		   $this->reporting_to         = $reportingarray;
		   $this->approver_id          = $approverarray; 
		}
 
       View::share ( 'loggedinUsername',  $this->loggedinUsername);
       View::share ( 'loggedinUserEmail', $this->loggedinUserEmail); 
       View::share ( 'loggedinUserrole',  $this->loggedinUserrole);
       View::share ( 'loggedinUserrolearray',  $this->loggedinUserrolearray);
       View::share ( 'loggedinUserrolecode',  $this->loggedinUserrolecode);
       
      
       View::share ( 'reporting_to',  $this->reporting_to);
  
    }  
	 
	public function showWelfare (){		
		$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		$MERCHANT_KEY 	= getenv('MERCHANT_KEY');
		$SALT 			= getenv('PAYMENT_SALT');		
		
		$value = Session::get('session_id');		 
		if($value){			
			$walfareObj = Welfare::where('session_id','=',$value)
								  ->where('payment_status','=','Pending')
								  ->orderBy('id','desc')
								  ->first();
			if(count((array)$walfareObj)==0){				
				$walfareObj = new Welfare();				
			}
		}else{			 
			$walfareObj = new Welfare();			
		}
		 
		return view('walfare')
				->with('pageflag',2)
				->with('txnid',$txnid)
				->with('walfareObj',$walfareObj)
				->with('MERCHANT_KEY',$MERCHANT_KEY);
	}
	
	public function submitDonation(Request $request){ 
		$formData= $request->all(); 		 
		$MERCHANT_KEY 	= getenv('MERCHANT_KEY');
		$SALT 			= getenv('PAYMENT_SALT');
		$PAYU_BASE_URL 	= getenv('PAYMENT_URL');
				
		$action = '';
		$posted = array();
		if(!empty($formData)) {		
		  foreach($formData as $key => $value) {    
			$posted[$key] = $value;			
		  }
		}
				
		$formError = 0;
		
		if(empty($posted['txnid'])) {		   
			$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		} else {
			$txnid = $posted['txnid'];
		}
		
		$hash = '';
	 
		$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
		
		if(empty($posted['hash']) && sizeof($posted) > 0) {
			  if(empty($posted['key'])			     
			  || empty($posted['txnid'])
			  || empty($posted['amount'])
			  || empty($posted['firstname'])
			  || empty($posted['email'])
			  || empty($posted['phone'])
			  || empty($posted['productinfo'])
			  || empty($posted['surl'])
			  || empty($posted['furl'])
			  || empty($posted['service_provider'])
			  ){
				$formError = 1;
			  }else{
				$hashVarsSeq = explode('|', $hashSequence);
				$hash_string = '';	
				foreach($hashVarsSeq as $hash_var) {
				  $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
				  $hash_string .= '|';
				}

				$hash_string .= $SALT;
				$hash = strtolower(hash('sha512', $hash_string));
				$action = $PAYU_BASE_URL . '/_payment';
			  }
		} elseif(!empty($posted['hash'])) {
			$hash   = $posted['hash'];
			$action = $PAYU_BASE_URL . '/_payment';
		}		
		
		$value = Session::get('session_id');
		$id = time();
		if($value){			
			$walfareObj = Welfare::where('session_id','=',$value)
								  ->where('payment_status','=','Pending')
								  ->orderBy('id','desc')
								  ->first();
			if(count((array) $walfareObj)==0){
				Session::put('session_id', $id);	
				$walfareObj = new Welfare();
				$walfareObj->session_id = $id;	
			}
		}else{			 
			Session::put('session_id', $id);	
			$walfareObj = new Welfare();
			$walfareObj->session_id = $id;
		}
				
		$walfareObj->firstname 	= strtoupper($posted['firstname']);
		$walfareObj->lastname 	= strtoupper($posted['lastname']);
		$walfareObj->email 		= $posted['email'];
		$walfareObj->phone 		= $posted['phone'];
		$walfareObj->address 	= strtoupper($posted['address']);
		$walfareObj->city 		= strtoupper($posted['city']);
		$walfareObj->state 		= strtoupper($posted['state']);
		$walfareObj->zip 		= $posted['zip'];
		$walfareObj->transaction_date = date('Y-m-d');
		$walfareObj->amount 	= $posted['amount'];
		$walfareObj->trn 		= $posted['txnid'];
		$walfareObj->payment_status = 'Pending';
		
		$walfareObj->save();
		 
		return View::make('paymentprocess', array('posted' => $posted, 'hash' => $hash, 'action'=>$action));  	
	}
	
	public function showFailure(Request $request){		
		$formData	= $request->all();	 
		$posted = array();
		if(!empty($formData)) {		
		  foreach($formData as $key => $value) {    
			$posted[$key] = $value;			
		  }
		} 
		if(isset($formData["additionalCharges"])){
			$additionalCharges =  $formData["additionalCharges"];
		}
		 
		
		$firstname	= "Guest";
		$amount		= '';
		$txnid		= '';
		$posted_hash= '';
		$key		= '';
		$productinfo= '';
		$email		= '';
		$salt		= getenv('PAYMENT_SALT');
		$walfareObj =  array();	
		 
		if(isset($formData['status']) && $formData['status']!=''){ 
			$status		= $formData["status"];
			$firstname	= $formData["firstname"];
			$amount		= $formData["amount"];
			$txnid		= $formData["txnid"];
			$posted_hash= $formData["hash"];
			$key		= $formData["key"];
			$productinfo= $formData["productinfo"];
			$email		= $formData["email"];
			$salt		= getenv('PAYMENT_SALT');
			$error 		= false;
			
			 	
			$walfareObj = Welfare::where('trn','=',$txnid)									
								->orderBy('id','desc')
								->first();							
			$walfareObj->gtn 			= $formData['mihpayid'];
			$walfareObj->payment_status = 'Failed';
			$walfareObj->payment_mode  	= $formData['mode'];
			$walfareObj->reason		   	= $formData['field9'];
			$walfareObj->save();			 
			
		}else{
			$status		= 'Failed';			 
			$error		= true;	 
		}
			
		return view('home/donationfailed',array('status'      => $status,											
											'firstname'  => $firstname,
											'amount'     => $amount,
											'txnid'      => $txnid,
											'posted_hash'=> $posted_hash,
											'key'        => $key,
											'productinfo'=> $productinfo,
											'email'      => $email,
											'salt'       => $salt,
											'error'		 => $error,
											'walfareObj' => $walfareObj
											)
					)->with('pageflag',2);
	}
	
	public function showSuccess (Request $request){	
		$formData	= $request->all();	 
		$posted = array();
		if(!empty($formData)) {		
		  foreach($formData as $key => $value) {    
			$posted[$key] = $value;			
		  }
		} 
		if(isset($formData["additionalCharges"])){
			$additionalCharges =  $formData["additionalCharges"];
		}	
		 
		if(isset($formData['status']) && $formData['status']!=''){ 
			$status		= $formData["status"];
			$firstname	= $formData["firstname"];
			$amount		= $formData["amount"];
			$txnid		= $formData["txnid"];
			$posted_hash= $formData["hash"];
			$key		= $formData["key"];
			$productinfo= $formData["productinfo"];
			$email		= $formData["email"];
			$salt		= getenv('PAYMENT_SALT');		
			 	
			$walfareObj = Welfare::where('trn','=',$txnid)									
								->orderBy('id','desc')
								->first();							
			$walfareObj->gtn 			= $formData['mihpayid'];
			$walfareObj->payment_status = 'Success';
			$walfareObj->payment_mode  	= $formData['mode'];
			$walfareObj->reason		   	= $formData['field9'];
			$walfareObj->save();			
		} 
		 
		return view('home/donationsuccess',array('status'      => $status,									
												'firstname'  => $firstname,
												'amount'     => $amount,
												'txnid'      => $txnid,
												'posted_hash'=> $posted_hash,
												'key'        => $key,
												'productinfo'=> $productinfo,
												'email'      => $email,
												'salt'       => $salt,										
												'walfareObj' => $walfareObj
											)
					)->with('pageflag',2);	
		 
	} 
}
