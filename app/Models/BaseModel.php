<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaseModel extends Model
{
    use HasFactory;

    // variable
    public $active = 1;
    public $deleted = 0;

    /**
     * get data in data base if table row is not empty
     */
    public function foundFormData(string $permissionTable , int $rowID) : mixed
    {
        // set query
        $query = DB::table($permissionTable)
               ->where('active', $this->active)
               ->where('deleted', $this->deleted)
               ->find($rowID);

        // return
        return $query;
    }

    /**
     * check if row exist
     * @var string $name
     * @var string $table
     */
    public function rowNameExists( string $table , string $name) :bool
    {
        // set query data
        $query = DB::table($table)
                ->where([
                    ['name',$name],
                    ['active', $this->active],
                    ['deleted', $this->deleted],
                ])
                ->exists();

        // return
        return $query;
    }


    /**
     * check if row exist
     * @var string $name
     * @var string $table
     */
    public function rowExists( string $table , array $conditions) :bool
    {
        // set query data
        $query = DB::table($table)
                ->where($conditions)
                ->exists();

        // return
        return $query;
    }


    /**
     * delete row in data base
     * @var string $table
     * @var int $ID
     */
    public function deletedRow(string $table, int $ID) :mixed
    {
        // set query data
        $query = DB::table($table)->where('id',$ID)->update([
            'deleted'            => 1, // deleted for the user by not in data base
        ]);

        // return
        return $query;
    }


    /**
     * disable row in data base
     * @var string $table
     * @var int $ID
     */
    public function DISABLERow(string $table, int $ID , $statusValue) :mixed
    {
        // get status
        $status = (isset($statusValue) && !empty($statusValue) && intval($statusValue) > 1 && intval($statusValue)  === 2 ) ? 1 : 2 ;

        // dd($status);
        // set query data
        $query = DB::table($table)->where('id',$ID)->update([
            'status'            => $status, // line disable
        ]);

        // return
        return $query;
    }


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
