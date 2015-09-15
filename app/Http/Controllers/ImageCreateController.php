<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageCreateController extends Controller {

	public function create(Request $request){
		if(str_contains($request->input("bg_image"),"simple"))
			return $this->createsimple($request);


		return $this->createpolaroid($request);
	}

	private function createprofileimg(Request $request){
		$img 		= Image::make($request->file('photo'));

		$overlay 	= Image::make($root."/images/imagecreate/frame.png");



		return $img->response('jpg');
	}

	private function createpolaroid(Request $request){
		$root = $request->server('DOCUMENT_ROOT')."/public";

		$bg =  Image::make($root.$request->input("bg_image"));

		$img = Image::make($request->file('photo'))->fit(295,295);

		$img->rotate(-16);

		$bg->insert($img, 'top-left', 81, 56);

		return $bg->response('jpg');
	}

	private function createsimple(Request $request){
		$img = Image::make($request->file('photo'));
		$height = $img->height();
		$width = $img->width();


		$img->rectangle(0, ($height - 100), $width, $height, function ($draw) {
			$draw->background('rgba(255, 255, 255, 0.5)');
		});

		$logo = Image::make("images/imagecreate/logo.png");
		$img->insert($logo,"bottom-right",25,25);

		return $img->response('jpg');
	}
}
