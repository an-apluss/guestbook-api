<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Signature;

class SignatureController extends Controller
{
    public function index() {

        $signatures = Signature::all();
    
        return response()->json([
          'status' => 'success',
          'data' => $signatures
        ],200);
    }

    public function create(Request $request) {
        $validation = Validator::make($request->all(), [
            'first_name' => 'string|required', 
            'last_name' => 'string|required', 
            'email' => 'string|required|unique:signatures', 
            'message' => 'string|required'
        ]);
      
        if ($validation->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validation->errors()
            ], 422);
        }

        $signature = Signature::create($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $signature,
            'message' => 'Signature successfully created'    
        ], 201);
    }

    public function read($signatureId) {
        $signature = Signature::find($signatureId);

        if (!$signature) {
            return response()->json([
                'status' => 'error',
                'error' => 'Signature can not be found'
            ], 404);
        }
    
        return response()->json([
          'status' => 'success',
          'data' => $signature
        ], 200);
    }

    public function update(Request $request, $signatureId) {
        $signature = Signature::find($signatureId);

        if (!$signature) {
            return response()->json([
                'status' => 'error',
                'error' => 'Signature can not be found'
            ], 404);
        }

        $validation = Validator::make($request->all(), [
            'first_name' => 'string', 
            'last_name' => 'string', 
            'email' => 'string', 
            'message' => 'string'
        ]);
    
        if ($validation->fails()) {
          return response()->json([
            'status' => 'error',
            'error' => $validation->errors()
          ], 422);
        }
        
        Signature::where('id', $signatureId)
        ->update([
            'first_name' => is_null($request->first_name) ? $signature->first_name : $request->first_name, 
            'last_name' => is_null($request->last_name) ? $signature->last_name : $request->last_name, 
            'email' => is_null($request->email) ? $signature->email : $request->email, 
            'message' => is_null($request->message) ? $signature->message : $request->message
        ]);

        return response()->json([
        'status' => 'success',
        'message' => 'Signature successfully updated'
        ], 202);
    }

    public function delete($signatureId) {
        $signature = Signature::find($signatureId);

        if (!$signature) {
            return response()->json([
                'status' => 'error',
                'error' => 'Signature can not be found'
            ], 404);
        }

        $signature->delete();
    
        return response()->json([
          'status' => 'success',
          'message' => 'Signature successfully deleted'
        ], 200);
    }
}

