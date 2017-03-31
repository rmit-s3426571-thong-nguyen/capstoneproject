<div class="col-sm-6 col-md-4">
    <div class="thumbnail">

        <img src="{{ $product->imageLocation }}" alt="..." style="max-height: 150px" class="img-responsive">

        <div class="caption">

            <a href="/products/{{ $product->id }}">
                <h3>{{ $product->title }}</h3>
            </a>

            <p class="product-meta">
                {{ $product->user->name  }} posted
                {{ $product->created_at->diffForHumans() }}</p>

            <p>{{ $product->desc }}.</p>

            <div class="clearfix">
                <div class="pull-left">${{ $product->price }}</div>
                <a href="{{ route('product.addToCart',['id' => $product->id]) }}" class="btn btn-primary pull-right"  role="button">Add to cart</a>
            </div>

        </div>
    </div>
</div>