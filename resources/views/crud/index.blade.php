@extends('layout.master')
@push('afterStyle')
<style>
	.header{
		background: #000 !important;
		color:white;
		padding:10px;
	}
</style>
@endpush
@section('content')
<div class="header">
	<h3>
		CRUD VUE		
	</h3>

</div>
<div>

</div>
<crud></crud>
{{-- <vue-crud :personal-infos="{{ $personalInfos }}"></vue-crud> --}}
@endsection
