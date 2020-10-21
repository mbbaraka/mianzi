<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use App\Models\Mianzi\Product;

use Livewire\WithPagination;

class Search extends Component
{
   public $query;
    public $pdts;
    public $highlightIndex;

    public function mount()
    {
        $this->reset('query', 'pdts','highlightIndex');
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->pdts) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->pdts) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectProduct()
    {
        $pdt = $this->pdts[$this->highlightIndex] ?? null;
        if ($pdt) {
            $this->redirect(url($pdts->slug.'.html'));
        }
    }

    public function updatedQuery()
    {
        $this->pdts = Product::where('title', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.search');
    }

}
