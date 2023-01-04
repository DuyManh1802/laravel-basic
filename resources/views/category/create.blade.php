@extends('./../layouts.app')
@section('content')
<div class="col-md-8">
    <div class="col-lg-7">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label class="col-form-label">Category name</label>
                <input class="form-control" name="category_name" placeholder="category name" />
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection
