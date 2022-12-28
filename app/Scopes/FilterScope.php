<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class FilterScope implements Scope
{

  protected $filterColumns = [];

  /**
   * Apply the scope to a given Eloquent query builder.
   *
   * @param Builder $builder
   * @param Model $model
   * @return void
   */
  public function apply(Builder $builder, Model $model)
  {
    $columns = property_exists($model, 'filterColumns') ? $model->filterColumns : $this->filterColumns;
    foreach ($columns as $index => $column) {
      if ($value = request($column)) {
        $method = $index > 0 ? 'orWhere' : 'where';
        $builder->$method($column, $value);
      }
    }
  }
}