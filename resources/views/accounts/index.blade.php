@extends('layouts.app')

@section('content')

    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Balance</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
            <tr>
                <td>{{ $account->name }}</td>
                <td>{{ $account->balance }}</td>
                <td>
                    <div>
                        <form action="{{ route('accounts.update', $account->uuid) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="number" value="" name="amount">
                            <button type="submit" name="addMoney">Deposit</button>
                            <button type="submit" name="subtractMoney">Withdraw</button>
                        </form>

                        <form action="{{ route('accounts.destroy', $account->uuid) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @include('accounts.partials.create-form')
@endsection
