{!! Form::open([
    'route' => ['product.update', [$data->id]],
    'class' => 'form',
    'method' => 'PUT',
    'files' => true,
]) !!}
@csrf

<div class="card-body">
    <div class="form-group">
        {!! Form::label('name', 'Name', null) !!}
        {!! Form::text('name', $data->name, ['class' => 'form-control', 'placeholder' => 'Input Name Product']) !!}
    </div>
    @error('name')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('description', 'Description', null) !!}
        {!! Form::textarea('description', $data->description, [
            'class' => 'form-control',
            'placeholder' => 'Input Description Product',
            'rows' => '3',
        ]) !!}
    </div>
    @error('description')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('type', 'Type', null) !!}
        {!! Form::select(
            'type',
            [
                'Storable Product' => 'Storable Product',
                'Consumable' => 'Consumable',
                'Service' => 'Service',
            ],
            $data->type,
            ['class' => 'form-control', 'placeholder' => 'Select Type Product'],
        ) !!}
    </div>
    @error('type')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('price', 'Price', null) !!}
        {!! Form::number('price', $data->price, ['class' => 'form-control', 'placeholder' => 'Input Price Product']) !!}
    </div>
    @error('price')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('stock', 'Stock', null) !!}
        {!! Form::number('stock', $data->stock, ['class' => 'form-control', 'placeholder' => 'Input Stock Product']) !!}
    </div>
    @error('stock')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('image', 'Image') !!}
        {!! Form::file('image', ['class' => 'form-control', 'id' => 'imageInput']) !!}
        <div id="imagePreview" class="mt-2"></div>
    </div>
    @error('image')
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
