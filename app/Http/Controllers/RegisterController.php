<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Milon\Barcode\DNS1D;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Generar un código de barras único para el usuario
        $barcodeValue = $this->generateUniqueBarcode();

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->barcode = $barcodeValue;
        $user->save();
        
        return redirect()->route('login')->with('success', '¡Registro exitoso! Por favor inicia sesión.');
    }


    private function generateUniqueBarcode()
    {
        $barcodeValue = $this->generateRandomBarcode();

        while (User::where('barcode', $barcodeValue)->exists()) {
            $barcodeValue = $this->generateRandomBarcode();
        }

        return $barcodeValue;
    }

    private function generateRandomBarcode()
    {

        return mt_rand(10000000, 99999999);
    }
}
