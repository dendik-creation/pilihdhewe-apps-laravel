<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Result;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Resources\MyProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yaza\LaravelGoogleDriveStorage\Gdrive;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $searchRes = User::with('kelas')->where('name', 'LIKE', "%$request->search%")->where('role', 'siswa')->select(['id', 'number_card', 'name', 'role', 'gender', 'kelas_id','gambar'])->paginate(10);
            return response()->json($searchRes, 200);
        }
        else{
            $siswas = User::with('kelas')
                ->where('role', 'siswa')
                ->select(['id', 'number_card', 'name', 'role', 'gender', 'kelas_id','gambar'])
                ->paginate(10);
            return response()->json($siswas, 200);
        }
    }


    public function edit($id)
    {
        $siswa = User::with('kelas')
            ->where('role', 'siswa')
            ->where('id', $id)
            ->select(['id', 'number_card', 'name', 'role', 'gender', 'kelas_id'])
            ->first();
        return response()->json($siswa, 200);
    }

    public function me()
    {
        $userLogin = User::with('kelas')
            ->where('id', Auth::user()->id)
            ->select(['id', 'number_card', 'name', 'role', 'gender', 'kelas_id', 'gambar'])
            ->first();
        return new MyProfile($userLogin);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'password' => 'required',
            'kelas_id' => 'required',
        ]);

        $defaultImage = '1RmUUDJLEkF6GKx4yoNN9tHt0IGvBCrH2';

        $siswa = User::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'role' => 'siswa',
            'password' => bcrypt($request->password),
            'kelas_id' => $request->kelas_id,
            'gambar' => 'https://drive.google.com/uc?id='. $defaultImage,
        ]);
        return response()->json(
            [
                'message' => 'Data Siswa Baru Ditambahkan',
            ],
            200,
        );
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        if ($request->name == $user->name && $request->gender == $user->gender && $request->kelas_id == $user->kelas_id) {
            return response()->json(
                [
                    'message' => 'Ubah Setidaknya 1 Data Untuk Update',
                ],
                401,
            );
        } else {
            $siswa = User::where('id', $id)->update($request->all());
            return response()->json(
                [
                    'message' => 'Data Siswa Berhasil Diperbarui',
                ],
                200,
            );
        }
    }

    public function updateImg(Request $request){
        $request->validate([
            'gambar' => 'required|image|max:2048|mimes:jpg'
        ],[
            'gambar.max' => 'Maksimum File Sebesar 2 MB',
            'gambar.mimes' => 'Format Gambar Harus JPG'
        ]);
        if($request->hasFile('gambar')){
            // Target Path
            $path = Config::get('filesystems.disks.google.targetPath');
            // Upload
            $fileName = $path . '/' . auth()->user()->number_card . '.jpg';
            Gdrive::put($fileName, $request->file('gambar'));

            // Get ID
            $myImage = Gdrive::myImage($path);

            // Set Public Permission
            Storage::disk('google')->setVisibility($myImage['path'], 'public');

            // Store Link to DB
            $request['gambar'] = $myImage['extra_metadata']['id'];
            User::where('id', auth()->user()->id)->update([
                'gambar' => 'https://drive.google.com/uc?id=' . $myImage['extra_metadata']['id'],
            ]);

            return response()->json([
                'message' => 'Foto Profil Berhasil Diperbarui'
            ], 200);
        }

    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->update([
                'password' => bcrypt('12345'),
            ]);
            return response()->json([
                'message' => 'Password Siswa Berhasil Direset',
            ]);
        }
    }

    public function destroy($id)
    {
        $siswa = User::findOrFail($id);
        if ($siswa) {
            $results = Result::where('user_id', $id)->delete();
            $candidates = Candidate::where('user_id', $id)->delete();
            $siswa->delete();
            return response()->json(
                [
                    'message' => 'Data Siswa Berhasil Dihapus',
                ],
                200,
            );
        }
    }

    public function checkPass(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);
        $auth = User::where('id', auth()->user()->id)->first();
        if ($auth && Hash::check($request->password, $auth->password)) {
            return response()->json(true, 200);
        } else {
            return response()->json(false, 401);
        }
    }

    public function changePass(Request $request)
    {
        $request->validate(
            [
                'new_password' => 'required|confirmed',
            ],
            [
                'new_password.confirmed' => 'Konfirmasi Password Tidak Cocok',
            ],
        );

        User::where('id', auth()->user()->id)->update([
            'password' => bcrypt($request->new_password),
        ]);

        return response()->json(
            [
                'message' => 'Password Berhasil Diubah. Silahkan Login Kembali',
            ],
            200,
        );
    }
}
