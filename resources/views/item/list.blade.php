@extends('./../layouts.app')
@section('content')
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Category</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $items as $key => $item )
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $item->category->category_name }}</td>
                <td>{{ $item->item_name }}</td>
                <td>
                    <a href="{{ route('item.edit', $item->id) }}"><button type="button"
                            class="btn btn-primary btn-sm">Edit</button></a>
                </td>
                <td>
                    <a href="{{ route('item.delete', $item->id) }}"><button type="button"
                            class="btn btn-primary btn-sm">Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
