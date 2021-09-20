<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request;

class OwnSearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('users')
                    ->where('full_name', 'like', '%' . $query . '%')
                    ->get();
            }

            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                    <tr style="border-bottom: 1px solid red;">
                    <td>' . $row->full_name . '</td>
                    <td>' . $row->email . '</td>
                    <td>   <button type="button" class="btn btn-success btn-sm float-right Mmember"  data-toggle="tooltip"  data-placement="top"
                    title="Click to add" data-memberid="' . $row->id . '"  data-name="' . $row->full_name . '" data-type="normaltasks">
                    <i class="fa fa-check"  aria-hidden="true"></i>  Add </button> </td>
                    </tr>
                    ';
                }
            } else {
                $output = '
                <tr  style="border-bottom: 1px solid red;">
                <td colspan="4">Couldnt find members</td>
                <tr>
                ';
            }



            $data = array(
                'table_data'  => $output
                // 'total_data'  => $total_row
            );
            echo json_encode($data);
        }
    }
}
