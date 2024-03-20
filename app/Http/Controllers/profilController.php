<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UpProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse;

class profilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // X //
        $email = auth()->user()->email;
        $ambilProfil = upProfil::where('emailUser',$email)->first();
        $ambilNamaUser = User::where('email',$email)->first();
        // dd($ambilProfil,$email);
        return view('profil',compact('ambilProfil','ambilNamaUser'));
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
    public function store(Request $request)
    {
       
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $emailUser): RedirectResponse {  
        $emailUser = auth()->user()->email;
        $upProfil = UpProfil::where('emailUser',$emailUser)->first();
       $data = $this->validate($request,[
            'avtr' => 'image|mimes:jpeg,jpg,png|max:2048',
             'bg' => 'image|mimes:jpeg,jpg,png|max:2048',
             'des' => 'required|max:450',
             'ubahNama'=> 'required|max:30',
        ]);
        // dd($data,$upProfil,$emailUser);
        if ($request->hasFile('avtr')) {
            if ($upProfil->avatar) {
                Storage::delete('public/profil/' . $upProfil->avatar);
               
            }
            $image = $request->file('avtr');
            $pathImage = $image->storeAs('public/profil/', $image->hashName());
            $avtrUp = $image->hashName();
            // dd($pathImage,$gg);
            $upProfil->avatar = $avtrUp;
        }
        // Jika ada gambar bg baru diunggah
        if ($request->hasFile('bg')) {
            if ($upProfil->background) {
                $cek = Storage::delete('public/profil/' . $upProfil->background);
                // dd($cek);
            }
            $image2 = $request->file('bg');
            $pathImage2 = $image2->storeAs('public/profil/'. $image2->hashName());
            $bgUp = $image2->hashName();
            $upProfil->background = $bgUp;
        }
        $upProfil->deskripsi = $data['des'];
        $upProfil->save();
      
        if ($request->filled('ubahNama')) {
            $newName = $request->input('ubahNama');
            $existingName = User::where('name', $newName)->first();
        
            if ($existingName) {
                return back()->with('error', 'Error Email atau Nama sudah ada yang menggunakan')->withInput();
            } else {
                $user = User::find(auth()->user()->id);
                $user->name = $newName;
                $user->save();
            }
        }else{
            
        }
        return redirect()->route('/author');
    }
public function hpsProfil(Request $request,string $email){

    $hps = UpProfil::where('emailUser', $email)->firstOrFail();
    
    // Hapus avatar, background, dan deskripsi jika checkbox terkait dicentang
    if ($request->has('hpsAvtr')) {
        if ($hps->avatar) {
            Storage::delete('public/profil/' . $hps->avatar);
            $hps->avatar = null;
        }
    }
    if ($request->has('hpsBg')) {
        if ($hps->background) {
            Storage::delete('public/profil/' . $hps->background);
            $hps->background = null;
        }
    }
    if ($request->has('hpsDes')) {
        if ($hps->deskripsi) {
            $hps->deskripsi = null;
        }
    }

    // Simpan perubahan pada model
    $hps->save();

    return redirect()->route('/author');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
