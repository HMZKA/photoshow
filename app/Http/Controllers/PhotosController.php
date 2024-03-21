<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
class PhotosController extends Controller
{
    public function create(int $albumId){

        return view('photos.create',['albumId'=>$albumId]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'discription'=>'required',
            'photo'=>'required|image'
        ]);
        $filnameWithExtension= $request->file('photo')->getClientOriginalName();
        $filename= pathinfo($filnameWithExtension,PATHINFO_FILENAME);
        $extension= $request->file('photo')->getClientOriginalExtension();
        $filenameTostore= $filename . '_' . time() . '_' . $extension;
        $albumId=$request->input('album_id');
        $request->file('photo')->storeAs('public/album/'. $albumId,$filenameTostore);
        $photo = new Photo();
        $photo->title= $request->input('title');
        $photo->description= $request->input('discription');
        $photo->album_id= $request->input('album_id');
        $photo->photo= $filenameTostore;
        $photo->size=$request->file('photo')->getSize();
        $photo->save();
        return redirect('/albums/'.$albumId)->with('success','Photo Added successfully');
    }
    public function show($id){
        $photo =Photo::find($id);
        return view('photos.show',['photo'=>$photo]);
    }
    public function destroy($id){
        $photo =Photo::find($id);
        if(Storage::delete('public/storage/album/'. $photo->album_id .'/'. $photo->photo)){
            $photo->delete();
            return redirect('/')->with('success','Photo deleted successfully');
        }

    }
}
