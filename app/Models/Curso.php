<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;


use \Illuminate\Database\Eloquent\SoftDeletes;
class Curso extends Model {
use SoftDeletes;
public function aluno() {
return $this->hasMany('\App\Models\Aluno');
}
}
