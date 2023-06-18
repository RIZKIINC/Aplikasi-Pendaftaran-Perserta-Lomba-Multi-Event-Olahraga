<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class SubDistrictProfileController extends Controller
{
    public function indexupdateSubProfile()
    {
        $subdisctrictprofile = DB::table('sub_district_profiles')->where('sub_district_profiles.id_user', Auth::user()->id)->get();
        $contactpeople = DB::table('contact_people')->get();
        $kecamatan = DB::table('tbl_kecamatan')->get();

        $postalCode = '';
        $kecamatanName = $kecamatan->where('id_kecamatan', $subdisctrictprofile[0]->id_kecamatan)->pluck('nama_kecamatan')->first();
        $response = Http::get('https://kodepos.vercel.app/search', ['q' => $kecamatanName]);
        $data = $response->json();
        $postalCodes = $data['data'];

        foreach ($postalCodes as $postal) {
            if ($postal['subdistrict'] === $kecamatanName) {
                $postalCode = $postal['postalcode'];
                break;
            }
        }

        $data = array(
            'menu' => 'subdisctrictprofile',
            'submenu' => 'subdisctrictprofile',
            'subdisctrictprofile' => $subdisctrictprofile,
            'contactpeople' => $contactpeople,
            'kecamatan' => $kecamatan,
            'postalCode' => $postalCode
        );
        // dd($subdisctrictprofile);
        return view('user.subdistrict.subdistrictdata', $data);
    }
    private function fetchPostalCode($subdistrict)
    {
        $postalCode = '';
        $response = Http::get('https://kodepos.vercel.app/search', ['q' => $subdistrict]);
        $data = $response->json();
        $postalCodes = $data['data'];

        foreach ($postalCodes as $postal) {
            if ($postal['subdistrict'] === $subdistrict) {
                $postalCode = $postal['postalcode'];
                break;
            }
        }

        return $postalCode;
    }

    public function updateSubProfile(Request $post)
    {
        $postalCode = $this->fetchPostalCode($post->id_kecamatan);

        $id_kecamatan2 = DB::table('tbl_kecamatan')->where('nama_kecamatan', $post->id_kecamatan)->pluck('id_kecamatan')->first();

        $lala = DB::table('sub_district_profiles')->update([
            'id_user' => Auth::user()->id,
            'id_kecamatan' => $id_kecamatan2,
            'kode_kecamatan' => $post->kode_kecamatan,
            'nama_camat' => $post->nama_camat,
            'telp_camat' => $post->telp_camat,
            'alamat' => $post->alamat,
            'email' => $post->email,
            'kodepos' => $postalCode,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/subprofil/editsubprofil');
    }

    public function indexContactPeople()
    {
        $contactpeople = DB::table('contact_people')->get();
        $data = array(
            'menu' => 'contactpeople',
            'submenu' => 'contactpeople',
            'contactpeople' => $contactpeople,
        );
        return view('user.subdistrict.subdistrictdata', $data);
    }

    public function updateContactPeople(Request $post)
    {

        DB::table('contact_people')->where('id', $post->id)->update([
            'id' => $post->id,
            'id_profile' => $post->id_profile,
            'nama_kontak' => $post->nama_kontak,
            'jabatan_kontak' => $post->jabatan_kontak,
            'telp_kontak' => $post->telp_kontak,
            'email_kontak' => $post->email_kontak,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/subprofil/editsubprofil');
    }
}
