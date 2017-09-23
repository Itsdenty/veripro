@extends('layouts.authmaster')

@section('body')
<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Veripro Login Form</h1>
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
				<form action="{{URL::route('postLogin')}}" method="post"> 					
					<input class="text email {{ ($errors->has('email')) ? 'has-error' : ''}}" type="email" name="email" placeholder="Email" required="">
						@if ($errors->has('email'))
							<span style="color: palevioletred;">{{ $errors->first('email') }}</span>
						@endif
					<input class="text w3lpass {{ ($errors->has('password')) ? 'has-error' : ''}}" type="password" name="password" placeholder="Password" required="">
						@if ($errors->has('password'))
							<span style="color: palevioletred;">{{ $errors->first('password') }}</span>
						@endif
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="wthree-text">  
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>Remember me</span> 
						</label>  
						<div class="clear"> </div>
					</div>   
					<input type="submit" value="Login">
				</form>
				
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