<form method="get">
<div class="collection-filter-block creative-card creative-inner">
    <div class="form-group">
        <button type="submit" class="float-right btn btn-sm btn-primary">Apply Filters</button>
    </div>
    <br><hr>
    <!-- brand filter start -->
    <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
    @foreach($filters as $filter)
    <div class="collection-collapse-block open">
        <h3 class="collapse-block-title mt-0">{{ $filter->name }}</h3>
        <div class="collection-collapse-block-content">
            <div class="collection-brand-filter">
                @if(!empty($filter->values))
                    @foreach($filter->values as $value)
                    <div class="custom-control custom-checkbox collection-filter-checkbox">                    
                        <input type="checkbox" class="custom-control-input" id="{{ $value->id}}">
                        <label class="custom-control-label" for="{{ $value->id}}">{{ $value->value}}</label>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <br>
    @endforeach
    <!-- price filter start here -->
    <div class="collection-collapse-block border-0 open">
        <h3 class="collapse-block-title">price</h3>
        <div class="collection-collapse-block-content">
            <div class="collection-brand-filter">
                <div class="custom-control custom-checkbox collection-filter-checkbox">
                    <input type="checkbox" class="custom-control-input" id="hundred">
                    <label class="custom-control-label" for="hundred">$10 - $100</label>
                </div>
                <div class="custom-control custom-checkbox collection-filter-checkbox">
                    <input type="checkbox" class="custom-control-input" id="twohundred">
                    <label class="custom-control-label" for="twohundred">$100 - $200</label>
                </div>
                <div class="custom-control custom-checkbox collection-filter-checkbox">
                    <input type="checkbox" class="custom-control-input" id="threehundred">
                    <label class="custom-control-label" for="threehundred">$200 - $300</label>
                </div>
                <div class="custom-control custom-checkbox collection-filter-checkbox">
                    <input type="checkbox" class="custom-control-input" id="fourhundred">
                    <label class="custom-control-label" for="fourhundred">$300 - $400</label>
                </div>
                <div class="custom-control custom-checkbox collection-filter-checkbox">
                    <input type="checkbox" class="custom-control-input" id="fourhundredabove">
                    <label class="custom-control-label" for="fourhundredabove">$400 above</label>
                </div>
            </div>
        </div>
    </div>
    <hr><br>
    <div class="form-group">
        <button type="submit" class="float-right btn btn-sm btn-primary">Apply Filters</button>
    </div>
</div>
</form>