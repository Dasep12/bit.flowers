<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FlowerTypes;
use App\Models\Product;
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

class ProductController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'Product',
            'FlowerType' => FlowerTypes::where('status', 1)->get(),
            'ProductType' => ProductTypes::where('status', 1)->get(),
            'Price' => DB::select('select * from tbl_mst_size'),
        ];
        return view("product.index", $data);
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
        $totalRecords = Product::count();

        // Total records with filtering
        $totalRecordswithFilter = Product::where('name_produk', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Product::select(
            'tbl_mst_produk.*',
            'tbl_mst_flowertype.name_type as flowerType',
            'tbl_mst_producttype.name_type as productType',
            DB::raw('(SELECT COUNT(*) FROM tbl_mst_price WHERE tbl_mst_price.product_id = tbl_mst_produk.id) AS price_count')
        )
            ->leftJoin('tbl_mst_flowertype', 'tbl_mst_produk.flowery_type_id', '=', 'tbl_mst_flowertype.id')
            ->leftJoin('tbl_mst_producttype', 'tbl_mst_produk.product_type_id', '=', 'tbl_mst_producttype.id')
            ->where('tbl_mst_produk.name_produk', 'like', '%' . $searchValue . '%')
            ->orderBy($columnName, 'desc')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = [];
        $i = $start + 1;
        foreach ($records as $record) {
            $data_arr[] = [
                "id" => $i++,
                "name_produk" => $record->name_produk,
                "productType" => $record->productType,
                "flowerType" => $record->flowerType,
                "description" => $record->description,
                "price_count" => $record->price_count,
                "status" => $record->status == 1 ? 'Aktif' : 'Tidak Aktif',
                "action" => '
                <a href="#" onclick="CrudProduct(\'Update\',\'' . $record->id . '\')" class="btn btn-sm btn-primary">Edit</a>
                 <a href="#" onclick="CrudProduct(\'Delete\',\'' . $record->id . '\')" class="ml-1 btn btn-sm btn-danger">Delete</a>
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
        $data = Product::where('id', $id)->get();
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function jsonCrud(Request $req)
    {
        $act = $req->CrudAction;
        // $imageName = null;
        // if ($req->hasFile('images')) {
        //     $file = $req->file('images');
        //     $imageName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        //     $file->move(public_path('assets/images/product/'), $imageName);
        // }
        $data = [
            "name_produk" => $req->name_produk,
            "flowery_type_id" => $req->flowery_type_id,
            "product_type_id" => $req->product_type_id,
            "type_sales" => 'INC',
            "description" => $req->description,
            "status" => isset($req->status) ? 1 : 0,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => $req->session()->get('user_id'),
        ];
        $lastInsertId = "";
        switch (strtolower($act)) {
            case "create":
                $product =  Product::Create($data);
                $lastInsertId = $product->id;
                break;
            case "update":
                $supp = Product::find($req->id);
                $supp->name_produk = $req->name_produk;
                $supp->flowery_type_id = $req->flowery_type_id;
                $supp->product_type_id = $req->product_type_id;
                $supp->description = $req->description;
                $supp->status = isset($req->status) ? 1 : 0;
                $supp->save();
                break;
            case "delete":
                Product::where('id', $req->id)->delete();
                break;
        }

        try {
            DB::commit();
            return response()->json(['success' => true, 'msg' => 'Successfully', 'data' => $req->name_produk, 'id' => $lastInsertId]);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['success' => false, 'msg' => $ex->getMessage()]);
        }
    }
}
