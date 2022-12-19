<?php
namespace App\Repositories\Base;

interface BaseRepositoryInterface
{
    public function all();
    public function create($attribute = []);
    public function find($id);
    public function findByEmail($email);
    public function delete($id);
    public function update($id, $attribute = []);
    public function insert($attribute = []);
    public function destroy($id);
}
