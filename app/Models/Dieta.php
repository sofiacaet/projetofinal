<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;


use \Illuminate\Database\Eloquent\SoftDeletes;
class Dieta extends Model {
use SoftDeletes;
public function paciente() {
return $this->hasMany('\App\Models\Paciente');
}
}
