{!! Form::open([
    'route' => 'transaction.store',
    'class' => 'form',
    'method' => 'POST',
    'files' => true,
]) !!}
@csrf
<div class="card-body">
    <div class="form-group">
        {!! Form::label('product_id', 'Product', null) !!}
        {!! Form::select('product_id', $product->toArray(), null, [
            'class' => 'form-control',
            'placeholder' => '-- Select Product --',
            'id' => 'product_id',
            'data-prices' => json_encode($productPrice->toArray()),
        ]) !!}
    </div>
    @error('product_id')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('customer', 'Customer', null) !!}
        {!! Form::text('customer', null, ['class' => 'form-control', 'placeholder' => 'Input Customer']) !!}
    </div>
    @error('customer')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('quantity', 'Quantity', null) !!}
        {!! Form::number('quantity', null, ['class' => 'form-control', 'placeholder' => 'Input Quantity']) !!}
    </div>
    @error('quantity')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('total', 'Total', null) !!}
        {!! Form::number('total', null, [
            'class' => 'form-control',
            'placeholder' => 'Input Total',
            'id' => 'total',
            'readonly',
        ]) !!}
    </div>
    @error('total')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="card-footer">
    <a href="#" id="cancelButton" class="btn btn-danger">
        <i class="fa fa-times me-2"></i>Cancel
    </a>
    <button type="submit" class="btn btn-primary float-right">
        <i class="fas fa-save me-2"></i>Simpan
    </button>
</div>
{!! Form::close() !!}

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#product_id, #quantity').on('change keyup', function() {
                var priceProduct = $('#product_id').data('prices');
                var productId = $('#product_id').val();
                var quantity = $('#quantity').val();
                var price = productId ? priceProduct[productId] : 0;
                var total = quantity * price;
                $('#total').val(total);
            });
        });
    </script>
@endpush
