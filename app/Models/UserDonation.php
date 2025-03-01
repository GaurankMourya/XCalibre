<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDonation extends Model
{
    use HasFactory;

    protected $table = 'user_donation'; // Your table name

    protected $fillable = [
        'donor_id',
        'name',
        'food_type',
        'food_qty',
        'location',
        'status',
    ];

    public $timestamps = true; // Enables created_at and updated_at
}
