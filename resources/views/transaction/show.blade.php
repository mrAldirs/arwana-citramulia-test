@extends('layouts.app')

@section('title', 'Detail Transaction')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <h1>Detail Transaction</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('transaction.index') }}">Transaction</a></li>
                            <li class="breadcrumb-item active">{{ $data->reference }}</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <button onclick="goBack()" class="btn btn-secondary btn-sm">
                            <i class="fa fa-arrow-left me-2"></i>Kembali
                        </button>
                        @if ($data->status == 'draft')
                            <a href="{{ route('transaction.edit', [$data->id]) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-edit me-2"></i>Edit
                            </a>
                            <button class="btn btn-outline-success btn-sm statusButton" data-id="{{ $data->id }}">
                                <i class="fa fa-eye me-2"></i>Done
                            </button>
                        @endif
                    </div>
                    <div class="col-8 text-end">
                        @if ($data->status == 'draft')
                            <div class="state text-bg-primary">
                                Draft
                            </div>
                            <div class="state text-muted">
                                Done
                            </div>
                        @else
                            <div class="state text-muted">
                                Draft
                            </div>
                            <div class="state text-bg-primary">
                                Done
                            </div>
                        @endif
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
                                <h3 class="card-title">Detail Transaction</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-9">
                                                <div>Reference</div>
                                                <span class="title-text">{{ $data->reference }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <dl class="row">
                                                    <dt class="col-md-3"><strong>Customer</strong></dt>
                                                    <dd class="col-md-9">{{ $data->customer }}</dd>

                                                    <dt class="col-md-3"><strong>Quantity</strong></dt>
                                                    <dd class="col-md-9">{{ $data->quantity }}</dd>

                                                    <dt class="col-md-3"><strong>Total</strong></dt>
                                                    <dd class="col-md-9">
                                                        {{ 'Rp ' . number_format($data->total, 0, ',', '.') }}</dd>

                                                    <dt class="col-md-3"><strong>Date</strong></dt>
                                                    <dd class="col-md-9">{{ $data->create_at }} Units</dd>
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

@push('js')
    <script>
        document.querySelectorAll('.statusButton').forEach(item => {
            item.addEventListener('click', event => {
                let prdId = event.target.dataset.id;
                Swal.fire({
                    title: 'Update Status Transaction?',
                    text: "Are you sure?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#5356FF',
                    cancelButtonColor: '#D71313',
                    confirmButtonText: 'Yes, change now!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('transaction/change-status') }}/" + prdId;
                    }
                });
            });
        });
    </script>
@endpush
