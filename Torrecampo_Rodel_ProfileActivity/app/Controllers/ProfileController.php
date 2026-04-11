<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class ProfileController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // 4.1 — Display Profile
    public function show()
    {
        $username = session()->get('username');
        $user = $this->userModel->where('username', $username)->first();

        if (!$user) {
            session()->destroy();
            return redirect()->to('/login');
        }

        $data = array_merge($this->data, ['user' => $user]);
        return view('profile/show', $data);
    }

    // 4.2 — Show Edit Form
    public function edit()
    {
        $username = session()->get('username');
        $user = $this->userModel->where('username', $username)->first();

        $data = array_merge($this->data, ['user' => $user]);
        return view('profile/edit', $data);
    }

    // 4.3 — Process Form Submission
    public function update()
    {
        $username = session()->get('username');
        $user = $this->userModel->where('username', $username)->first();
        $userId = $user['id'];

        // 2. Validation Rules
        $rules = [
            'name'         => 'required|min_length[3]',
            'email'        => "required|valid_email|is_unique[users.username,id,{$userId}]",
            'student_id'   => 'required',
            'course'       => 'required',
            'year_level'   => 'required',
            'phone'        => 'required',
            'address'      => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $updateData = [
            'fullname'   => $this->request->getPost('name'),
            'username'   => $this->request->getPost('email'),
            'student_id' => $this->request->getPost('student_id'),
            'course'     => $this->request->getPost('course'),
            'year_level' => $this->request->getPost('year_level'),
            'section'    => $this->request->getPost('section'),
            'phone'      => $this->request->getPost('phone'),
            'address'    => $this->request->getPost('address'),
        ];

        // 4. Handle Image Upload
        $file = $this->request->getFile('profile_image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old image if it exists
            if (!empty($user['profile_image']) && file_exists(FCPATH . 'uploads/profiles/' . $user['profile_image'])) {
                unlink(FCPATH . 'uploads/profiles/' . $user['profile_image']);
            }

            // Generate unique name and move
            $newName = 'avatar_' . $userId . '_' . time() . '.' . $file->getExtension();
            $file->move(FCPATH . 'uploads/profiles/', $newName);
            
            $updateData['profile_image'] = $newName;
        }

        // 5 & 6. Update Database
        $this->userModel->updateProfile($userId, $updateData);

        // 7. Update Session (for navbar name)
        session()->set('user_name', $updateData['fullname']);

        // 8. Redirect with success
        return redirect()->to('/profile')->with('success', 'Profile updated successfully!');
    }
}
