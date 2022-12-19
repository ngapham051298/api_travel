<?php
namespace Base\Repositories;
abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $_model;

    public function __construct()
    {
        $this->_model;
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->_model = app()->make($this->getModel());
    }

    public function all()
    {
        $this->_model->all();
    }

    public function create($attribute = [])
    {
        $this->_model->create($attribute);
    }

    public function find($id)
    {
        return $this->_model->find($id);
    }

    public function findByEmail($email)
    {
        $this->_model->findByEmail($email);
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result != null) {
            $result->delete();
            return true;
        }
        return false;
    }
    public function update($id, $attribute = [])
    {
        $result = $this->find($id);
        if ($result) {
            return $result->update($id, $attribute);
        }
    }
    public function insert($attribute = [])
    {
        $this->_model->insert();
    }
    public function destroy($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->destroy();
            return true;
        }
        return false;
    }
}
