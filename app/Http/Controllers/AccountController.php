<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('account');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Walidacja danych
        $validator = $this->validator($request->all(), $user->id);

        // Jeśli walidacja nie przejdzie
        if ($validator->fails()) {
            return redirect()->route('account')
            ->withErrors($validator)
            ->withInput();
        }

        // Aktualizacja danych użytkownika
        if ($request->filled('login')) {
            $user->login = $request->input('login');
        }
        if ($request->filled('email')) {
            $user->email = $request->input('email');
        }
        if ($request->filled('name')) {
            $user->name = $request->input('name');
        }
        if ($request->filled('surname')) {
            $user->surname = $request->input('surname');
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        if ($request->filled('city')) {
            $user->city = $request->input('city');
        }
        if ($request->filled('street')) {
            $user->street = $request->input('street');
        }
        if ($request->filled('houseNumber')) {
            $user->houseNumber = $request->input('houseNumber');
        }
        if ($request->filled('apartmentNumber')) {
            $user->apartmentNumber = $request->input('apartmentNumber');
        }

        // Zapisz zaktualizowane dane
        $user->save();

        // Przekierowanie po udanej aktualizacji
        return redirect()->route('account')->with('success', 'Dane zostały zaktualizowane.');
    }


    /**
     * Walidacja danych użytkownika.
     *
     * @param  array  $data
     * @param  int  $userId
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $userId)
    {
        $rules = [];

        if (isset($data['login'])) {
            $rules['login'] = ['required', 'string', 'min:8', 'max:255', 'unique:users,login,' . $userId];
        }
        if (isset($data['email'])) {
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $userId];
        }
        if (isset($data['name'])) {
            $rules['name'] = ['required', 'string', 'max:255', 'regex:/^[A-ZŁŚŻŹĆŃ][a-złśżźąćęóń]+$/'];
        }
        if (isset($data['surname'])) {
            $rules['surname'] = ['required', 'string', 'max:255', 'regex:/^[A-ZŁŚŻŹĆŃ][a-złśżźąćęóń]+$/'];
        }
        if (isset($data['password'])) {
            $rules['password'] = ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).+$/'];
        }
        if (isset($data['city'])) {
            $rules['city'] = ['required', 'string', 'max:255', 'regex:/^[A-ZŁŚŻŹĆŃ][a-złśżźąćęóń]+$/'];
        }
        if (isset($data['street'])) {
            $rules['street'] = ['required', 'string', 'max:255', 'regex:/^[A-ZŁŚŻŹĆŃ][a-złśżźąćęóń]+$/'];
        }
        if (isset($data['houseNumber'])) {
            $rules['houseNumber'] = ['required', 'string', 'max:255'];
        }
        if (isset($data['apartmentNumber'])) {
            $rules['apartmentNumber'] = ['nullable', 'string', 'max:255'];
        }

        return Validator::make($data, $rules);
    }
}
