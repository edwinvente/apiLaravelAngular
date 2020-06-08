<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        //recoger los datos
        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        if (!empty($params) && !empty($params_array)) {
            //limpiar datos
            $params_array = array_map('trim', $params_array);

            //validar los datos
            $validate = \Validator::make($params_array, [
                'name'      => 'required|alpha',
                'surname'   => 'required|alpha',
                'email'     => 'required|email|unique:users',
                'password'  => 'required'
            ]);

            if ($validate->fails()) {
                $data = [
                    'status'    => 'error',
                    'code'      => 404,
                    'message'   => 'Registro invalido',
                    'errors'    => $validate->errors()
                ];
            }else{
                //validacion exitosa, guardar registro
                $pwd = password_hash($params->password, PASSWORD_BCRYPT, ['cost' => 4]);

                $user = new User();
                $user->name = $params_array['name'];
                $user->surname = $params_array['surname'];
                $user->role = 'ROLE_USER';
                $user->email = $params_array['email'];
                $user->description = 'indefinida';
                $user->image = 'none.png';
                $user->password = $pwd;
                
                $user->save();

                $data = [
                    'status'    => 'success',
                    'code'      => 200,
                    'message'   => 'Registro exitoso',
                    'user'      => $user
                ];
            }
        }else{
            $data = [
                'status'    => 'error',
                'code'      => 404,
                'message'   => 'No hay datos para procesar'
            ]; 
        }

        return response()->json($data, $data['code']);

    }

    public function login(Request $request)
    {
        var_dump($request->all());
    }
}
