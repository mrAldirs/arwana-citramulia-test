@extends('layouts.app')

@section('title', 'Detail Product')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <h1>Detail Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                            <li class="breadcrumb-item active">{{ $data->name }}</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <button onclick="goBack()" class="btn btn-secondary btn-sm">
                            <i class="fa fa-arrow-left me-2"></i>Kembali
                        </button>
                        <a href="{{ route('product.edit', [$data->id]) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-edit me-2"></i>Edit
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Detail Product</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-9">
                                                <div>Name</div>
                                                <span class="title-text">{{ $data->name }}</span>
                                            </div>
                                            <div class="col-3 text-right">
                                                <img src="{{ asset('storage/product/' . $data->image) }}"
                                                    class="card-img-top" style="height: 100px; width: 140px;"
                                                    alt="{{ $data->image }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <dl class="row">
                                                    <dt class="col-md-3"><strong>Type</strong></dt>
                                                    <dd class="col-md-9">{{ $data->type }}</dd>

                                                    <dt class="col-md-3"><strong>Price</strong></dt>
                                                    <dd class="col-md-9">
                                                        {{ 'Rp ' . number_format($data->price, 0, ',', '.') }}</dd>

                                                    <dt class="col-md-3"><strong>Stock</strong></dt>
                                                    <dd class="col-md-9">{{ $data->stock }} Units</dd>

                                                    <dt class="col-md-3"><strong>Description</strong></dt>
                                                    <dd class="col-md-9">{!! $data->description !!}</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
