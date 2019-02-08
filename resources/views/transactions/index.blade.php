@extends('layouts.app')

@section('content')

    <h1>Transaction counts</h1>
    <table>
        <thead>
        <tr>
            <td>Email</td>
            <td>Count</td>
        </tr>
        </thead>
        <tbody>
        @foreach($transactionCounts as $transactionCount)
            <tr>
                <td>{{ $transactionCount->user->email }}</td>
                <td>{{ $transactionCount->count }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection