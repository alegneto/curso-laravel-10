<?php

namespace App\View\Components;

use App\Enums\SupportStatus;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusSupport extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected string $status
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        switch ($this->status) {
            case SupportStatus::C->name:
                $color = 'green';
                break;

            case SupportStatus::P->name:
                $color = 'red';
                break;

            default:
                $color = 'blue';
                break;
        }

        $textStatus = getStatusSupport($this->status);

        return view('components.status-support', compact('textStatus', 'color'));
    }
}
