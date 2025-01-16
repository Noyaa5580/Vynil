<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;

class RegAuthController extends Controller
{
    public function register(Request $request)
    {

        $request->password = md5($request->password);
        DB::table('users')->insert(array(
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'phone' => $request->phone,
            'email' => $request->email,
            'login' => $request->login,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'role' => $request->role,
        ));
        return response()->json(['status' => 'sucsess', 200]);
    }
    public function auth(Request $request)
    {
        $password = $request->password;
        $pass = password_hash($request->password, PASSWORD_DEFAULT);
        $verify = password_verify($password, $pass);
        $user = DB::table('users')->where('login', '=', $request->login)->first();
        if ($user && $verify == true) {
            setcookie('id', $user->id, time() + 3600, '/');
            setcookie('role', $user->role, time() + 3600, '/');
        } else {
            return response()->json(['message' => 'Логин или пароль введены неправильно. Повторите попытку'], 500);
        }
    }
    public function logout()
    {
        setcookie('id', 'id', time() - 86400 * 7, '/');
        setcookie('role', 'role', time() - 86400 * 7, '/');
    }
}
