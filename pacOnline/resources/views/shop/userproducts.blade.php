<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
    @if($product->user_id == Auth::id())
        <a href="/products/{{ $product->id }}">
           {{-- <img src="/uploads/productImages/{{$product->imageLocation}}" alt="..." style="max-height: 150px" --}}
            <img src="{{ $product->imageLocation }}" alt="..." style="max-height: 150px"
            class="img-responsive"></a>

        <div class="caption">

            <a class="text-center" href="/products/{{ $product->id }}">
                <h3>{{ str_limit($product->title, 20) }}</h3>
            </a>

            <p class="product-meta">
                {{ $product->user->name  }} posted
                {{ $product->created_at->diffForHumans() }}</p>

            <p>{{ str_limit($product->desc, 45) }}</p>

            <div class="clearfix">
                <div class="pull-left"><p><b>${{ $product->price }}</b></p></div>

                
                <form method="POST" action="/product/{{$product->id}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                <button class="btn btn-primary btn-danger pull-right"  role="button">Delete</button>
                </form>
                
                <a href="/editproduct/{{$product->id}}" class="btn btn-primary pull-right edit-listing"
                   role="button">Edit </a>
            </div>
        </div>
    @endif
    </div>
</div>