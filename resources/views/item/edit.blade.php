@extends('./../layouts.app')
@section('content')
<div class="col-md-8">
    <div class="col-lg-7">
        <form action="{{ route('item.update', $items->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label>item name</label>
                <input class="form-control" name="name" value="{{ $items->item_name }}" placeholder="item name" />
            </div>
            <button type="submit" class="btn btn-dark">Create</button>
        </form>
    </div>
</div>
@endsection
