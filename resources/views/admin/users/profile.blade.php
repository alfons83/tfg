@extends('admin._includes.layout')
@section('content')
    <h2 class="subheader">Friends</h2>
    <table style="width:100%;">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach (Auth::user()->favourites as $favourite)
            <tr>
                <td>{{ $favourite->getFullName() }}</td>
                <td>{{ $favourite->email }}</td>
                <td>{{ link_to_action('admin\\patterns\\PatternController@getAddFavourites', 'Add friend', array('id' => $favourite>id)) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2 class="subheader">Other People</h2>
    <table style="width:100%;">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($not_favourites as $favourites)
            <tr>
                <td>{{ $favourites->getFullName() }}</td>
                <td>{{ $favourites->email }}</td>
                <td>{{ link_to_action('admin\\patterns\\PatternController@getRemoveFavourites', 'Remove friend', array('id' => $favourites->id)) }}</td>            </tr>
        @endforeach
        </tbody>
    </table>

    <p class="right"><a href="/logout">Logout</a></p>

@stop