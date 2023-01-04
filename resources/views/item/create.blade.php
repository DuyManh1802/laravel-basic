@extends('./../layouts.app')
@section('content')
<div class="col-md-8">
    <div class="col-lg-7">
        <form action="{{ route('item.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label class="col-form-label">Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row mb-3">
                <label class="col-form-label">Item name</label>
                <input class="form-control" name="item_name" placeholder="item name" />
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection
