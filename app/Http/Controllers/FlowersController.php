<?php

namespace App\Http\Controllers;

use App\Models\Categ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Flowers;
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

class FlowersController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'Custom Flowers'
        ];
        return view("customFlowers.index", $data);
    }

    public function jsonFlowersList(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows per page

        $columnIndex = $request->get('order')[0]['column']; // Column index
        $columnName = $request->get('columns')[$columnIndex]['data']; // Column name
        $columnSortOrder = $request->get('order')[0]['dir']; // asc or desc
        $searchValue = $request->get('search')['value']; // Search value

        // Total records
        $totalRecords = Flowers::count();

        // Total records with filtering
        $totalRecordswithFilter = Flowers::where('name_flower', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Flowers::where('name_flower', 'like', '%' . $searchValue . '%')
            ->orderBy($columnName, 'desc')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = [];
        $i = $start + 1;
        foreach ($records as $record) {
            $data_arr[] = [
                "id" => $i++,
                "name" => $record->name_flower,
                "price" => 'Rp ' . number_format($record->price, 0, ',', '.'),
                "images" => $record->images != "" ? '<img src="' . asset('assets/images/product/' . $record->images) . '" width="60">' : '<img src="' . asset('assets/images/No_Image_Available.jpg') . '" width="60">',
                "status" => $record->status == 1 ? 'Active' : 'InActive',
                "action" => '
                <a href="#" onclick="CrudFlowers(\'Update\',\'' . $record->id . '\')" class="btn btn-sm btn-primary">Edit</a>
                 <a href="#" onclick="CrudFlowers(\'Delete\',\'' . $record->id . '\')" class="ml-1 btn btn-sm btn-danger">Delete</a>
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
        $data = Flowers::where('id', $id)->get();
        return response()->json(['success' => true, 'data' => $data]);
    }



    public function jsonCrudFlowers(Request $req)
    {
        $act = $req->CrudAction;
        $imageName = null;
        if ($req->hasFile('images')) {
            $file = $req->file('images');
            $imageName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('assets/images/product/'), $imageName);
        }
        $data = [
            "name_flower" => $req->name_flower,
            "price" => $req->price,
            "images" => $imageName,
            "group_product_id" => $req->group_product_id,
            "status" => isset($req->status) ? 1 : 0,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => $req->session()->get('user_id'),
        ];
        switch (strtolower($act)) {
            case "create":
                Flowers::Create($data);
                break;
            case "update":
                $supp = Flowers::find($req->id);
                $supp->name_flower = $req->name_flower;
                $supp->group_product_id = $req->group_product_id;
                if ($imageName) $supp->images = $imageName;
                $supp->price = $req->price;
                $supp->status = isset($req->status) ? 1 : 0;
                $supp->save();
                break;
            case "delete":
                Flowers::where('id', $req->id)->delete();
                break;
        }

        try {
            DB::commit();
            return response()->json(['success' => true, 'msg' => 'Successfully', 'data' => $req->name_flower]);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['success' => false, 'msg' => $ex->getMessage()]);
        }
    }

    public function searchCategory(Request $request)
    {
        $search = $request->q;
        $categories = Categ::where('name', 'like', "%$search%")->get();

        return response()->json($categories->map(function ($cat) {
            return ['id' => $cat->id, 'text' => $cat->name];
        }));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Categ::firstOrCreate(['name' => $request->name]);

        return response()->json(['id' => $category->id, 'text' => $category->name]);
    }

    public function destroyCategory($id)
    {
        $category = Categ::findOrFail($id);
        $category->delete();

        return response()->json(['status' => 'deleted']);
    }
}
