<div class="col-sm-6 col-md-4">
    <div class="thumbnail">

        <a href="/products/{{ $product->id }}"><img src="{{ $product->imageLocation }}" alt="..."
            style="max-height: 150px" class="img-responsive"></a>

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
                <a href="/editproduct/{{$product->id}}" class="btn btn-primary pull-right"  role="button">Edit Product</a>
            </div>

        </div>
    </div>
</div>