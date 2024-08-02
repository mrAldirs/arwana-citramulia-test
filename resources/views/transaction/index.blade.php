@extends('layouts.app')

@section('title', 'Transaction')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h1>Data Transaction</h1>
                    </div>
                    <div class="col-sm-4 text-center">
                        <a href="{{ route('generate') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fa fa-file"></i> Print Report
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Transaction</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="card-title">Data Transaction</h3>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('transaction.create') }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus me-2"></i>Add Transaction
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('transaction.component.table')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
