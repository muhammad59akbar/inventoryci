<?php

namespace App\Controllers;

use App\Models\ProductsModels;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Password;

class Admin extends BaseController
{
    protected $ProdukModel;
    protected $UserModel;
    protected $GroupModel;

    public function __construct()
    {

        $this->UserModel = new UserModel();
        $this->GroupModel = new GroupModel();
    }
    public function index(): string
    {
        $data = [
            'title' => 'tester',
        ];
        return view('Dashboard', $data);
    }

    public function ListUser(): string
    {
        $data = [
            'title' => 'List User',
            'errors' => \Config\Services::validation(),
            'userspdop' => $this->UserModel->getUsersWithRoles()
        ];
        return view('UserList', $data);
    }

    public function AddUser()
    {
        $validationRules = [
            'email' => [
                'rules' => 'required|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                    'is_unique' => '{field} Sudah Ada !!!',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[5]|max_length[30]|is_unique[users.email]',
                'errors' => [
                    'is_unique' => '{field} already registered.'
                ]
            ],
            'password' => 'required',
            'confpass' => 'required|matches[password]',
            'namalengkap' => [
                'rules' => 'required|min_length[3]|max_length[100]|regex_match[/^[a-zA-Z0-9\s]+$/]|',
                'errors' => [
                    'required' => 'Nama Wajib diisi',
                    'min_length' => 'Nama Minimal 3 Karakter',
                    'regex_match' => 'Nama Harap Diisi Dengan Benar !!!'
                ]
            ],
            'imgKaryawan' => [
                'rules' => 'max_size[imgKaryawan,1024]|is_image[imgKaryawan]|mime_in[imgKaryawan,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'this file very big',
                    'is_image' => 'this is not image',
                    'mime_in' => 'this is not image',

                ]

            ]

        ];
        if (!$this->validate($validationRules)) {

            return redirect()->to('/ListUser')->withInput()->with('errors', $this->validator->getErrors());
        }

        $fotokaryawan = $this->request->getFile('imgKaryawan');

        if ($fotokaryawan->getError() === 4) {
            $NFotoKaryawan = 'default.webp';
        } else {
            $NFotoKaryawan = $fotokaryawan->getRandomName();
            $fotokaryawan->move('assets/images/karyawan/', $NFotoKaryawan);
        }

        $data = [
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('namalengkap'),
            'password_hash' =>  Password::hash($this->request->getVar('password')),
            'active' => 1,
            'image_name' => $NFotoKaryawan
        ];
        $userID = $this->UserModel->insert($data);
        if ($userID) {
            $role = $this->request->getPost('role');
            $this->GroupModel->addUserToGroup($userID, $role);
            return redirect()->back()->with('message', 'User berhasil ditambahkan !!!');
        } else {
            return redirect()->back()->with('message', 'Gagal menambahkan user.');
        }
    }
}
