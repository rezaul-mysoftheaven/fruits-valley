<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruits extends Model
{
    use HasFactory;

    protected $table = 'fruits';

    protected $fillable = [
        'fr_name',
        'fr_img',
        'fr_qty',
        'fr_old_price',
        'fr_cur_price',
        'fr_soft_delete',
        'fr_availability',
    ];

    // Define the relationship with the Orders model (one-to-many)
    public function orders()
    {
        return $this->hasMany(Orders::class, 'fruit_id');
    }
}


