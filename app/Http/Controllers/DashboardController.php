<?php

namespace App\Http\Controllers;

use App\Models\MonitorStock;
use App\Models\Part;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Administrator\App\Models\Users;
use Svg\Tag\Rect;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'Flowers'
        ];
        return view("dashboard.index", $data);
    }

    public function jsonAllPart()
    {
        return response()->json(Part::all()->count());
    }

    public function jsonAllSupplier()
    {
        return response()->json(Supplier::all()->count());
    }

    public function jsonTableStock()
    {
        $resp = DB::table('vw_monitorstock as a')
            ->select('a.*')
            ->get();
        return response()->json($resp);
    }

    public function jsonStockPart(Request $req)
    {
        $resp = DB::table('vw_monitorstock as a')
            ->whereRaw('stockStatus COLLATE utf8mb4_unicode_ci = ?', [$req->types])
            ->select('a.*')
            ->count();
        return response()->json($resp);
    }

    public function jsonGraphStockPart(Request $req)
    {
        $resp = DB::table('vw_monitorstock as a')
            ->select('a.stockStatus', DB::raw('COUNT(*) as count'))
            ->groupBy('a.stockStatus')
            ->get();
        return response()->json($resp);
    }
}
