<!--rounded category start-->
<section class="rounded-category">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="slide-6 no-arrow">
                    @foreach(Categories::get() as $category)
                    <div>
                        <div class="category-contain">
                            <a href="{{ url('category/'.$category->slug. '.html') }}">
                                <div class="img-wrapper">
                                    <img style="height: 98px; width: 98px;" src="{{ asset('storage/category/' . $category->thumbnail) }}" alt="category" class="img-fluid">
                                </div>
                                <div>
                                    <div class="btn-rounded">
                                        {{ $category->title }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--rounded category end-->