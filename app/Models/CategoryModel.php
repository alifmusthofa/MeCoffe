<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
	protected $table      = 'categories';
	protected $primaryKey = 'id';

	protected $returnType     = 'App\Entities\Category';

	protected $allowedFields = ['name', 'slug'];
	protected $useAutoIncrement = true;
	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	protected $validationRules    = [
		'id'    => 'is_unique[categories.name]',
		'name'	=> 'required|min_length[3]|is_unique[categories.name,id,{id}]',
	];

	protected $validationMessages = [];
	protected $skipValidation     = false;
}
