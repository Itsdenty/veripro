@extends('layouts.authmaster')

@section('body')
<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Veripro Login Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top"> 
				<form action="#" method="post"> 
					
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text w3lpass" type="password" name="password" placeholder="Password" required="">
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