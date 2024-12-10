<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
      'company',
      'offer',
      'status', 
    ];
    public function getStatusTextAttribute()
    {
        return $this->status ? 'En Curso' : 'Finalizado';
    } 
    public function follows(){
      return $this->hasMany(Follow::class);
    }
} 

