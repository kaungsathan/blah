@extends("layouts.app")

@section("content")

        <div class="row">
            <table class="table table-striped table-hover" id="data-table"
                   data-route="{{route("registered-users.index")}}" data-create-route="{{route("registered-users.create")}}">
                <thead>
                <tr class="info">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Address</th>
                </tr>
                </thead>
            </table>
        </div>
@endsection

@push("scripts")
    @vite(['resources/js/components/customers.index.js'])
@endpush

