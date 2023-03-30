<?php
namespace App\Actions;

use App\Models\BaseModel;
use Lorisleiva\Actions\Concerns\AsAction;

class Disable
{
    // variable
    public $active = 1;
    public $deleted = 0;

    // call action
    use AsAction;
    /**
     * Show the form for creating a new resource.
     * @var int $rowID
     * @var string $table
     * @var int $statusValue
     * @return  array
     */
    public function handle(int $rowID ,string $table , int $statusValue) : array
    {
        // new model instance
        $baseModel = new BaseModel;

        // set default response
        // $type = 'danger';
        // $message = 'Opps Une est survenue.';

        // deleted
        if(!empty($rowID)){
            $response = $baseModel->DISABLERow($table ,$rowID ,$statusValue);
            if(!empty($response)){
                $type = 'success';
                $message = 'Ligne mis à jour';
            }else{
                $type = 'warning';
                $message = 'Une est survenue.';
            }
        }else{
            $type = 'error';
            $message = 'Opps Une est survenue';
        }

        // Set the response
        $data = [
            'type' => $type,
            'message' => $message,
        ];

        // return
        return $data;
    }
}
