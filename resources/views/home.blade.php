@extends('layout')

@section('content')
<div class="row">
	<div class="header">
		<div class="h-group h-left">


			<div class="new-product right">
				<div class="info">
					<div class="title">
						Groene hoody
					</div>
					<div class="sizes">
						Maten:
						<ul>
							<li>XS</li>
							<li>S</li>
							<li>M</li>
							<li>L</li>
							<li>XL</li>
						</ul>
					</div>
				</div>
				<a href="#" class="details">Details</a>
				<img class="preview" src="images/alpha_shirt_1.png" />
			</div>


			<div class="new-product ">
				<div class="new-product left">
					<div class="info">
						<div class="title">
							Groene hoody
						</div>
						<div class="sizes">
							Maten:
							<ul>
								<li>XS</li>
								<li>S</li>
								<li>M</li>
								<li>L</li>
								<li>XL</li>
							</ul>
						</div>
					</div>
					<a href="#" class="details">Details</a>
					<img class="preview" src="images/alpha_shirt_2.png" />
				</div>
			</div>

			<form action="/imagecreate" class="photo-logo-creator" method="post" target="_blank" enctype="multipart/form-data">
				<input type="file" name="photo" />
				<input type="hidden" name="bg-image" class="bg-image" />
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				<div class="photo-logo-btn"></div>
			</form>
		</div>
		<div class="h-group h-right">
			<div class="slider">
				<img src="images/header_img.jpg"/>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="product-container">
		@foreach($categories AS $categorie)
			<div class="col-md-12">
				<div class="title"> <strong>{{ $categorie->name }}</strong> </div>
			</div>
			@foreach($categorie->products->chunk(4) AS $products)
				@foreach($products AS $product)
					<div class="col-md-3 product-line">
						<div class="product">
							@foreach($product->images AS $image)
								<div class="placeholder grow">
									<img src="/images/products/{{$image->image}}">
								</div>
							@endforeach
							<div>{{$product->name}}</div>
							<a href="/product/{{$product->slug}}" class="detail">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Details
								<div class="price">&euro; {{number_format($product->price, 2, ',', ' ')}}</div>
							</a>
						</div>
					</div>
				@endforeach
			@endforeach
		@endforeach
	</div>
</div>
@endsection
