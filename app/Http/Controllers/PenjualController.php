<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use Illuminate\Http\Request;

class PenjualController extends Controller
{
    public function index()
    {
        $penjuals = Penjual::paginate(10);
        return view('admin.penjual.index', compact('penjuals'));
    }

    public function destroy($id)
    {
        $penjual = Penjual::findOrFail($id);
        $penjual->delete();

        return redirect()->route('admin.penjual.index')
                         ->with('success', 'Akun penjual berhasil dihapus.');
    }
}
