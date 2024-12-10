<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Follow extends Model
{
    use HasFactory;
    protected $fillable = [
      'jobs_id',
      'news', 
    ];
    public function job(){
      return $this->belongsTo(Job::class);
    }
}
