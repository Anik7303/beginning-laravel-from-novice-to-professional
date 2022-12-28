<?php

namespace App\Models;

use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    // use HasFactory, FilterSearchScope;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'company_id'];

    public $filterColumns = ['company_id'];

    public $searchColumns = ['first_name', 'last_name', 'email', 'company.name'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeFilterColumns($query)
    {
        $count = 0;
        $columns = $this->filterColumns;
        foreach ($columns as $column) {
            $method = $count > 0 ? 'orWhere' : 'where';
            if ($value = request($column)) {
                $count++;
                $query->$method($column, 'LIKE', "%${value}%");
            }
        }
    }

    protected static function booted()
    {
        static::addGlobalScope(new SearchScope);
    }
}