<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description'];

    // kalo guarded itu kebalikan dari fillable

    // soft delete adalah fitur di Laravel yang memungkinkan kita untuk menghapus data dari database tanpa benar-benar menghapusnya secara permanen.
    // Sebaliknya, data yang dihapus akan tetap ada di database tetapi ditandai sebagai dihapus.

    use SoftDeletes;

    // cara munculin lagi data yang udah kehapus caranya adalah
    // liat di BlogController.php di method index


    
}
