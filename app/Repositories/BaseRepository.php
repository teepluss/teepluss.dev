<?php

namespace App\Repositories;

abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Specify Model class name
     *
     * @return string
     */
    abstract public function model();

    /**
     * @return Model
     * @throws RepositoryException
     */
    public function __construct()
    {
        $this->makeModel();
    }

    public function makeModel()
    {
        $this->model = app($this->model());
    }

    public function where($key, $value)
    {
        $this->model->where($key, $value);

        return $this;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->get();
    }
}
