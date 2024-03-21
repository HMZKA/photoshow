<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Photo;
class ApiController extends Controller
{
    public function albums() {
        $albums=Album::all();
        return response([
            'albums' => $albums
        ],200);
    }
    public function photos(){
        $photos=Photo::all();
        return response (['photos'=>$photos]);
    }
    public function album($id){
        $album=Album::with('photo')->find($id);
        return response(['album'=>$album]);
    }
    public function albumwphoto(){
        $alb=Album::with('photo')->all();
        return response(['albums'=>$alb]);
    }
    public function createAlbum(Request $req){
        $this->validate($req,[
            'name'=>'required',
            'description'=>'required',
            'cover_image'=>'required|image'
        ]);
        $albumcover= time() . '_' . uniqid(). '_' . $req->cover_image->extension() ;
        $req->cover_image->move(public_path('storage/album_covers'),$albumcover);
        $album=Album::create([
            'name'=> $req->name,
            'description'=> $req->description,
            'cover_image'=>$albumcover
        ]);
        return response([
            'msg'=> 'Album created successfully',
            'album'=>$album
        ],200);
    }
    public function uploadPhoto($request,$albumId){
        $this->validate($request,[
            'title'=>'required',
            'discription'=>'required',
            'photo'=>'required|image',
            'albumId'=>'required|numeri|'
        ]);
        $album = Album::findOrfail($albumId);

    }


}
