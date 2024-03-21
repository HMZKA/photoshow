<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Photo;
class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::get();
        return view('albums.index',[
            'albums'=>$albums
        ]);
    }
    public function create(){
        return view('albums.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'discription'=>'required',
            'cover_image'=>'required|image'
        ]);
        $filnameWithExtension= $request->file('cover_image')->getClientOriginalName();
        $filename= pathinfo($filnameWithExtension,PATHINFO_FILENAME);
        $extension= $request->file('cover_image')->getClientOriginalExtension();
        $filenameTostore= $filename . '_' . time() . '_' . $extension;
        $request->file('cover_image')->storeAs('public/album_covers',$filenameTostore);
        $album = new Album();
        $album->name= $request->input('name');
        $album->description= $request->input('discription');
        $album->cover_image= $filenameTostore;
        $album->save();
        return redirect('/albums')->with('success','Album created successfully');
    }
    public function show($id){
        $album =Album::with('photo')->find($id);
        return view('albums.show',['album'=>$album]);
    }
}
