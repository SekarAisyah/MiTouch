<?php

namespace App\Http\Controllers;

use App\Http\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    protected $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function showLoginForm()
    {
        return view('/administration/login');
    }

    public function index()
    {
        $userData = $this->UserRepository->getData();

        return view('/administration/user', [
            'userData' => $userData,
        ]);
    }

    public function profile()
    {
        $userData = $this->UserRepository->getData();

        return view('/administration/profile', [
            'userData' => $userData,
        ]);
    }

    public function loginku(Request $request)
    {

        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');
        //dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        } else {
            return back()->withErrors(['password' => 'username atau password salah.']);
        }
    }

    public function showRegistrationForm()
    {
        return view('administration/register');
    }

    public function register(Request $request)
    {
        // dd($request);
        $data = $request->except('_token');
        // $data = $request->all();

        $result = $this->UserRepository->createUser($data);

        $data = $request->all();

        if ($result) {
            // return redirect('/');
            return Response::json(['status' => 'success']);
        } else {
            return Response::json(['status' => 'error']);
        }
    }

    public function delete(Request $request)
    {

        $selectedUserId = $request->input('user_id');

        $result = $this->UserRepository->delete($selectedUserId);

        return response()->json(['message' => $result]);
    }

    public function getEdit($id)
    {
        $user = $this->UserRepository->getById($id);

        return response()->json($user);
    }

    public function edit($id, Request $request)
    {
        $data = $request->all();

        $result = $this->UserRepository->edit($data, $id);

        if ($result) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    public function editProfile($id, Request $request)
    {
        $data = $request->all();
        //dd($data);
        $result = $this->UserRepository->editProfile($data, $id);

        if ($result) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    public function changePassword(Request $request)
    {
        // Validasi data
        // $request->validate([
        //     'password' => 'required|min:6',
        //     'newpassword' => 'required|min:6|confirmed',
        // ]);

        $userId = $request->input('user_id');
        $currentPassword = $request->input('password');
        $newPassword = $request->input('newpassword');

        // Verifikasi password saat ini
        if (Hash::check($currentPassword, $this->UserRepository->getCurrentUserPassword($userId))) {
            // Verifikasi bahwa password baru sesuai dengan konfirmasi password
            if ($newPassword === $request->input('newpassword_confirmation')) {
                // Password baru sesuai, lanjutkan dengan perubahan password
                $result = $this->UserRepository->changePassword($userId, bcrypt($newPassword));

                if ($result) {
                    return response()->json(['status' => 'success']);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Failed to change password']);
                }
            } else {
                return response()->json(['status' => 'error', 'message' => 'New password confirmation does not match']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Current password is incorrect']);
        }
    }
}
