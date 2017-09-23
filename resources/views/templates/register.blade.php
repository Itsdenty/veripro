@extends('layouts.authmaster')

@section('body')
<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Veripro Sign-up Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top"> 
				@if (Session::has('success'))
					<div class="">
						<div class="alert alert-success text-center"> {{ Session::get('success') }}</div>
					</div>
				@elseif (Session::has('fail'))
					<div class="">
						<div class="alert alert-danger text-center"> {{ Session::get('fail') }}</div>
					</div>
				@endif
				<form action="{{URL::route('postSignup')}}" method="post"> 
					<input class="text {{ ($errors->has('company_name')) ? 'has-error' : ''}}" type="text" name="company_name" placeholder="Company Name" required="">
						@if ($errors->has('company_name'))
							<span style="color: palevioletred;">{{ $errors->first('company_name') }}</span>
						@endif
					<input class="text email {{ ($errors->has('email')) ? 'has-error' : ''}}" type="email" name="official_email" placeholder="Official Email" required="">
						@if ($errors->has('email'))
							<span style="color: palevioletred;">{{ $errors->first('email') }}</span>
						@endif
					<input class="text stack {{ ($errors->has('contact_number')) ? 'has-error' : ''}}" type="text" name="contact_number" placeholder="Official Mobile Number" required="">
						@if ($errors->has('contact_number'))
							<span style="color: palevioletred;">{{ $errors->first('contact_number') }}</span>
						@endif
					<input class="text {{ ($errors->has('address')) ? 'has-error' : ''}}" type="text" name="address" placeholder="Company Address" required="">
						@if ($errors->has('address'))
							<span style="color: palevioletred;">{{ $errors->first('address') }}</span>
						@endif
					<input class="text w3lpass {{ ($errors->has('password')) ? 'has-error' : ''}}" type="password" name="password" placeholder="Password" required="">
						@if ($errors->has('password'))
							<span style="color: palevioletred;">{{ $errors->first('password') }}</span>
						@endif
					<input class="text w3lpass" type="password" name="confirm_password" placeholder="Confirm Password" required="">
						@if ($errors->has('confirm_password'))
							<span style="color: palevioletred;">{{ $errors->first('confirm_password') }}</span>
						@endif
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="wthree-text">  
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span> 
						</label>  
						<div class="clear"> </div>
					</div>   
					<input type="submit" value="SIGNUP">
				</form>
				<p>Have an Account? <a href="{{url('/login')}}"> Login Now!</a></p>
			</div>	 
		</div>	
		<!-- copyright -->
		<div class="w3copyright-agile">
			<p>© 2017 Veripro.</p>
		</div>
		<!-- //copyright -->
		<ul class="w3lsg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>	
	<!-- //main --> 
	@endsection