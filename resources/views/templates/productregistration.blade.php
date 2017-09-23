@extends('layouts.master')
@section('action')
@include('partials.batchregistrationaction')
@endsection
@section('body')

<!-- section -->
<section class="register">
	<div class="register-full">
		@include('partials.cardtext')
		<div class="register-right">
			<div class="register-in">
				<h2>register here</h2>
				@if (Session::has('success'))
					<div class="">
						<div class="alert alert-success text-center"> {{ Session::get('success') }}</div>
					</div>
				@elseif (Session::has('fail'))
					<div class="">
						<div class="alert alert-danger text-center"> {{ Session::get('fail') }}</div>
					</div>
				@endif
				<div class="register-form">
					<form action="{{URL::route('createProduct')}}" method="post" enctype="multipart/form-data">
						<div class="fields-grid">
							<div class="styled-input agile-styled-input-top {{ ($errors->has('name')) ? 'has-error' : ''}}">
								<input type="text" name="name" required=""> 
								<label>Product name</label>
								<span></span>
								@if ($errors->has('name'))
									<span style="color: palevioletred;">{{ $errors->first('name') }}</span>
								@endif
							</div>
							<label class="product">Product Details</label>
							<div class="styled-input image { ($errors->has('product_details')) ? 'has-error' : ''}}">
								<textarea cols="2" name="product_details"></textarea>
								@if ($errors->has('product_details'))
									<span style="color: palevioletred;">{{ $errors->first('product_details') }}</span>
								@endif
							</div> 
							<label class="product">Product Image</label>
							<div class="styled-input image { ($errors->has('product_image')) ? 'has-error' : ''}}">
							<input type="file" name="product_image">
								
								<span></span>
								@if ($errors->has('product_image'))
									<span style="color: palevioletred;">{{ $errors->first('product_image') }}</span>
								@endif
							</div>
							<div class="styled-input { ($errors->has('secret_key')) ? 'has-error' : ''}}">
								<input type="text" name="secret_key" required="">
								<label>Secret key</label>
								<span></span>
								@if ($errors->has('secret_key'))
									<span style="color: palevioletred;">{{ $errors->first('secret_key') }}</span>
								@endif
							</div>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="clear"> </div>
							 
						</div>
						<input type="submit" value="Submit">
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