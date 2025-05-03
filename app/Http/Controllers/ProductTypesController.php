<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductTypes;
use Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;
use Illuminate\Support\Facades\Storage;

class ProductTypesController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'Product Types'
        ];
        return view("productTypes.index", $data);
    }

    public function jsonDataTableList(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows per page

        $columnIndex = $request->get('order')[0]['column']; // Column index
        $columnName = $request->get('columns')[$columnIndex]['data']; // Column name
        $columnSortOrder = $request->get('order')[0]['dir']; // asc or desc
        $searchValue = $request->get('search')['value']; // Search value

        // Total records
        $totalRecords = ProductTypes::count();

        // Total records with filtering
        $totalRecordswithFilter = ProductTypes::where('name_type', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = ProductTypes::where('name_type', 'like', '%' . $searchValue . '%')
            ->orderBy($columnName, 'desc')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = [];
        $i = $start + 1;
        foreach ($records as $record) {
            $data_arr[] = [
                "id" => $i++,
                "name" => $record->name_type,
                "remarks" => $record->remarks,
                "status" => $record->status == 1 ? 'Aktif' : 'Tidak Aktif',
                "action" => '
                <a href="#" onclick="Crud(\'Update\',\'' . $record->id . '\')" class="btn btn-sm btn-primary">Edit</a>
                 <a href="#" onclick="Crud(\'Delete\',\'' . $record->id . '\')" class="ml-1 btn btn-sm btn-danger">Delete</a>
                '
            ];
        }

        return response()->json([
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecordswithFilter,
            "data" => $data_arr
        ]);
    }

    public function jsonDetail(Request $req)
    {
        $id = $req->id;
        $data = ProductTypes::where('id', $id)->get();
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function jsonCrud(Request $req)
    {
        $act = $req->CrudAction;
        $data = [
            "name_type" => $req->name_type,
            "remarks" => $req->remarks,
            "status" => isset($req->status) ? 1 : 0,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => $req->session()->get('user_id'),
        ];
        switch (strtolower($act)) {
            case "create":
                ProductTypes::Create($data);
                break;
            case "update":
                $supp = ProductTypes::find($req->id);
                $supp->name_type = $req->name_type;
                $supp->remarks = $req->remarks;
                $supp->status = isset($req->status) ? 1 : 0;
                $supp->updated_at =  date('Y-m-d H:i:s');
                $supp->updated_by =  $req->session()->get('user_id');
                $supp->save();
                break;
            case "delete":
                ProductTypes::where('id', $req->id)->delete();
                break;
        }

        try {
            DB::commit();
            return response()->json(['success' => true, 'msg' => 'Successfully', 'data' => $req->name_type]);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['success' => false, 'msg' => $ex->getMessage()]);
        }
    }
}
