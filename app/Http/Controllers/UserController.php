<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //


    public function postLogin(Request $request){
		$validate = Validator::make($request->all(), array(
			'email' => 'required|min:4',
			'password' => 'required|min:6',
		));
		if ($validate->fails()) {
			return back()->withErrors($validate)->withInput();
		} else {
			$auth = Auth::attempt(array(
				'email' => $request->get('email'),
				'password' => $request->get('password')
			));
			if ($auth) {
				return redirect()->intended('user/dashboard')->with('success', 'You have successfully logged in');
			}
			else{
				return back()->with('fail', 'invalid username or password')->withInput();
			}
		}
	}


	public function postSignup(Request $request)
    {
        //$state =  (int)Input::get('state');
        $rules = array(
            'company_name' => 'required|string|min:4',
            'official_email' => 'required|unique:users|min:4',
            'password' => 'required|min:6',
            'address' => 'required|string|min:10',
            'contact_number' => 'required|digits:11',
            'confirm_password' => 'required|same:password',
        );

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            $data = $request->all();
            $confirmationCode = str_random(30);
            $data['password'] = Hash::make($request->get('password'));
            $user = new User();
            $user->fill($data);
            if ($user->save()) {
                //Mail::to($request->get('email'))->send(new ConfirmAccount($user));
                
                // return Redirect::route('getSignup')->with('success', 'you registered successfully please check your email for your account activation mail');
                return redirect()->route('login')->withSucess('You have registered successfully');
            } else {
            //     return Redirect::route('getSignup')->with('fail', 'an error occurred while creating your profile');
                return  redirect()->back()->withErrors('An error occured while trying to sign you up')->withInput();
            }
        }

    }

}