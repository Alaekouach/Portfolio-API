<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth; 
use App\Models\User; 
use App\Models\Apropos;
use Validator;
use Illuminate\Support\Str;


class AuthController extends Controller 
{
  
   private $apiToken;
    public function __construct()
    {
        $this->apiToken = uniqid(base64_encode(Str::random(40)));
    }
  /** 
   * Register API 
   * 
   * @return \Illuminate\Http\Response 
   */ 
    public function register(Request $request) 
    { 
    
        $validator = Validator::make($request->all(), [ 
        'name' => 'required', 
        'lastname' => 'required',
        'email' => 'required|email', 
        'password' => 'required', 
        
        ]);
        if ($validator->fails()) { 
        return response()->json(['error'=>$validator->errors()]);
        }
        $postArray = $request->all(); 
    
        $postArray['password'] = bcrypt($postArray['password']); 
        $user = User::create($postArray); 
        
        $success['token'] = $this->apiToken;	
        $success['name'] =  $user->name;
        $success['lastname'] =  $user->lastname;



        $tab=new Apropos;
        $tab->nom =  $user->name;
        $tab->prenom =  $user->lastname;
        $tab->email =  $user->email;
        $tab->user_id =  $user->id;
        $tab->save();
        


        return response()->json([
        'status' => 'success',
        'data' => $success,
        ]); 

    }



    /** 
    *Login API 
    * */ 

    public function login(Request $request){ 
        //User check
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
        $user = Auth::user(); 
        //Setting login response 
        $success['token'] = $this->apiToken;
        $success['name'] =  $user->name;
        return response()->json([
            'status' => 'success',
            'token' => $success ,
            'data' =>  $user
        ]); 
        } else { 
        return response()->json([
            'status' => 'error',
            'data' => 'Unauthorized Access'
        ]); 
        } 
    }


    public function logoutApi()
    { 
        if (Auth::check()) {
           Auth::user()->AauthAcessToken()->delete();
        }
    }


    public function index($user_id)
    {
        //

        $u=User::find($user_id); 
        return response()->json($u,200);
    }

    public function update(Request $request,$user_id)
    {
        //

        $u=User::find($user_id);
        $u->update($request->all());

        
        return response()->json($u,200);
    }

}



