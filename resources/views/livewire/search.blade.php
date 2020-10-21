

<div>
	<form class="search__form" action="{{ route('search') }}" method="get">
       <input 
       wire:model="query"{{-- 
        wire:keydown.escape="reset"
        wire:keydown.tab="reset" --}}
        wire:keydown.ArrowUp="decrementHighlight"
        wire:keydown.ArrowDown="incrementHighlight"
        wire:keydown.enter="selectProduct"
        class="search__input" name="query" placeholder="Search over 10,000 products" aria-label="Site search" type="search" autocomplete="off"> 
       <button class="search__button" type="submit">
          <i style="width: 20px; height: 20px;" class="fa fa-search"></i>
       </button>
       <div class="search__border"></div>
    </form>

	<span wire:loading class="position-absolute">Searching...</span>
    @if(!empty($query))
        <div class="position-absolute" wire:click="reset"></div>
        @if(!empty($pdts))
  	    	<div class="position-absolute">
          <ul class="d-block bg-white" style="list-style-type: none;">
          @foreach($pdts as $i => $pdt)
            <li><a  class="text-dark" href="{{ url($pdt['slug'].'.html') }}">{{ $pdt['title'] }}</a></li>
          @endforeach
          </ul>  
          </div>
  	    @else
          <ul class="position-absolute d-block bg-white search__form" style="list-style-type: none;">
            <li><span class="pt-3 text-dark">No results found</span></li>
          </ul>
  	    @endif
    @endif

</div>