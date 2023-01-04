@extends('./../layouts.app')
@section('content')
<div class="col-md-8">
    <div class="col-lg-7">
        <form action="{{ route('category.update', $categories->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Category name</label>
                <input class="form-control" name="name" value="{{ $categories->category_name }}"
                    placeholder="category name" />
            </div>
            <button type="submit" class="btn btn-dark">Create</button>
        </form>
    </div>
</div>
@endsection
