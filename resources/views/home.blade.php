@extends('layout')

@section('content')
<div class="row">
	<div class="header">
		<div class="h-group h-left">


			<a href="/product/witte-dames-sweater" class="new-product right">
				<div class="info">
					<div class="title">
						Sweater WIT <span>dames</span>
					</div>
					<div class="sizes">
						Maten:
						<ul>
							<li>S</li>
							<li>M</li>
							<li>L</li>
							<li>XL</li>
						</ul>
					</div>
				</div>
				<span class="details">Details</span>
				<img class="preview" src="images/alpha_shirt_1.png" />
			</a>


			<a href="/product/witte-heren-sweater" class="new-product ">
				<div class="new-product left">
					<div class="info">
						<div class="title">
							Sweater WIT <span>heren</span>
						</div>
						<div class="sizes">
							Maten:
							<ul>
								<li>S</li>
								<li>M</li>
								<li>L</li>
								<li>XL</li>
							</ul>
						</div>
					</div>
					<span class="details">Details</span>
					<img class="preview" src="images/alpha_shirt_2.png" />
				</div>
			</a>

			<form action="/imagecreate" class="photo-logo-creator" method="post" target="_blank" enctype="multipart/form-data">
				<input type="file" name="photo" />
				<input type="hidden" name="bg_image" class="bg-image" />
				<input type="hidden" name="add_to_halloffame" value="no" />
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				<div class="photo-logo-btn"></div>
			</form>
		</div>
		<div class="h-group h-right">
			<div class="slider">
				<img src="images/header/background_layer.jpg"/>

				<img src="images/header/product-1.png" class="p-1 wow bounceInUp" data-wow-delay=".4s" />
				<img src="images/header/product-2.png" class="p-2 wow bounceInUp" data-wow-delay=".6s" />

				<img src="images/header/text-1.png" class="tt-2 wow bounceInRight" />
				<img src="images/header/text-2.png" class="tt-1 wow bounceInRight" data-wow-delay=".8s" />
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
					@if($product->supply())
					<div class="col-md-3 product-line">
						<a href="/product/{{$product->slug}}" class="product">
							@if(count($product->images))
								<div class="placeholder grow">
									<img src="/images/products/med_{{$product->images[0]->image}}">
								</div>
							@endif
							<div>{{$product->name}}</div>
							<div class="detail">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Details
								<div class="price">&euro; {{number_format($product->price, 2, ',', ' ')}}</div>
							</div>
						</a>
					</div>
					@endif
				@endforeach
			@endforeach
		@endforeach
	</div>
</div>

<script src="/js/wow.min.js" type="text/javascript"></script>
<script type="text/javascript">new WOW().init();</script>
@endsection
