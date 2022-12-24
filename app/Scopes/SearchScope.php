<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SearchScope implements Scope
{

  protected $searchColumns = [];

  public function apply(Builder $builder, Model $model)
  {
    if ($search = request('search')) {
      foreach ($this->searchColumns as $index => $column) {
        $arr = explode('.', $column);
        if (count($arr) > 1) {
          list($relationship, $col) = $arr;
          if ($index == 0) {
            $builder->whereHas($relationship, function ($query) use ($search, $col) {
              $query->where($col, 'LIKE', "%$search%");
            });
          } else {
            $builder->orWhereHas($relationship, function ($query) use ($search, $col) {
              $query->where($col, 'LIKE', "%$search%");
            });
          }
        } else {
          if ($index == 0) {
            $builder->where($column, 'LIKE', "%$search%");
          } else {
            $builder->orWhere($column, 'LIKE', "%$search%");
          }
        }

      }
    }
  }
}