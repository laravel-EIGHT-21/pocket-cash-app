<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Schools; 
use App\Models\SchoolStudent;
use App\Models\SchoolTransactions;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Models\questions;
use App\Models\posts;
use App\Models\apiTransfers;
use App\Products\Remittance;
use App\Exceptions\RemittanceRequestException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Container\Container;
use Illuminate\Contracts\Config\Repository;
use Ramsey\Uuid\Uuid;


class SchoolsController extends Controller
{



/**
 * Subscription Key .
 *
 * @var string
 */
protected $subscriptionKey;




/**
 * Remittance ID .
 *
 * @var string
 */
protected $clientId;




/**
 * apiKey.
 *
 * @var string
 */
protected $clientSecret;



/**
 * Callback URI.
 *
 * @var string
 */
protected $clientCallbackUri;



/**
 * token Uri .
 *
 * @var string
 */
protected $tokenUri;


  /**
     * HTTP client.
     *
     * @var \GuzzleHttp\ClientInterface
     */
    protected $client;

        /**
     * @return \GuzzleHttp\ClientInterface
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param \GuzzleHttp\ClientInterface $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }


/**
 *  party Id Type .
 *
 * @var string
 */
protected $partyIdType;



/**
 *  Target environment .
 *
 * @var string
 */
protected $environment;



    /**
     * Transact URI.
     *
     * @var string
     */
    protected $transactionUri;

    /**
     * Transaction status URI.
     *
     * @var string
     */
    protected $transactionStatusUri;

    /**
     * Account status URI.
     *
     * @var string
     */
    protected $accountStatusUri;

    /**
     * Account balance URI.
     *
     * @var string
     */
    protected $accountBalanceUri;

    /**
     * Account holder basic info URI.
     *
     * @var string
     */
    protected $accountHolderInfoUri;

    /**
     * @return string
     */
    public function getTransactionUri()
    {
        return $this->transactionUri;
    }

    /**
     * @param string $transactionUri
     */
    public function setTransactionUri($transactionUri)
    {
        $this->transactionUri = $transactionUri;
    }

    /**
     * @return string
     */
    public function getTransactionStatusUri()
    {
        return $this->transactionStatusUri;
    }



    /**
     * Constructor.
     *
     * @param array $headers
     * @param array $middleware
     * @param \GuzzleHttp\ClientInterface $client
     *
     * @uses \Illuminate\Contracts\Config\Repository
     * 
     * @throws \Exception
     */
   

     public function __construct($headers = [], $middleware = [], ClientInterface $client = null)
    {
        $config = Container::getInstance()->make(Repository::class);

        $this->subscriptionKey = $config->get('mtn-momo.products.remittance.key');
        $this->clientId = $config->get('mtn-momo.products.remittance.id');
        $this->clientSecret = $config->get('mtn-momo.products.remittance.secret');
        $this->clientCallbackUri = $config->get('mtn-momo.products.remittance.callback_uri');

        $this->tokenUri = $config->get('mtn-momo.products.remittance.token_uri');
        $this->transactionUri = $config->get('mtn-momo.products.remittance.transaction_uri');
        $this->transactionStatusUri = $config->get('mtn-momo.products.remittance.transaction_status_uri');
        $this->accountStatusUri = $config->get('mtn-momo.products.remittance.account_status_uri');
        $this->accountBalanceUri = $config->get('mtn-momo.products.remittance.account_balance_uri');
        $this->accountHolderInfoUri = $config->get('mtn-momo.products.remittance.account_holder_info_uri');
        $this->partyIdType = $config->get('mtn-momo.products.remittance.party_id_type');
        $this->environment = $config->get('mtn-momo.products.remittance.environment');

        //parent::__construct($headers, $middleware, $client);
    }





  /**
     * Get transaction status.
     *
     * @see https://momodeveloper.mtn.com/docs/services/remittance/operations/transfer-referenceId-GET Documentation
     *
     * @param  string $momoTransactionId That was returned by transact (transfer)
     *
     * @throws \Bmatovu\MtnMomo\Exceptions\RemittanceRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */



    public function ViewTranfsers($momoTransactionId)
    {



//$x_reference_id = env('MOMO_REMITTANCE_ID');
$environment1 = env('MOMO_ENVIRONMENT');

//$momoTransactionId = $x_reference_id;


      //https://sandbox.momodeveloper.mtn.com/remittance/v1_0/transfer/93b57ac3-b86f-4075-93ac-b1d74375eed2

      //$momoTransactionId = Uuid::uuid4()->toString();


      //$transactionStatusUri = str_replace('{momoTransactionId}', $momoTransactionId, $this->transactionStatusUri);

$transferstatus = 'https://sandbox.momodeveloper.mtn.com/remittance/v1_0/transfer/' ;
$transactionStatusUri = str_replace('{momoTransactionId}', $momoTransactionId, $this->transactionStatusUri);

try {
  $response =Http::get($transferstatus . $momoTransactionId, [
        'headers' => [
          'X-Target-Environment' => 'sandbox',
          'Ocp-Apim-Subscription-Key' => '6a02dac9a9df4f2d9cc1ee42e4d1c5ba',
        ],
    ]);

          $quizzes = json_decode($response->getBody(), true);

      return $quizzes;

     // dd($quizzes);
} catch (RequestException $ex) {
    throw new RemittanceRequestException('Unable to get transaction status.', 0, $ex);
}




      /*
        foreach($quizzes as $quiz){

               $apis= new apiTransfers();
                    $apis->amount = $quiz['amount'];
                    $apis->currency = $quiz['currency'];
                    $apis->financialTransactionId = $quiz['financialTransactionId'];
                    $apis->externalId = $quiz['externalId'];
                    $apis->status = $quiz['status'];
                    $apis->transfer_date = Carbon::now()->format('d F Y');
                    $apis->save();
               
        }
*/

        $allData = apiTransfers::all();
  return view('Admin_section.admins_view.api_transfer_status',compact('allData'));

    }







    public function ViewQuestions()
    {



        $response = Http::get('https://quizapi.io/api/v1/questions', [
            'apiKey' => 'anPs9BgDdDx0CnV0wQQeXks5UBHrSZVk3SRYm5KR',
            'limit' => 10,
        ]);
        $quizzes = json_decode($response->body());
        foreach($quizzes as $quiz){
                $question = new questions;
                $question->question = $quiz->question;
                $question->answer_a = $quiz->answers->answer_a;
                $question->answer_b = $quiz->answers->answer_b;
                $question->answer_c = $quiz->answers->answer_c;
                $question->answer_d = $quiz->answers->answer_d;
                $question->save();
        }
        $data['allData'] = questions::all();
  return view('Admin_section.admins_view.questions_api',$data);

    }








    
  public function ViewPosts()
  {
      $response = Http::get('https://jsonplaceholder.typicode.com/posts');

      $quizzes = json_decode($response->body());
      foreach($quizzes as $quiz){
              $question = new posts;
              $question->id = $quiz->id;
              $question->userId= $quiz->userId;
              $question->title = $quiz->title;
              $question->body = $quiz->body;
              $question->save();
      }
      $data['allData'] = posts::all();
return view('Admin_section.admins_view.posts_view',$data);

  }













    
    
    public function ViewSchools(){

		  $data['allData'] = Schools::all();
    	return view('Admin_section.schools_view.view_school',$data);
    }



        
    
    public function AddSchools(){

      //$data['allData'] = User::all();
        return view('Admin_section.schools_view.add_school');
      }
  




      
    public function StoreSchools(Request $request){

	
      $name = $request->name;
      $email = $request->email;
        $phone1 = $request->phone1;
        $phone2 = $request->phone2;
        $address = $request->address;

  
    
    $check = Schools::where('name',$name)->where('email', $email)->where('phone1', $phone1)->where('phone2', $phone2)->where('address', $address)->first();
  
    if($check == null){
  
  
        DB::transaction(function() use($request){
          

          $students = Schools::orderBy('id','DESC')->first();
      
              if ($students == null) {
              $firstReg = 0;
              $studentId = $firstReg+1;
              if ($studentId < 10) {
                $id_no = '0'.$studentId;
              }elseif ($studentId < 100) {
                $id_no = '00'.$studentId;
              }elseif ($studentId < 1000) {
                $id_no = '000'.$studentId;
              }
          
        
      
            }else{
           $students = Schools::orderBy('id','DESC')->first()->id;
             $studentId = $students+1;
             if ($studentId < 10) {
                $id_no = '0'.$studentId;
              }elseif ($studentId < 100) {
                $id_no = '00'.$studentId;
              }elseif ($studentId < 1000) {
                $id_no = '000'.$studentId;
              }

      
            } // end else 
      
            $final_id_no = $id_no;
      
            $user = new Schools();
            $user->school_id_no = $final_id_no;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone1 = $request->phone1;
        $user->phone2 = $request->phone2;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
    
  
        if ($request->file('school_logo_path')) {
          $file = $request->file('school_logo_path');
          $filename = date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/logo'),$filename);
          $user['school_logo_path'] = $filename;
        }
         $user->save();
  

  
        });
  
  
        $notification = array(
          'message' => 'New School Info Inserted Successfully',
          'alert-type' => 'success'
        );
  
        return redirect()->route('view.schools')->with($notification);
  
        
    }
  
  
    else{
    
      $notification = array(
        'message' => 'SCHOOL`S RECORD ALREADY EXISTS!!!',
        'alert-type' => 'error'
      );
      
      return redirect()->back()->with($notification);
      
      }
    
  
  
      } // End Method 
  





      
    
    public function EditSchools($id){
      $data['editData'] = Schools::findOrFail($id);
      
  
        return view('Admin_section.schools_view.edit_school',$data);
  
      }




      

    
    public function UpdateSchools(Request $request, $id){
    
    	DB::transaction(function() use($request,$id){
    	 
        $user = Schools::where('id',$id)->first();   
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone1 = $request->phone1;
        $user->phone2 = $request->phone2;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);

		if ($request->file('school_logo_path')) {
      $file = $request->file('school_logo_path');
      @unlink(public_path('upload/logo/'.$user->school_logo_path));
      $filename = date('YmdHi').$file->getClientOriginalName();
      $file->move(public_path('upload/logo'),$filename);
      $user['school_logo_path'] = $filename;
    }
	
 	    $user->save();



    	});
         

    	$notification = array(
    		'message' => 'School Info Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('view.schools')->with($notification);


    }// END METHOD



    
	public function inactiveSchools($id)
  { 
      Schools::findOrFail($id)->update(['status' => 0]);
          $notification = array(
              'message' => 'School Status Deactivated...',
              'alert-type' => 'error'
          );
          return redirect()->back()->with($notification);

  }


  public function activeSchools($id)
  {
      Schools::findOrFail($id)->update(['status' => 1]);
      $notification = array(
          'message' => 'School Status Activated...',
          'alert-type' => 'success'
      );
      return redirect()->back()->with($notification);

  }




        
    public function ViewSchoolStudents(){

		$data['allData'] = SchoolStudent::all();
    	return view('Admin_section.schools_view.view_students',$data);
    }

    
        
    public function ViewSchoolTransactions(){

		$data['allData'] = SchoolTransactions::all();
    	return view('Admin_section.transactions.view_transactions',$data);
    }










}
