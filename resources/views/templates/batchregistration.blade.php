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
					<form action="{{URL::route('generateVerification')}}" method="post">
						<div class="fields-grid">
						<label class="product">Select Product</label>
						<div class="styled-input image select-style">
						<select name="product_id" required>
						  <option>-- select product --</option>
						  @foreach($products as $product)
						  <option value="{{$product->id}}">{{$product->name}}</option>
						  @endforeach
						  {{-- <option>Shwepps</option>
						  <option>mirinda</option>
						  <option>pepsi</option> --}}
						</select>
							</div>
							<div class="styled-input agile-styled-input-top {{ ($errors->has('first_batch')) ? 'has-error' : ''}}">
								<input type="text" name="first_batch" required=""> 
								<label>First Batch</label>
								<span></span>
								@if ($errors->has('first_batch'))
									<span style="color: palevioletred;">{{ $errors->first('first_batch') }}</span>
								@endif
							</div>
							<div class="styled-input {{ ($errors->has('last_batch')) ? 'has-error' : ''}}">
								<input type="text" name="last_batch" required=""> 
								<label>Last Batch</label>
								<span></span>
								@if ($errors->has('last_batch'))
									<span style="color: palevioletred;">{{ $errors->first('last_batch') }}</span>
								@endif
							</div> 
							
							
							<div class="clear"> </div>
							 
						</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
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