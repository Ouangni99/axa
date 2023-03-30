<?php

namespace App\Http\Controllers\Settings\Security;

use Throwable;
use App\Actions\Deleted;
use App\Actions\Disable;
use App\Models\BaseModel;
use Illuminate\View\View;
use App\Actions\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Settings\Security\Permission;

class PermissionController extends Controller
{

    // Shared variables
    public $permissionTable = 'permissions';

    public $columnsDefault = [
            0 => 'id',
            1 => 'name',
            2 => 'description',
            4 => 'status',
            3 => 'created_at',
    ];

    /**
     * Display Permission view.
     */
    public function index(): View
    {
        // set breadcrumb trail
        $breadcrumb = [
            'menu-title' => 'Paramètre',
            'menu-item' => [
                'Gestion des utilisateurs',
                'Permission'
            ]
        ];

        // return view
        return view('pages.settings.security.permission.permission', [
            'breadcrumbTrail' => $breadcrumb,
        ]);
    }


    /**
     * Display form view.
     * @var string $permissionTable
     * @var int $rowID
     */
    public function create(BaseModel $basemodel): View
    {
        // get row id
        $rowID = (isset($_POST['rowID']) && !empty(($_POST['rowID'])) && intval($_POST['rowID']) > 0) ? intval($_POST['rowID']) : 0;

        // find row id data base
        $data = $basemodel->foundFormData($this->permissionTable, $rowID);

        // return
        return view('pages.settings.security.permission.form', [
            'formData' => $data,
        ]);
    }


    /**
     * @var int $id
     * store and update permission
     */
    public function store(Request $request, BaseModel $basemodel , Permission $permission)
    {

        // Define validation rules
        $rules = [
            'name'          => 'required|string',
            'description'   => 'nullable|string',
            'id'            => 'required',
        ];

        // Validate form entries
        $validation = Validator::make($request->all(), $rules);

        // Return validation errors if they exist
        if ($validation->fails()) {
            return response()->json([
                'message' => $validation->errors(),
                'status'  => '500'
            ]);
        }

        // form data validaded
        $formValidated = $validation->validate();

        // Continue processing the form if the entries are valids
        // ...
        $classInstance = (!empty($permission->find($formValidated['id']))) ? $permission->find($formValidated['id']) : $permission;

        // set where clause
        $condition = [
            ['active',1],
            ['deleted',0],
            ['id','!=',$formValidated['id']],
            ['name',$formValidated['name']],
        ];

        // insert or update data
        if(!empty($classInstance->id)){

            // checks if the data exists
            if(empty($basemodel->rowExists($this->permissionTable , $condition))){
                // proccess to update data
                $classInstance->fill([
                    'name'          => mb_strtolower(trim($formValidated['name'])),
                    'description'   => mb_strtolower(trim($formValidated['description'])),
                    'updated_by'    =>  auth()->id(),
                ]);

                // Save the updated model to the database
                $classInstance->save();

                // Return a JSON success response if processing is successfully completed
                return response()->json([
                    'message' => 'Données mises à jour avec succès',
                    'status'  => '200'
                ]);
            }// end if
            else{
                // Return a JSON error response if processing is unsuccessfully completed
                return response()->json([
                    'message' => 'Cette ligne existe déjà dans le système',
                    'status'  => '400'
                ]);
            }
        }// end if
        else{
            // checks if the data exists
            if(empty($basemodel->rowExists($this->permissionTable , $condition))){
                // proccess to add data
                $classInstance->fill([
                    'name'          => mb_strtolower(trim($formValidated['name'])),
                    'description'   => mb_strtolower(trim($formValidated['description'])),
                    'active'        => 1,
                    'created_by'    =>  auth()->id(),
                ]);

                // Save the added model to the database
                $classInstance->save();

                // Return a JSON success response if processing is successfully completed
                return response()->json([
                    'message' => 'Données ajoutées avec succès',
                    'status'  => '200'
                ]);
            }// end if
            else{
                // Return a JSON error response if processing is unsuccessfully completed
                return response()->json([
                    'message' => 'Cette ligne existe déjà dans le système',
                    'status'  => '400'
                ]);
            }
        }


    }


    /**
     * @var array $columns_list
     * @var string $table
     * @return array $table
     * get permission table data
     */
    public function getData(Permission $permission) : array
    {
        // set server side query
        $query = $permission->serverSideQuery($this->columnsDefault , $this->permissionTable , $_REQUEST['search']['value']);

        // get data
        $data = $query->offset($_REQUEST['start'])->limit($_REQUEST['length'])->orderBy($this->columnsDefault[1], $_REQUEST['order'][0]['dir'])
        ->get()->toArray();

        // draw array
        $records = array(
            "recordsTotal"    => intval($query->count()),
            "recordsFiltered" => intval($query->count()),
            "data"            => $data
        );

        // return records
        return $records;
    }

    /**
     * deleted row
     * @return array $responses
     */
    public function deleteRow(Deleted $deleted) : array
    {
        // get row
        $permissionID = (isset($_POST['permissionID']) && !empty(($_POST['permissionID'])) && intval($_POST['permissionID']) > 0) ? intval($_POST['permissionID']) : 0;

        // call delete action
        $responses = $deleted->handle($permissionID, $this->permissionTable);

        // return
        return $responses;
    }

     /*
     * disable row
     */
    public function disableRow(Disable $desable){

        // get row
        $permissionID = (isset($_POST['permissionID']) && !empty(($_POST['permissionID'])) && intval($_POST['permissionID']) > 0) ? intval($_POST['permissionID']) : 0;
        $statusValue = (isset($_POST['statusValue']) && !empty(($_POST['statusValue'])) && intval($_POST['statusValue']) > 0) ? intval($_POST['statusValue']) : 0;

        // call delete action
        $responses = $desable->handle($permissionID ,$this->permissionTable , $statusValue);

        // return
        return $responses;
    }
}
