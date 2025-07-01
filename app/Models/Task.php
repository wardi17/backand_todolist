<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'tanggal',
        'jamKerja',
        'namaProyek',
        'taskList',
        'deadlineTask',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jamKerja' => 'datetime:H:i',
        'deadlineTask' => 'date',
    ];
}
