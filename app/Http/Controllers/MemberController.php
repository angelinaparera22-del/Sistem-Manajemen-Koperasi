<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
        return view('member.index', [
            'title' => 'Keanggotaan',
            'members' => Member::with('user')->latest()->get(),
        ]);
    }

    public function create()
    {
        // Ambil user yang role-nya Member dan belum punya profil Member
        $users = User::where('role', 'Member')->doesntHave('member')->get();

        return view('member.create', [
            'title' => 'Tambah Anggota',
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_id' => 'required|exists:users,id',
            'member_number' => 'required|unique:members,member_number',
            'identity_number' => 'required|unique:members,identity_number',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required|in:Active,Inactive',
            'joined_date' => 'required|date',
        ]);

        DB::beginTransaction();
        try {
            Member::create($validate);
            DB::commit();
            return to_route('member.index')->withSuccess('Data anggota berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('member.create')->withError('Gagal menambahkan anggota: ' . $e->getMessage());
        }
    }

    public function edit(Member $member)
    {
        return view('member.edit', [
            'title' => 'Edit Anggota',
            'member' => $member,
        ]);
    }

    public function update(Request $request, Member $member)
    {
        $validate = $request->validate([
            'member_number' => 'required|unique:members,member_number,' . $member->id,
            'identity_number' => 'required|unique:members,identity_number,' . $member->id,
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required|in:Active,Inactive',
            'joined_date' => 'required|date',
        ]);

        DB::beginTransaction();
        try {
            $member->update($validate);
            DB::commit();
            return to_route('member.index')->withSuccess('Data anggota berhasil diubah');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('member.edit', $member)->withError('Gagal mengubah anggota: ' . $e->getMessage());
        }
    }

    public function destroy(Member $member)
    {
        DB::beginTransaction();
        try {
            $member->delete();
            DB::commit();
            return to_route('member.index')->withSuccess('Data anggota berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('member.index')->withError('Gagal menghapus anggota: ' . $e->getMessage());
        }
    }
}
