<table id="tableData1" class="table table-bordered table-striped">
    <thead>
        <tr class="text-center">
            <th>#</th>
            <th>Reference</th>
            <th>Customer</th>
            <th>Total</th>
            <th style="width: 240;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $transaction)
            <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->reference }}</td>
                <td>{{ $transaction->customer }}</td>
                <td>{{ 'Rp ' . number_format($transaction->total, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('transaction.show', [$transaction->id]) }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>
                    @if ($transaction->status == 'draft')
                        <a href="{{ route('transaction.edit', [$transaction->id]) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('transaction.destroy', [$transaction->id]) }}" method="post"
                            class="d-inline deleteForm">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm deleteButton">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@push('js')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endpush
