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
                "status" => $record->status == 1 ? 'Active' : 'InActive',
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

    public function jsonGallery(Request $req)
    {
        $id = $req->id;
        $data = DB::table('tbl_mst_catalog')
            ->select('tbl_mst_catalog.*')
            ->where('product_id', $id)
            ->get();
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function jsonDetailPrice(Request $req)
    {
        $id = $req->id;
        $data = DB::table('tbl_mst_price')
            ->select('tbl_mst_price.*')
            ->where('id', $id)
            ->get();
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function jsonDataTablePriceList(Request $req)
    {
        $draw = $req->get('draw');
        $start = $req->get("start");
        $rowperpage = $req->get("length"); // Rows per page

        $columnIndex = $req->get('order')[0]['column']; // Column index
        $columnName = $req->get('columns')[$columnIndex]['data']; // Column name
        $columnSortOrder = $req->get('order')[0]['dir']; // asc or desc
        $searchValue = $req->get('search')['value']; // Search value

        // Total records
        $totalRecords = DB::table('tbl_mst_price')
            ->where('product_id', $req->product_id)
            ->count();

        // Total records with filtering
        $totalRecordswithFilter = DB::table('tbl_mst_price')
            ->where('tbl_mst_price.product_id', '=', $req->product_id)
            ->where('tbl_mst_price.price', 'like', '%' . $searchValue . '%')
            ->count();

        // Fetch records
        $records = DB::table('tbl_mst_price')
            ->select(
                'tbl_mst_price.*',
                'tbl_mst_size.name as size'
            )
            ->leftJoin('tbl_mst_size', 'tbl_mst_price.size_id', '=', 'tbl_mst_size.id')
            ->where('tbl_mst_price.product_id', '=', $req->product_id)
            ->where('tbl_mst_price.price', 'like', '%' . $searchValue . '%')
            ->orderBy($columnName, 'desc')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = [];
        $i = 1;
        foreach ($records as $record) {
            $data_arr[] = [
                "id" => $i++,
                "size" => $record->size,
                "price" => number_format($record->price, 0, '', ','),
                "discount" => $record->discount . '%',
                "action" => '
                <a href="#" onclick="CrudPrice(\'Update\',\'' . $record->id . '\')" class="btn btn-sm btn-primary">Edit</a>
                 <a href="#" onclick="CrudPrice(\'Delete\',\'' . $record->id . '\')" class="ml-1 btn btn-sm btn-danger">Delete</a>
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

    public function jsonCrudPrice(Request $req)
    {
        $act = $req->CrudPriceAction;
        $data = [
            "size_id" => $req->size_id,
            "price" => str_replace(',', '', $req->price),
            "discount" => str_replace(',', '', $req->discount),
        ];
        $imageName = null;
        if ($req->hasFile('images')) {
            $file = $req->file('images');
            $imageName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('assets/images/product/'), $imageName);
        }
        $lastInsertId = "";
        switch (strtolower($act)) {
            case "create":
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['created_by'] = $req->session()->get('user_id');
                $data['product_id'] =  $req->product_id;
                $data['images'] =  $imageName;
                DB::table('tbl_mst_price')->insert($data);
                break;
            case "update":
                $data['updated_at'] = date('Y-m-d H:i:s');
                $data['updated_by'] = $req->session()->get('user_id');
                $data['product_id'] =  $req->product_id;
                if ($imageName) {
                    $data['images'] = $imageName;
                }
                DB::table('tbl_mst_price')->where('id', $req->idPrice)->update($data);
                break;
            case "delete":
                DB::table('tbl_mst_price')->where('id', $req->idPrice)->delete();
                break;
        }

        try {
            DB::commit();
            return response()->json(['success' => true, 'msg' => 'Successfully', 'data' => $req->product_id, 'id' => $lastInsertId]);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['success' => false, 'msg' => $ex->getMessage()]);
        }
    }

    public function jsonCrudCatalog(Request $request)
    {


        $act = $request->CrudCatalogAction;
        DB::beginTransaction();
        switch (strtolower($act)) {
            case "create":
                $request->validate([
                    'images.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
                ]);

                $paths = [];

                foreach ($request->file('images') as $image) {
                    $filename = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('assets/images/product/'), $filename);

                    $paths[] = [
                        'images' => $filename,
                        'product_id' => $request->product_id,
                    ];
                }
                DB::table('tbl_mst_catalog')->insert($paths);

                break;
            case "delete":
                DB::table('tbl_mst_catalog')->where('id', $request->id)->delete();
                break;
        }

        try {
            DB::commit();
            return response()->json(['success' => true, 'msg' => 'Successfully']);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['success' => false, 'msg' => $ex->getMessage()]);
        }
    }
}
