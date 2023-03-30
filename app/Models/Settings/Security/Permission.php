<?php

namespace App\Models\Settings\Security;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    // variable
    public $active = 0;
    public $deleted = 0;

    // protected database field
    protected $fillable = [
        'name',
        'description',
        'active',
        'deleted',
        'status',
        'guard_name',
        'deleted_by',
        'deleted_at',
        'created_by',
        'updated_by',
    ];


    /*
     * set server side query
     */
    public function serverSideQuery($columns_list, $table, $search_text): mixed
    {
        // status
        $status = (isset($_REQUEST['status']) && !empty($_REQUEST['status'])) ? $_REQUEST['status'] : '';

        // query
        $query = DB::table($table)
        ->when($search_text, function ($query) use ($search_text, $columns_list) {
            $query->where(function ($subQuery) use ($search_text, $columns_list) {
                $subQuery->where($columns_list[1], 'LIKE', '%' . $search_text . '%');
                // loop through all the other columns
                for ($i = 2; $i < count($columns_list); $i++) {
                    $subQuery->orWhere($columns_list[$i], 'LIKE', '%' . $search_text . '%');
                } // End loop
            });
        })
        ->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        })
        ->where('deleted', 0)
        ->where('active', 1);

        return $query;
    }
}
