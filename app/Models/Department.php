<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Department
 * @package App\Models
 * @version May 29, 2023, 9:52 am UTC
 *
 * @property string $title
 */
class Department extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'departments';

    public $fillable = [
        'title'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255'
    ];


}
