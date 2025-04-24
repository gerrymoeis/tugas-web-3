<?php namespace App\Controllers;
use App\Models\UserModel;
use App\Libraries\Hash;

class Auth extends BaseController {
    public function __construct() {
        helper(['url', 'form']);
    }

    // Menampilkan halaman login
    public function index() {
        $data['title'] = "LoginForm";
        return view('auth/login', $data);
    }

    // Menampilkan halaman registrasi
    public function register() {
        return view('auth/register');
    }

    // Proses registrasi
    public function save() {
        $validation = $this->validate([
            'userName' => 'required',
            'email' => 'required|valid_email|is_unique[user_usr.email_usr]',
            'password' => 'required'
        ]);

        if (!$validation) {
            return view('auth/register', ['validation' => $this->validator]);
        } else {
            $userModel = new UserModel();
            $userModel->insert([
                'firstname_usr' => $this->request->getPost('userName'),
                'email_usr' => $this->request->getPost('email'),
                'password_usr' => Hash::make($this->request->getPost('password'))
            ]);
            return redirect()->to('auth')->with('success', "Akun berhasil dibuat");
        }
    }

    // Proses login
    public function check() {
        $validation = $this->validate([
            'email' => 'required|valid_email|is_not_unique[user_usr.email_usr]',
            'password' => 'required'
        ]);

        if (!$validation) {
            return view('auth/login', ['validation' => $this->validator]);
        } else {
            $userModel = new UserModel();
            $user = $userModel->where('email_usr', $this->request->getPost('email'))->first();

            if (!Hash::check($this->request->getPost('password'), $user['password_usr'])) {
                return redirect()->to('auth')->with('fail', "Password salah");
            } else {
                session()->set('loggedUserId', $user['id_usr']);
                session()->set('loggedUserFullName', $user['firstname_usr']);
                return redirect()->to('/');
            }
        }
    }

    // Proses logout
    public function logout() {
        session()->destroy();
        return redirect()->to('auth')->with('fail', "Anda telah logout");
    }
}