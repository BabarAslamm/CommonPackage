<?php

namespace Insyghts\Common\Observers;

class ModelObserver {

    protected $userID;

    public function __construct(){
        $this->userID = app('loginUser')->getUser()->id;
    }

    public function saving($model)
    {
        $model->created_by = $this->userID;
        $model->last_modified_by = $this->userID;
    }

    // public function saved($model)
    // {
    //     $model->created_by = $this->userID;
    //     $model->last_modified_by = $this->userID;
    // }

    public function updating($model)
    {
        $model->last_modified_by = $this->userID;
    }

    // public function updated($model)
    // {
    //     $model->last_modified_by = $this->userID;
    // }

    public function creating($model)
    {
        $model->created_by = $this->userID;
        $model->last_modified_by = $this->userID;
    }

    // public function created($model)
    // {
    //     $model->created_by = $this->userID;
    //     $model->last_modified_by = $this->userID;
    // }

    public function removing($model)
    {
        $model->deleted_by = $this->userID;
    }

    // public function removed($model)
    // {
    //     $model->deleted_by = $this->userID;
    // }
}
