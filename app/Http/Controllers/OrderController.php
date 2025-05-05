<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Shipping;
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

class OrderController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'Order'
        ];
        return view("order.index", $data);
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

        // Total records (tanpa filter)
        $totalRecords = DB::table('vw_trn_sales')->count();

        // Total records (dengan filter pencarian)
        $totalRecordswithFilter = DB::table('vw_trn_sales')
            ->where('no_transaction', 'like', '%' . $searchValue . '%')
            ->count();

        // Ambil data records (dengan filter + paginasi + sorting)
        $records = DB::table('vw_trn_sales')
            ->where('no_transaction', 'like', '%' . $searchValue . '%')
            ->orderBy('created_at', $columnSortOrder) // contoh: 'created_at', 'desc'
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = [];
        $i = $start + 1;
        foreach ($records as $record) {
            $data_arr[] = [
                "id" => $i++,
                "no_transaction" => $record->no_transaction,
                "name" => $record->firstname . ' ' . $record->lastname,
                "phone" => $record->phone,
                "address" => $record->address,
                "status" => '<span class="badge badge-info sm">' . $record->status . '</span>',
                // "action" => '
                // <a href="#" onclick="Crud(\'Update\',\'' . $record->id . '\')" class="btn btn-sm btn-primary">Edit</a>
                //  <a href="#" onclick="Crud(\'Delete\',\'' . $record->id . '\')" class="ml-1 btn btn-sm btn-danger">Delete</a>
                // '
            ];
        }

        return response()->json([
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecordswithFilter,
            "data" => $data_arr
        ]);
    }
}
