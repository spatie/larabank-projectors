<form action="{{ route('accounts.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="name" name="name" class="form-control" id="name">
    </div>
    <button type="submit" class="btn btn-primary">Create account</button>
</form>