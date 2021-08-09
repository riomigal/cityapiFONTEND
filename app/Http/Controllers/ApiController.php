<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    /**
     * apiRequestCheck: Checks if api key exist and increments by request by 1
     *
     * @return void
     */
    public function apiRequestCheck(Request $request)
    {
        $api_key = $request->get('api_key');
        $user = User::where('api_key', $api_key)->first();
        if ($user) {
            $user->request_counter = $user->request_counter + 1;
            $user->save();
            if ($user->request_counter > 100) {
                return response()->json(['message' => 'Bad request', 'errors' => ['Request limit reached, please write admin to increase limit'], 'statusCode' => 400]);
            }
            return response()->json(['message' => 'success', 'errors' => [], 'statusCode' => 200]);
        }
        return response()->json(['message' => 'Bad request', 'errors' => ['Wrong Api Key!'], 'statusCode' => 403]);
    }
}