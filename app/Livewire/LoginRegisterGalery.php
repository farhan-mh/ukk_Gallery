<?php

namespace App\Livewire;

use App\Models\UpProfil;
use Livewire\Component;

use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginRegisterGalery extends Component
{
    public $users, $email, $password, $name, $nama, $emailr, $passwordr;
    public $registerForm = false;
    public function render()
    {
        return view('livewire.login-register-galery');
    }
    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
    public function login(){
        $validateData = $this->validate([
            'email' => 'required|email',
            'password' => 'required|min: 8',
        ]);
        if(Auth::attempt(['email' => $this->email,'password' => $this->password])){
            session()->flash('message','Login sukses');
            return redirect()->route('/home');
        }else{
            session()->flash('error','Login Gagal');
        }
    }
    public function register(){
        $this->registerForm = !$this->registerForm;
    }

   

    public function registerStore(){
        $validateData = $this->validate([
            'nama' => 'required|max:30',
            'emailr' => 'required|email|max:40',
            'passwordr' => 'required|min:8|max:40',
        ]);
        $existingEmail = User::where('email',$this->emailr)->first();
        $existingName = User::where('name',$this->nama)->first();
        $this->password = Hash::make($this->password);

        if($existingEmail){
            return back()->with('error', 'Error Email atau Nama sudah ada yang menggunakan')->withInput();
        }if($existingName){
            return back()->with('error', 'Error Email atau Nama sudah ada yang menggunakan')->withInput();
        }else{
          $userc = User::create(['name' => $this->nama,'email' => $this->emailr, 'password' => $this->passwordr]);
            // UpProfil::create(['emailUser' => $this->emailr]);
            UpProfil::create(['idUser' => $userc->id,'emailUser' => $this->emailr]);
            session()->flash('message','registrasi berhasil');
            
            $this->resetInputFields();
            return redirect()->route('/loginn')->with('reload', true);
        }       
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    
}
