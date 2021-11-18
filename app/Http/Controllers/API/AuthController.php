<?php

namespace App\Http\Controllers\API;

// Pastiin ini semua keimport
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function registrasi(Request $request)
    {
        // ini untuk modif pesan
        $pesan = [
            // name.required untuk spesifikkan harus ada titik
            'name.required' => "Nama jangan sampe kosong",
            'email.required' => "Email jangan sampe kosong",
            'email.unique' => "Email ga boleh sama",
            'email.email' => "Email nggak valid",
            // ini harus sama seperti valuenya
            'password.required' => "password jangan sampe kosong",
            'password.min' => "Password minimal 4 karakter",
            'password.confirmed' => "Password belum dikonfirmasi"
        ];

        $validasi = Validator::make($request->all(), [
            'name'       => 'required',
            // email harus divalidasi
            'email'      => 'required|unique:users|email',
            'password'   => 'required|min:4|confirmed',
        ], $pesan);


        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }


        $user = User::create([
            // ini akan jadi parameter
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);
        // balikin respon dalam bentuk json yang isinya status, pesan, dan data
        return response()->json([
            'status'   => 1,
            // harus pakai petik 2 untuk nge get variabel
            'pesan'    => "$request->name, Registrasi Anda Berhasil !",
            'data'     => $user
        ], Response::HTTP_OK);
    }


    public function daftar(Request $request)
    {
        // ini untuk modif pesan
        $pesan = [
            // name.required untuk spesifikkan harus ada titik
            'name.required' => "Nama wajib diisi",
            'email.required' => "Email wajib diisi",
            'email.unique' => "Email ga boleh sama",
            'email.email' => "Email nggak valid",
            // ini harus sama seperti valuenya
            'password.required' => "password wajib diisi",
            'password.min' => "Password minimal 4 karakter",
            'password.confirmed' => "Password belum dikonfirmasi"
        ];

        $request->validate([
            'name'   => 'required',
            // email harus unique dispesifikkan ke users(nama table), karena ada table lain yg harus unique misal slug
            'email'   => 'required|email|unique:users',
            'password'   => 'required',
        ], $pesan);


        $user = User::create([
            // ini akan jadi parameter
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);
        // balikin respon dalam bentuk json yang isinya status, pesan, dan data
        return response()->json([
            'status'   => 1,
            // harus pakai petik 2 untuk nge get variabel
            'pesan'    => "$request->name, Registrasi Anda Berhasil !",
            'data'     => $user
        ], Response::HTTP_OK);
    }

    public function login(Request $request)
    {
        $pesan = [
            // email.required untuk spesifikkan harus ada titik
            'email.required' => "Email wajib diisi",
            // ini harus sama seperti valuenya
            'password.required' => "password wajib diisi"

        ];

        $validasi = Validator::make($request->all(), [

            'email'      => 'required',
            'password'   => 'required',
        ], $pesan);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->responError(0, "Login gagal");
        }

        return response()->json([
            'status'   => 1,
            // harus pakai petik 2 untuk nge get variabel
            'pesan'    => "$user->name, Login Anda Berhasil !",
            'data'     => $user
        ], Response::HTTP_OK);
    }

    public function editProfile(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $validasi = Validator::make($request->all(), [
            'name'       => 'required',
            'email'      => 'required',
            'alamat'      => 'required',
            'telp'      => 'required',

        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }

        $user->update([
            'name'                 => $request->name,
            'email'                => $request->email,
            'alamat'               => $request->alamat,
            'telp'               => $request->telp,
            'photo'                => $request->photo,
        ]);

        return response()->json([
            'status'   => 1,
            // harus pakai petik 2 untuk nge get variabel
            'pesan'    => "Profile berhasil diupdate",
            'data'     => $user
        ], Response::HTTP_OK);
    }

    public function changePassword(Request $request, $user_id)
    {
        $user = User::findorFail($user_id);

        if (!(Hash::check($request->get('password'), $user->password))) {
            return $this->responError(0, "password salah!");
        }

        if (strcmp($request->get('password'), $request->get('new_password')) == 0) {
            return response()->json([
                'status'              => 0,
                'pesan'               => 'password jangan sama'
            ], 400);
        }

        $validasi = Validator::make($request->all(), [
            'password'                => 'required',
            'new_password'            => 'required|confirmed'
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        //jka password baru sama dengan lamamaka error

        //dd($request);
        return response()->json([
            'status'           => 1,
            'pesan'            => "$user->name, Edit Berhasil",
            'result'           => $user
        ], Response::HTTP_OK);
    }

    public function responError($status, $msg)
    {
        return response()->json([
            'status'  => $status,
            'message' => $msg
        ], Response::HTTP_OK);
    }
}