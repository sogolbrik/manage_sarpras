@extends('templates.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Borrow</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Table</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Borrow Data</h4>
                                <a href="{{ route('borrow.create') }}" class="btn btn-primary btn-sm">AddNew <i class="fa fa-plus fs-6"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Student</th>
                                            <th>Classroom</th>
                                            <th>Borrow Date</th>
                                            <th>Borrow Maturity</th>
                                            <th>Borrow Return</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Student</th>
                                            <th>Classroom</th>
                                            <th>Borrow Date</th>
                                            <th>Borrow Maturity</th>
                                            <th>Borrow Return</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($borrow as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->student->name }}</td>
                                                <td>{{ $item->student->classroom->name }}</td>
                                                <td>{{ $item->borrow_date }}</td>
                                                <td>{{ date('Y-m-d', strtotime($item->borrow_date . '+1 days')) }}</td>
                                                <td>{{ $item->return_date ?? 'not returned' }}</td>
                                                <td>
                                                    @if ($item->status == 'borrowed')
                                                        <span class="badge text-bg-warning">{{ $item->status }}</span>
                                                    @else
                                                        <span class="badge text-bg-success">{{ $item->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status == 'borrowed')
                                                        <form action="{{ route('borrow.status', $item->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="status" value="retrieved">
                                                            <button class="badge text-bg-primary btn">retrieved</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection