<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class FilterScope implements Scope
{
  protected $filterColumns = ['company_id'];

  public function apply(Builder $builder, Model $model)
  {
    foreach ($this->filterColumns as $column) {
      if ($value = request($column)) {
        $builder->where($column, $value);
      }
    }
  }
}