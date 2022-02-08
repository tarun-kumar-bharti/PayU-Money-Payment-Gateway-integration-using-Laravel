<?php
namespace App\models;
use Illuminate\Database\Eloquent\Model;

class Welfare Extends BaseModel {

    protected $table = 'donations';
    protected $fillable = array(
								'id',							
								'firstname',
								'lastname',
								'email',
								'phone',
								'address',
								'city',
								'state',
								'zip',
								'transaction_date',
								'amount',
								'trn',
								'gtn',
								'payment_mode',
								'payment_status',
								'reason',
								'session_id',	
								'status'								
						);
 
	
	
	 static $STATUS_ARRAY = array(
									'A' => 'Active', 
									'D' => 'Deleted' 
							);
    const STATUS_ACTIVE         = 'A';  
    const STATUS_INACTIVE       = 'D';  
	 
}
 