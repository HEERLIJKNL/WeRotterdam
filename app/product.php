<?php namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\categorie;
use App\image as imageModel;

class product extends Model {

    use SoftDeletes;

    protected $imagepath = "/images/products/";

    protected $dates    = ['deleted_at'];

    protected $fillable = ['name','slug','description','price','amount'];

    public function categorie(){
        return $this->belongsTo('App\categorie');
    }

    public function images(){
        return $this->morphMany('App\image','imageable');
    }
    public function sizes(){
        return $this->hasMany('App\product_size');
    }
    public function supply(){
        $inStock = 0;
        foreach($this->sizes AS $size) {
            $inStock += $size->stored;
        }
        return $inStock;
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str::slug($value);
    }

    public function addImage($file){

        $name = "pr_".time().".".$file->getClientOriginalExtension();

        $path = public_path().$this->imagepath;
        $img = Image::make($file);

        $img->save($path.$name);

        $img_medium = $img->widen(500);
        $img_medium->save($path."med_".$name);

        $img_tmb = $img->widen(100);
        $img_tmb->save($path."tmb_".$name);

        $image = new imageModel(["image" => $name]);

        $this->images()->save($image);

        return $image;
    }
}
