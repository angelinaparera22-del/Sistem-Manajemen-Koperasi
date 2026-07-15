<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        $setting = (object) $settings->all();

        return view('setting.index', [
            'title' => 'Setting',
            'setting' => $setting,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validate = $request->validate([
            'app_name' => 'required',
            'copyright' => 'required',
            'login_title' => 'required',
            'keywords' => 'nullable',
            'description' => 'nullable',
            'interest_rate_default' => 'required|numeric|min:0',
            'late_penalty_fee' => 'required|numeric|min:0',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:512'
        ], [
            'app_name.required' => 'Nama aplikasi wajib diisi',
            'copyright.required' => 'Copyright wajib diisi',
            'login_title.required' => 'Judul login wajib diisi',
            'interest_rate_default.required' => 'Persentase bunga wajib diisi',
            'late_penalty_fee.required' => 'Denda keterlambatan wajib diisi',
            'logo.image' => 'File logo harus berupa gambar',
            'logo.mimes' => 'Format logo harus png, jpg, jpeg, atau svg',
            'logo.max' => 'Ukuran logo tidak boleh lebih dari 512 KB',
        ]);

        DB::beginTransaction();

        try {
            if ($request->file('logo')) {
                $validate['logo'] = $request->file('logo')->store('img', 'public');
                $oldLogo = Setting::where('key', 'logo')->value('value');
                if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                    Storage::disk('public')->delete($oldLogo);
                }
            }

            foreach ($validate as $key => $value) {
                if ($value !== null || $key === 'logo') {
                    Setting::updateOrCreate(
                        ['key' => $key],
                        ['value' => $value]
                    );
                }
            }

            DB::commit();
            return to_route('setting.index')->withSuccess('Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('setting.index')->withError('Gagal menyimpan data: ' . $e->getMessage());
        }
    }
}
