@extends("layouts.app")

@section("content")

    <form>
        <x-form-group id="name" label="Name" placeholder="Name" type="text"/>
        <x-form-group id="email" label="Email" placeholder="Email" type="email"/>
        <x-form-group id="mobile-number" label="Mobile Number" placeholder="Email" type="text"/>
        <x-form-group id="address" label="Address" placeholder="Address" type="text"/>
        <button data-route="{{route("registered-users.store")}}" data-redirect-route="{{route("registered-users.index")}}" type="submit" class="btn btn-primary" id="submit">Register</button>
    </form>

@endsection


@push("scripts")
    @vite("resources/js/components/customers.create.js")
@endpush
