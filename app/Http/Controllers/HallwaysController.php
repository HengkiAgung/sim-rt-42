<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use App\Models\Hallway;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HallwaysController extends Controller
{
    public function index()
    {
        $dataCitizen = Citizen::all();
        return view('hallways.index', compact('dataCitizen'));
    }

    public function getDataTable()
    {
        $query = Hallway::orderBy('id', 'desc')->with('chief');

        return DataTables::of($query)
            ->addColumn('chief', function ($hallway) {
                return !$hallway->chief ? '-' : $hallway->chief->name;
            })
            ->addColumn('action', function ($hallway) {
                $edit = '
                    <div class="btn-edit" onclick="fillForm('.$hallway->id.', \''.$hallway->name.'\','.$hallway->chief_id.')">
                        <a href="#modal_edit_hallway" data-bs-toggle="modal" class="dropdown-item py-2"><i class="fa-solid fa-pen me-3"></i>Edit</a>
                    </div>
                ';
                $delete = '<button onclick="deleteHallway(\'' . $hallway->id . '\')" class="dropdown-item py-2"><i class="fa-solid fa-trash me-3"></i>Delete</button>';

                return '
                ' . $edit . '
                ' . $delete ;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'chief_id' => 'required'
        ]);

        Hallway::create($request->all());

        return response()->json(['message' => 'Hallway has been created']);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'chief_id' => 'required'
        ]);

        Hallway::find($request->id)->update($request->all());

        return response()->json(['message' => 'Hallway has been updated']);
    }

    public function delete(Request $request)
    {
        Hallway::find($request->id)->delete();

        return response()->json(['message' => 'Hallway has been deleted']);
    }
}
