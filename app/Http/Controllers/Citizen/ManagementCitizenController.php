<?php

namespace App\Http\Controllers\Citizen;

use App\Exports\CitizenExport;
use App\Http\Controllers\Controller;
use App\Imports\CitizenImport;
use App\Models\Citizen;
use App\Models\Hallway;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ManagementCitizenController extends Controller
{
    public function index ()
    {
        $hallways = Hallway::get();

        return view('citizen.index', compact('hallways'));;
    }

    public function getDataTable()
    {
        $citizen = Citizen::with('hallway')->get();
        return DataTables::of($citizen)
        ->addColumn('age', function ($citizen) {
            return $citizen->age;
        })
        ->addColumn('hallway', function ($citizen) {
            return !$citizen->hallway ? '-' : $citizen->hallway->name;
        })
        ->addColumn('address_domisili', function ($citizen) {
            return $citizen->address_domisili ?? '-';
        })
        ->addIndexColumn()->make();
    }

    public function store(Request $request)
    {
        $citizen = Citizen::create($request->except('ktp_file', 'pic_file'));

        if ($request->has('pic_file')) {
            $citizen->pic_file = $this->saveFile($request->pic_file, 'file/pic/');
        }

        $citizen->save();

        return response()->json(['status' => "Berhasil menambah data warga"]);
    }

    public function manageCitizen($id)
    {
        $citizen = Citizen::find($id);
        $hallways = Hallway::get();

        return view('citizen.manage', compact('citizen', 'hallways'));
    }

    public function update(Request $request, $id)
    {
        $citizen = Citizen::find($id);
        $citizen->update($request->except('ktp_file', 'pic_file'));

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

    public function getExcelTemplate()
    {
        return Excel::download(new CitizenExport, 'warga.xlsx');
    }

    public function exportCitizen(Request $request)
    {
        Excel::import(new CitizenImport, $request->file('file')->store('temp'));

        return redirect()->route('citizen.index')->with('success', 'Berhasil export data warga');
    }
}
