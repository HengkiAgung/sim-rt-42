<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use App\Models\Family;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManagementFamilyController extends Controller
{
    public function index()
    {
        return view('family.index');
    }

    public function detail($id)
    {
        $family = Family::whereId($id)->with('citizens')->first();
        $citizens = Citizen::all();

        return view('family.detail-family', compact('family', 'citizens'));
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

    public function getDataTable()
    {
        $query = Family::orderBy('id', 'desc')->with('citizens');

        return DataTables::of($query)
            ->addColumn('total_family', function ($family) {
                return $family->citizens->count();
            })
            ->addColumn('action', function ($query) {
                $detail = '
                <li>
                    <div class="btn-edit">
                        <a href="'. route('family.detail', ['id' => $query->id]) .'" class="dropdown-item py-2"><i class="fa-solid fa-eye me-3"></i>Detail</a>
                    </div>
                </li>
                ';
                $edit = '
                <li>
                    <div class="btn-edit" onclick="fillForm(' . $query->id . ', \'' . $query->head_of_family . '\' , \'' . $query->card_number . '\',\'' . $query->address . '\',\'' . $query->phone . '\',\'' . $query->rt . '\',\'' . $query->rw . '\',\'' . $query->sub_district . '\',\'' . $query->district . '\',\'' . $query->city . '\',\'' . $query->postal_code . '\',\'' . $query->province . '\')">
                        <a href="#modal_edit_family" data-bs-toggle="modal" class="dropdown-item py-2"><i class="fa-solid fa-pen me-3"></i>Edit</a>
                    </div>
                </li>
                ';
                $delete = '<li><button onclick="deleteFamily(\'' . $query->id . '\')" class="dropdown-item py-2"><i class="fa-solid fa-trash me-3"></i>Delete</button></li>';

                return '
                <button type="button" class="btn btn-secondary btn-icon btn-sm" data-kt-menu-placement="bottom-end" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                <ul class="dropdown-menu">
                ' . $detail . '
                ' . $edit . '
                ' . $delete . '
                </ul>
                ';
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function assignCitizen(Request $request)
    {
        try {
            $request->validate([
                "family_id" => 'required',
                "citizen_id" => 'required',
            ]);

            Citizen::whereId($request->citizen_id)->update([
                "family_id" => $request->family_id
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

    public function getMemberDataTable(Request $request)
    {
        $query = Citizen::where('family_id', $request->id);

        return DataTables::of($query)
            ->addColumn('action', function ($query) {
                // $edit = '
                // <li>
                //     <div class="btn-edit" onclick="fillForm(' . $query->id . ', \'' . $query->head_of_family . '\' , \'' . $query->card_number . '\',\'' . $query->address . '\',\'' . $query->phone . '\',\'' . $query->rt . '\',\'' . $query->rw . '\',\'' . $query->sub_district . '\',\'' . $query->district . '\',\'' . $query->city . '\',\'' . $query->postal_code . '\',\'' . $query->province . '\')">
                //         <a href="#modal_edit_family" data-bs-toggle="modal" class="dropdown-item py-2"><i class="fa-solid fa-pen me-3"></i>Edit</a>
                //     </div>
                // </li>
                // ';
                // $delete = '<li><button onclick="deleteFamily(\'' . $query->id . '\')" class="dropdown-item py-2"><i class="fa-solid fa-trash me-3"></i>Delete</button></li>';

                // return '
                // <button type="button" class="btn btn-secondary btn-icon btn-sm" data-kt-menu-placement="bottom-end" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                // <ul class="dropdown-menu">
                // ' . $edit . '
                // ' . $delete . '
                // </ul>
                // ';
                return '<button onclick="deleteMember(\'' . $query->id . '\')" class="btn btn-danger btn-icon btn-sm"><i class="fa-solid fa-trash"></i></button>';
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function deleteMember(Request $request) {
        try {
            Citizen::whereId($request->id)->update([
                "family_id" => null
            ]);

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
}
