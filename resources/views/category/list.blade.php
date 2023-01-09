@extends('./../layouts.app')
@section('content')
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $categories as $key => $category )
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $category->category_name }}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}"><button type="button"
                            class="btn btn-primary btn-sm">Edit</button></a>
                </td>
                <td>
                    <a href="{{ route('category.delete', $category->id) }}" onclick="return myFunction();"><button
                            type="button" class="btn btn-primary btn-sm">Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
