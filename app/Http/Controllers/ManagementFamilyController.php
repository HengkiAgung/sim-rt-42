<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManagementFamilyController extends Controller
{
    public function index()
    {
        return view('family.index');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                "head_of_family" => 'required',
                "card_number" => 'required',
                "address" => 'required',
                "phone" => 'required',
            ]);

            Family::create([
                "head_of_family" => $request->head_of_family,
                "card_number" => $request->card_number,
                "address" => $request->address,
                "phone" => $request->phone,
                "rt" => $request->rt,
                "rw" => $request->rw,
                "sub_district" => $request->sub_district,
                "district" => $request->district,
                "city" => $request->city,
                "postal_code" => $request->postal_code,
                "province" => $request->province,
            ]);

            return response()->json([
                "status" => "success",
                "message" => "Data berhasil disimpan"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => $th->getMessage()
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                "head_of_family" => 'required',
                "card_number" => 'required',
                "address" => 'required',
                "phone" => 'required',
            ]);

            Family::whereId($request->id)->update([
                "head_of_family" => $request->head_of_family,
                "card_number" => $request->card_number,
                "address" => $request->address,
                "phone" => $request->phone,
                "rt" => $request->rt,
                "rw" => $request->rw,
                "sub_district" => $request->sub_district,
                "district" => $request->district,
                "city" => $request->city,
                "postal_code" => $request->postal_code,
                "province" => $request->province,
            ]);

            return response()->json([
                "status" => "success",
                "message" => "Data berhasil disimpan"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => $th->getMessage()
            ]);
        }
    }

    public function delete(Request $request)
    {
        try {
            Family::whereId($request->id)->delete();

            return response()->json([
                "status" => "success",
                "message" => "Data berhasil dihapus"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => $th->getMessage()
            ]);
        }
    }

    public function getDataTable(Request $request)
    {
        $query = Family::orderBy('id', 'desc')->with('citizens');

        return DataTables::of($query)
            ->addColumn('total_family', function ($family) {
                return $family->citizens->count();
            })
            ->addColumn('action', function ($hallway) {
                $edit = '
                <li>
                    <div class="btn-edit" onclick="fillForm(' . $hallway->id . ', \'' . $hallway->name . '\',' . $hallway->chief_id . ')">
                        <a href="#modal_edit_family" data-bs-toggle="modal" class="dropdown-item py-2"><i class="fa-solid fa-pen me-3"></i>Edit</a>
                    </div>
                </li>
                ';
                $delete = '<li><button onclick="deleteHallway(\'' . $hallway->id . '\')" class="dropdown-item py-2"><i class="fa-solid fa-trash me-3"></i>Delete</button></li>';

                return '
                <button type="button" class="btn btn-secondary btn-icon btn-sm" data-kt-menu-placement="bottom-end" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                <ul class="dropdown-menu">
                ' . $edit . '
                ' . $delete . '
                </ul>
                ';
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
