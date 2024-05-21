<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = ['long_url', 'short_code', 'visits'];

    /**
     * Increment the visit count for the short URL.
     * 
     * @return void
     */
    public function incrementVisitCount()
    {
        $this->increment('visit_count');
    }
}
