<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // 1. Tabel yang dipakai
    protected $table = 'kategori';

    // 2. Primary key (tidak wajib diubah karena default 'id')
    protected $primaryKey = 'id';

    // 3. Auto increment aktif (IDENTITY)
    public $incrementing = true;

    // 4. Jenis key (karena id bigint, tetap int di Laravel)
    protected $keyType = 'int';

    // 5. Laravel otomatis mengelola created_at & updated_at
    public $timestamps = true;

    // 6. Kolom yang boleh diisi secara massal
    protected $fillable = [
        'nama',
        'Deskripsi'
    ];
}
