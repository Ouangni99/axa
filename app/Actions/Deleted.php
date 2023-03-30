<?php
namespace App\Actions;

use App\Models\BaseModel;
use Lorisleiva\Actions\Concerns\AsAction;

class Deleted
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
     * @return  array
     */
    public function handle(int $rowID ,string $table) : array
    {
        // new model instance
        $baseModel = new BaseModel;

        // set default response
        $type = 'error';
        $message = 'Oups une erreur s\'est produite. veuillez réessayer plus tard.';

        // deleted
        if(!empty($rowID)){
            $response = $baseModel->deletedRow( $table , $rowID);
            if(!empty($response)){
                $type = 'success';
                $message = 'Suppression effectué.';
            }else{
                $type = 'warning';
                $message = 'Oups une erreur est survenue lors de la suppression.';
            }
        }else{
            $type = 'danger';
            $message = 'Oups impossible de supprimer cette donnée';
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
