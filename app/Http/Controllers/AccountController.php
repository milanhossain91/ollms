<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Mews\Captcha\Facades\Captcha;
use Exception;

class AccountController extends Controller
{
    	### Sign In
		public function postSignIn(Request $request)
		{
			$validator = $request->validate([
				'username' => 'required',
				'password' => 'required',
				//'recaptcha_response' => 'required|recaptcha_response',
			]);

			dd($validator);
		
			if (!$validator) {
				// Redirect to the sign-in page with validation errors
				return redirect()->route('account-sign-in')
					->withErrors($validator)
					->withInput();
			}
		
			$remember = $request->has('remember');
		
			// Attempt to authenticate the user
			$auth = Auth::attempt(
				[
					'username' => $request->input('username'),
					'password' => $request->input('password'),
				],
				$remember
			);
		
			if ($auth) {
				// Authentication success
				return redirect()->intended('home');
			}
		
			// Authentication failed
			return redirect()->route('account-sign-in')
				->with('global', 'Wrong Email or Wrong Password.');
		}
		

	/* Submitting the Create User form (POST) */
	public function postCreate(Request $request) {
		// dd($request->all());
		$validator = $request->validate([
				'username'		=> 'required|max:20|min:3|unique:users',
				'password'		=> 'required',
				'password_again'=> 'required|same:password',
		]);

		if(!$validator) {
			return Redirect::route('account-create')
				->withErrors($validator)
				->withInput();   // fills the field with the old inputs what were correct

		} else {
			// create an account
			$username	= $request->get('username');
			$password 	= $request->get('password');
			$recaptcha_response 	= $request->get('recaptcha_response');

			$userdata = User::create([
				'username' 	=> $username,
				'password' 	=> Hash::make($password),
				'recaptcha_response' 	=> Hash::make($recaptcha_response),	// Changed the default column for Password
			]);

			if($userdata) {			


				return Redirect::route('account-sign-in')
					->with('global', 'Your account has been created. We have sent you an email to activate your account');				
			}
		}
	}

	public function getSignIn() {
		$captcha = Captcha::create('default');
		return view('account.signin', compact('captcha'));
	}


	public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

	/* Viewing the form (GET) */
	public function getCreate() {
		return view('account.create');
	}

	### Sign Out
	public function getSignOut() {
		Auth::logout();
		return Redirect::route('account-sign-in');
	}

}
