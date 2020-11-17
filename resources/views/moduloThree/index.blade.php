@extends('layouts.app')
@section('title', 'List of records')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Number</th>
                        <th>Result</th>
                        <th>IP</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Time</th>
                        <th>Number</th>
                        <th>Result</th>
                        <th>IP</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($records as $record)
                    <tr>
                        <th>{{$record->created_at}}</th>
                        <th>{{$record->number}}</th>
                        <th>{{$record->result}}</th>
                        <th>{{$record->ip}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection