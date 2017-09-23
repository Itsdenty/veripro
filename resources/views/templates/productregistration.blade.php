@extends('layouts.master')

@section('body')

<!-- section -->
<section class="register">
	<div class="register-full">
		@include('partials.cardtext')
		<div class="register-right">
			<div class="register-in">
				<h2>register here</h2>
				<div class="register-form">
					<form action="#" method="post">
						<div class="fields-grid">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="product_name" required=""> 
								<label>Product name</label>
								<span></span>
							</div>
							<label class="product">Product Details</label>
							<div class="styled-input image">
								<textarea cols="2" name="product_details"></textarea>
							</div> 
							<label class="product">Product Image</label>
							<div class="styled-input image">
							<input type="file" name="product_image" required="">
								
								<span></span>
							</div>
							<div class="styled-input">
								<input type="text" name="secret_key" required="">
								<label>Secret key</label>
								<span></span>
							</div>
							
							<div class="clear"> </div>
							 
						</div>
						<input type="submit" value="Register">
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