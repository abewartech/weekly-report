@extends(backpack_view('blank'))
@section('content')
<div id="example"></div>
@push('after_scripts')
<script src="{{ mix('js/app.js')}}"></script>
@endpush
@endsection