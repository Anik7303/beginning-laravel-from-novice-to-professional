<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\HtmlString;

class Alert extends Component
{
    public $type;
    public $dismissible;
    public $classes = ['alert'];

    protected $types = [
        'success',
        'primary',
        'info',
        'warning',
        'danger',
    ];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'info', $dismissible = false)
    {
        $this->type = $this->validType($type);
        $this->classes[] = "alert-{$this->type}";
        if ($dismissible) {
            $this->classes[] = 'alert-dismissible fade show';
        }
        $this->dismissible = $dismissible;
    }

    /**
     * Get valid alert type
     * @param mixed $type
     * @return mixed
     */
    private function validType($type)
    {
        return in_array($type, $this->types) ? $type : 'info';
    }

    /**
     * class names for alert
     * @return string
     */
    public function getClasses()
    {
        return join(' ', $this->classes);
    }

    /**
     * get alert link formatted for bootstrap
     * @param mixed $text link text
     * @param mixed $target href attribute
     * @return string alert anchor tag formatted with bootstrap classes
     */
    public function link($text, $target = '#')
    {
        return new HtmlString("<a href='{$target}' class='alert-link'>{$text}</a>");
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}