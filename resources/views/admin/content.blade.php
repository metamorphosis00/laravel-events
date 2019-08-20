@extends('layouts.admin')
@section('content')
@push('scripts')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.config.allowedContent = true
        var content = {!! json_encode($content) !!};
        CKEDITOR.replace('ckeditor').setData(content);
    });
</script>
@endpush
<div class="row">
    <div class="col-12">
        <form method="post" action="{{ route('admin.content.update') }}">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="ckeditor"></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
