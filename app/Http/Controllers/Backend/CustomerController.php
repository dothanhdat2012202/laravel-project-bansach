<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    private $userReponsitory;

    public function __construct()
    {
        
    }
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];
        $user = User::where('email', $credentials['email'])->first();
        if ($user && $user->user_agent == 3) {
            if (Auth::attempt($credentials)) {
                return redirect()->route('product.index')->with('success', 'Đăng nhập thành công');
            } else {
                return redirect()->route('product.index')->with('error', 'Email hoặc mật khẩu không chính xác');
            }
        } else {
            return redirect()->route('product.index')->with('error', 'Tài khoản không đúng');
        }
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $payload= $request->except(['_token', 'customer']);
            //dd($payload);
            $user = new User();
            $user->forceFill($payload);
            $user->gender = $payload['gender'] == 'Nam' ? 0 : 1;
            $user->birthday = $this->convertBirthdayDate($payload['birthday']);
            $user->password = bcrypt($payload['password']);
            //$user->fullname=$payload['name'];
          
            $user->save();
            DB::commit();
            return redirect()->route('product.index')->with('success', 'Đăng ký thành công');
        }catch(\Exception $e)
        {
            DB::rollBack();
            echo $e->getMessage();
            die();
            return false;
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('product.index');
    }
    private function convertBirthdayDate($birthday = '')
    {
        $carbonDate=Carbon::createFromFormat('Y-m-d',$birthday);
        $birthday=$carbonDate->format('Y-m-d H:i:s');
        return $birthday;
    }
}
