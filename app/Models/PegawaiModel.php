
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    use HasFactory;
    // Menentukan secara eksplisit bahwa model ini terkait dengan tabel 'tb_pegawai'
    // Jika tidak didefinisikan, Laravel akan mengasumsikan nama tabel berdasarkan model (plural lowercase 'pegawais')
    protected $table = 'tb_pegawai';

    // Properti $fillable digunakan untuk menentukan kolom mana saja yang dapat diisi secara massal 
    // Ini berguna untuk melindungi aplikasi dari mass assignment vulnerability.
    protected $fillable = [
        'id',
        'nama',
        'nip',
        'alamat',
        'created_at',
        'updated_at'
    ];
}
