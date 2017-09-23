@extends('layouts.master')

@section('body')
<!-- section -->
<section class="register">
	<div class="register-full">
		@include('partials.cardtext')
		<div class="register-right">
			<div class="register-in">
				<h2>Request Product Verification Code</h2>
				<div class="register-form">
					<form action="#" method="post">
						<div class="fields-grid">
						<label class="product">Select Product</label>
						<div class="styled-input image select-style">
						<select name="product_id">
						  <option>-- select product --</option>
						  <option>Fanta</option>
						  <option>Shwepps</option>
						  <option>mirinda</option>
						  <option>pepsi</option>
						</select>
							</div>
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="first_batch" required=""> 
								<label>First Batch</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="text" name="last_batch" required=""> 
								<label>Last Batch</label>
								<span></span>
							</div> 
							
							
							<div class="clear"> </div>
							 
						</div>
						<input type="submit" value="Send">
					</form>
				</div>
			</div>
			<div class="clear"> </div>
		</div>
	<div class="clear"> </div>
	</div>
	<!-- copyright -->
	<p class="agile-copyright">© 2017 Veripro</p>
	<!-- //copyright -->
</section>
<!-- //section -->
@endsection