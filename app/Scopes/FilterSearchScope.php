<?php

namespace App\Scopes;

trait FilterSearchScope
{
  protected static function bootFilterSearchScope()
  {
    static::addGlobalScope(new FilterScope);
    static::addGlobalScope(new SearchScope);
  }
}