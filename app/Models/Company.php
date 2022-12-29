<?php

namespace App\Models;

use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'website', 'address', 'email'];

    public $searchColumns = ['name', 'email', 'website'];

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'company_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public static function booted()
    {
        static::addGlobalScope(new SearchScope);
    }

    public static function userCompanies()
    {
        return self::where('user_id', Auth::id())->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
    }
}