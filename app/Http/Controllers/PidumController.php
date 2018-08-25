<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pidum;

class PidumController extends Controller
{
    public function index()
    {
      $pidum = Pidum::all();

      return view('pidum/index', ['pidum' => $pidum]);
    }

    public function view(Request $req, $id)
    {
      $pidum = Pidum::find($id);
      return view('pidum/view', ['pidum' => $pidum]);
    }

    public function update(Request $req, $id)
    {
      $this->validate($req, [
        'no_reg' => 'required|min:3',
        'tgl_reg' => 'required',
        'institusi_penyidik' => 'required',
        'nama_terdakwa' => 'required',
        'status' => 'required'
      ]);

      Pidum::find($id)->update([
        'no_reg' => $req->no_reg,
        'tgl_reg' => $req->tgl_reg,
        'jenis_perkara' => $req->jenis_perkara,
        'kasus_posisi' => $req->kasus_posisi,
        'surat_dakwaan' => $req->surat_dakwaan,
        'institusi_penyidik' => $req->institusi_penyidik,
        'nama_terdakwa' => $req->nama_terdakwa,
        'pasal_yang_dibuktikan' => $req->pasal_yang_dibuktikan,
        'pasal_yang_didakwakan' => $req->pasal_yang_didakwakan,
        'amar_putusan' => $req->amar_putusan,
        'status' => $req->status,
        'tanggal_eksekusi' => $req->tanggal_eksekusi
      ]);

      $pidum = Pidum::all();
      return view('pidum/index', ['pidum' => $pidum]);
    }

    public function delete($id)
    {
      $perkara = Pidum::find($id);
      $perkara->delete();
      $pidum = Pidum::all();
      return view('pidum/index', ['pidum' => $pidum]);
    }

    public function form()
    {
      return view('pidum/form');
    }

    public function insert(Request $req)
    {
      $this->validate($req, [
        'no_reg' => 'required|min:3',
        'tgl_reg' => 'required',
        'institusi_penyidik' => 'required',
        'nama_terdakwa' => 'required',
        'status' => 'required'
      ]);

      Pidum::create([
        'no_reg' => $req->no_reg,
        'tgl_reg' => $req->tgl_reg,
        'jenis_perkara' => $req->jenis_perkara,
        'kasus_posisi' => $req->kasus_posisi,
        'surat_dakwaan' => $req->surat_dakwaan,
        'institusi_penyidik' => $req->institusi_penyidik,
        'nama_terdakwa' => $req->nama_terdakwa,
        'pasal_yang_dibuktikan' => $req->pasal_yang_dibuktikan,
        'pasal_yang_didakwakan' => $req->pasal_yang_didakwakan,
        'amar_putusan' => $req->amar_putusan,
        'status' => $req->status,
        'tanggal_eksekusi' => $req->tanggal_eksekusi
      ]);

      $pidum = Pidum::all();
      return view('pidum/index', ['pidum' => $pidum]);
    }
}