<?php

namespace App\Http\Controllers;

use App\Models\upload;
use App\Models\UpProfil;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    // halaman HOME.tidak perlu login //
   public function home(Request $request):View{
    $data = upload::inRandomOrder()->get();

    return view('index', compact('data'));
   }

   public function cari(Request $request){
    $search = $request->input('cari_pos');
    $dataa = DB::table('uploads')->orderBy(DB::raw('RAND()'))->where('judul', 'LIKE', "%" . $search . "%")->paginate(50);
    // dd($search,$dataa);
    $h = $request;
    return view('cari', compact('dataa','search','h'));
}
    // Ke Profil user Lain. tidak perlu login //
    public function userLain(string $id){
            // dd($id);
        if ($id == Auth::id()) {
                return redirect()->route('/author');
        }else{
            $uploads = Upload::all();
            $userLiked = [];
     
        foreach ($uploads as $upload) {
            $userLiked[$upload->id] = Auth::check() && $upload->likes()->where('user_id', auth()->id())->exists();
        }
         $ambil = UpProfil::join('users', 'up_profils.idUser','=','users.id')
        ->select('users.name as namaa','up_profils.*','up_profils.deskripsi as des')->where('up_profils.idUser' , $id)->get();

        $userdata = Upload::join('users', 'uploads.idUser', '=', 'users.id')
        ->join('up_profils', 'up_profils.idUser', '=', 'users.id')
        ->leftJoin(DB::raw('(SELECT upload_id, COUNT(*) as likes_count FROM likes GROUP BY upload_id) as likes'), 'likes.upload_id', '=', 'uploads.id')
        ->leftJoin('likes as user_likes', function($join) use ($id) {
            $join->on('user_likes.upload_id', '=', 'uploads.id')
                 ->where('user_likes.user_id', '=', $id);
        })
        ->select('uploads.*', 'uploads.id as idpos', 'uploads.created_at as tanggal', 'users.name as username', 'users.id as id2',
         'up_profils.*', 'likes.likes_count', DB::raw('(user_likes.user_id IS NOT NULL) as userLiked'))
        ->where('up_profils.idUser' , $id)
        ->get();
 
        return view('authorLain',compact('ambil','userdata','userLiked'));
    }
    }
    // Ke profil sendiri //
  public function author(){
    $idusr = auth()->user()->id;
    $ambil = UpProfil::where('idUser', $idusr)->get();

    $data = Upload::join('users', 'uploads.idUser', '=', 'users.id')
        ->join('up_profils', 'up_profils.idUser', '=', 'users.id')
        ->leftJoin(DB::raw('(SELECT upload_id, COUNT(*) as likes_count FROM likes GROUP BY upload_id) as likes'), 'likes.upload_id', '=', 'uploads.id')
        ->leftJoin('likes as user_likes', function($join) use ($idusr) {
            $join->on('user_likes.upload_id', '=', 'uploads.id')
                 ->where('user_likes.user_id', '=', $idusr);
        })
        ->select('uploads.*', 'uploads.id as idpos', 'uploads.created_at as tanggal', 'users.name as username',
         'users.id as id2', 'up_profils.*', 'likes.likes_count', DB::raw('(user_likes.user_id IS NOT NULL) as userLiked'))
        ->where('uploads.idUser', $idusr)
        ->get();

        $userLiked = $data->isEmpty() ? false : $data[0]->userLiked;
    return view('author', compact('ambil', 'data','userLiked'));
}


   public function upProfill(){
    // $ambilProfil = upProfil::all();
    // dd($ambilProfil);
    // // return view('profil',compact('ambilProfil'));
   }

   // masuk ke pos. tidak perlu login //
   public function lihatPost() {
       $uploads = Upload::all();
       $userLiked = [];

       foreach ($uploads as $upload) {
           $userLiked[$upload->id] = Auth::check() && $upload->likes()->where('user_id', auth()->id())->exists();
       }
   
       $dataa = Upload::join('users', 'uploads.idUser', '=', 'users.id')
           ->join('up_profils', 'up_profils.idUser', '=', 'users.id')
           ->select('uploads.*', 'uploads.created_at as tanggal', 'uploads.likes as lk', 'uploads.id as idUpload',
               'users.name as username', 'users.id as id2', 'up_profils.*')->inRandomOrder()->get();
   
       $likenya = Upload::withCount('likes')->get();
       return view('post2', compact('dataa', 'likenya', 'uploads', 'userLiked'));
   }
//    Untuk Lihat Postingan, di home. tidak perlu login //
   public function lihat(string $id){
    $idnya = $id;
    $upload = Upload::findOrFail($id);
    $poslain = DB::table('uploads')->where('id', '!=', $id)->inRandomOrder()->get();

    // Periksa apakah pengguna sudah menyukai postingan ini
    $userLiked = Auth::check() && $upload->likes()->where('user_id', auth()->id())->exists();

    $dataa = upload::join('users', 'uploads.idUser', '=', 'users.id')
        ->join('up_profils','up_profils.idUser', '=','users.id')
        ->select('uploads.*','uploads.created_at as tanggal','uploads.likes as lk',
        'users.name as username', 'users.id as id2','up_profils.*') 
        ->where('uploads.id', $id)
        ->get();

    $likenya = Upload::withCount('likes')->get();
    // Kirim data ke view 'post2'
    return view('post', compact('dataa','likenya','idnya', 'userLiked','poslain'));
}

}
