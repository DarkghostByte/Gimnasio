<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\Token;
use Illuminate\Support\Facades\Mail;


class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth',
        ['except'=>['store']]
    );
    }
    

    public function index()
    {
        $data = User::all();
        return response()->json([
            'status>'=>'success♥',
            'data'=> $data
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reglas = Validator::make($request->all(),[
            'nameUser'=>'required|min:3',
            'lastnameUser1'=>'required|min:3',
            'lastnameUser2'=>'required|min:3',
            'email'=>'required|email',
            'password'=>'required|min:3|required_with:password2|same:password2',
            'password2'=>'required'

        ]);
        if($reglas->fails()){
            return response()->json([
                'status'=>'failed',
                'message'=>'Validation Error',
                'errors'=>$reglas->errors()
            ],201);
        }else{
            //INSERTAR REGISTRO
            $user = new User();
            $user -> nameUser = $request->nameUser;
            $user -> lastnameUser1 = $request->lastnameUser1;
            $user -> lastnameUser2 = $request->lastnameUser2;
            $user -> email = $request->email;
            $user -> password = Hash::make($request->password);
            $user -> save();

            $token1 = rand(100000,999999);
            $token = new Token();
            $token -> email = $request->email;
            $token -> token = $token1;
            $token -> save();

            $this->sendEmail($token1, $request->nameUser, $request->lastnameUser1, $request->lastnameUser2, $request);

            return response()->json([
                'status'=>'success'
            ]);

        }
    }

    public function verifyEmail(Request $request){
        $reglas = Validator::make($request->all(),[
            'token'=>'required|min:3',
            'email'=>'required|email',
            

        ]);
        if($reglas->fails()){
            return response()->json([
                'status'=>'failed',
                'message'=>'Validation Error',
                'errors'=>$reglas->errors()
            ],201);
        }else{
          $token = Token::where('email',$request->email)
          ->where('token',$request->token)
          ->get()
          ->first();

          if($token == null){
            return response()
            ->json([
                'status'=>'failed',
                'message'=>'Invalid Token'
            ],201);

          }else{
            $user= User::where('email',$request->email)
            ->get()->first();
            $user -> email_verified_at = date('Y-m-d h:m:s');
            $user->save();
            return response() ->json([
                'status'=>'success',
                'message'=>'Email Verified'
            ],200);
          }
        }
    }//llave verify

  
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function sendEmail($token, $nameUser, $lastnameUser1, $lastnameUser2, $request) {
        $email = $request->email; 
        $data = [
            'nameUser' => $nameUser,
            'lastnameUser1' => $lastnameUser1,
            'lastnameUser2' => $lastnameUser2,
            'token' => $token
        ];
    
        Mail::send('mails.register', $data, function($message) use ($email) {
            $message->to($email, "Codigo de verificacion")
                ->subject('Gracias por registrarte');
            $message->from('20CG0023@itsncg.edu.mx', 'Ez-Biker');
        });
    }
}
