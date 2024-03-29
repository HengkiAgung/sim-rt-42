<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Yajra\DataTables\Facades\DataTables;

class ManagementCitizenController extends Controller
{
    public function index ()
    {
        return view('citizen.index');
    }

    public function getDataTable()
    {
        $citizen = Citizen::get(['id','nik', 'name', 'birthplace', 'birthdate', 'gender', 'address_domisili']);
        return DataTables::of($citizen)->addIndexColumn()->make();
    }

    public function store(Request $request)
    {
        $citizen = Citizen::create($request->except('ktp_file', 'pic_file'));

        if ($request->has('ktp_file')) {
            $citizen->ktp_file = $this->saveFile($request->ktp_file, 'file/ktp/');
        }

        if ($request->has('pic_file')) {
            $citizen->pic_file = $this->saveFile($request->pic_file, 'file/pic/');
        }

        $citizen->save();

        return response()->json(['status' => "Berhasil menambah data warga"]);
    }

    public function manageCitizen($id)
    {
        $citizen = Citizen::find($id);

        return view('citizen.manage', compact('citizen'));
    }

    public function update(Request $request, $id)
    {
        $citizen = Citizen::find($id);
        // dd($request->all());
        $citizen->update($request->except('ktp_file', 'pic_file'));

        if ($request->has('ktp_file')) {
           $citizen->ktp_file = $this->saveFile($request->ktp_file, 'file/ktp/', $citizen->ktp_file);
        }

        if ($request->has('pic_file')) {
            $citizen->pic_file = $this->saveFile($request->pic_file, 'file/pic/', $citizen->pic_file);
        }

        $citizen->save();

        return redirect()->route('citizen.manage', $citizen->id)->with('success', 'Berhasil melakukan update data warga');
    }

    private function saveFile($file, $path, $old_file = null)
    {
        if ($old_file) {
            if (File::exists(public_path($path). $old_file )) {
                FIle::delete(public_path($path). $old_file );
            }
        }

        $filename = STR::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)). '.' .$file->getClientOriginalExtension();

		$file->move($path,$filename);

        return $filename;
    }

    public function destroy($id)
    {
        $citizen = Citizen::find($id)->delete();

        return response()->json(['status' => 'Berhasil menghapus data warga']);
    }

    // getDataTable
}
