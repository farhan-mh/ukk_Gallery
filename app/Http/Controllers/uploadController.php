<?php

namespace App\Http\Controllers;

use App\Models\upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class uploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/upload');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $idusr = auth()->user()->id;
        
        $user = upload::where('id',$idusr);

       $data = $this->validate($request,[
            
            'gambarUpload' => 'required|image|mimes:jpeg,jpg,png|max:4048',
             'judul' => 'required|min:1|max:60',
             'deskripsi' => 'required|min:1|max:500',
        ]);
        $image = $request->file('gambarUpload');
        $image->storeAs('public/posts', $image->hashName());

        upload::create([
            'idUser' => $idusr,
            'gambarUpload' => $image->hashName(),
            'judul' => $request->judul,
            'deskripsiUpload' => $request->deskripsi,
        ]);

        return redirect()->route('/author');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $pos = Upload::where('id',$id)->first();
        return view('/uploadEdit',compact('pos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idposnya) {
        $tabelUpload = upload::where('id',$idposnya)->first();

         $this->validate($request,[
             'judul' => 'required|min:1|max:60',
             'deskripsi' => 'required|min:1|max:500',
        ]);
        $ubahJudul = $request->judul;
        $ubahDes = $request->deskripsi;

        // dd($ubahJudul,$ubahDes);
        $tabelUpload->judul = $ubahJudul;
        $tabelUpload->deskripsiUpload = $ubahDes;
        $tabelUpload->save();
        
        return redirect()->route('/author');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $upload = upload::find($id);
        // dd($upload);
        $upload->delete();
        // Hapus file gambar dari storage
        Storage::delete('public/posts/'.$upload->gambarUpload);
        return redirect()->route('/author')->with('success', 'Postingan berhasil dihapus');
    }
}
