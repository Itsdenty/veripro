@extends('layouts.authmaster')

@section('body')
<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Veripro Sign-up Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top"> 
				<form action="#" method="post"> 
					<input class="text" type="text" name="Username" placeholder="Company Name" required="">
					<input class="text email" type="email" name="email" placeholder="Official Email" required="">
					<input class="text stack" type="text" name="phone" placeholder="Official Mobile Number" required="">
					<input class="text" type="text" name="address" placeholder="Company Address" required="">
					<input class="text w3lpass" type="password" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="password_confirmation" placeholder="Confirm Password" required="">
					<div class="wthree-text">  
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span> 
						</label>  
						<div class="clear"> </div>
					</div>   
					<input type="submit" value="SIGNUP">
				</form>
				<p>Have an Account? <a href="#"> Login Now!</a></p>
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