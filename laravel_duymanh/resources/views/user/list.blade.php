@extends('./../layouts.app')
@section('content')
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $users as $key => $user )
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('user.changePassword', $user->id) }}"><button type="button"
                            class="btn btn-primary btn-sm">Change Password</button></a>
                </td>
                <td>
                    <a href="{{ route('user.delete', $user->id) }}"><button type="button"
                            class="btn btn-primary btn-sm">Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
