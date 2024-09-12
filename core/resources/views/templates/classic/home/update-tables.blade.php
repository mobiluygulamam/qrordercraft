@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Masa URL'lerini Güncelle</h2>
    <form action="{{ route('update.tables.url') }}" method="POST">
        @csrf <!-- CSRF güvenliği için -->
        
        <div class="form-group">
            <label for="post_id">Post ID</label>
            <input type="text" class="form-control" id="post_id" name="post_id" placeholder="Post ID'yi girin" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif
</div>
@endsection
