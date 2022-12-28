<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SearchScope implements Scope
{
  protected $searchColumns = [];

  /**
   * This scope adds search functionality according to $searchColumns
   * 
   * @param Builder $builder
   * @param Model $model
   */
  public function apply(Builder $builder, Model $model)
  {
    if ($search = request('search')) {
      $columns = property_exists($model, 'searchColumns') ? $model->searchColumns : $this->searchColumns;
      foreach ($columns as $index => $column) {
        $parts = explode('.', $column);
        $method = $index > 0 ? 'orWhere' : 'where';
        if (count($parts) > 1) {
          $method = "${method}Has";
          list($relationship, $col) = $parts;
          $builder->$method($relationship, function ($query) use ($col, $search) {
            $query->where($col, 'LIKE', "%${search}%");
          });
        } else {
          $builder->$method($column, 'LIKE', "%${search}%");
        }
      }
    }
  }
}