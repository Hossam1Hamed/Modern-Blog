<?php

namespace App\Http\Interfaces;

use Illuminate\Http\Request;

interface RepoInterface
{

    public function all();
    // public function create();
    
    public function store($arr);
    
    public function update($data , $id);
    
    public function delete($id);
}