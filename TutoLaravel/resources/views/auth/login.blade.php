@extends('base')

@section('content')

    <h1>Login</h1>

    <div class="card">
        <div class="card-body">
            <form 
                action="{{ route('auth.login')}}" 
                method="POST"
                class="vstack gap-3"
                >
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email"
                        id="email"
                        name="email"
                        pattern="/^[a-zA-Z0–9._%+-]+@[a-zA-Z0–9.-]+\.[a-zA-Z]{2,}$/"   
                        value="{{ old('email')}}"
                        class ="form-control"
                    >
                    @error('email')
                        <p class="alert alert-danger">{{ $message }}</p> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password"
                        id="password"
                        name="password"
                        class ="form-control"
                    >
                    @error('password')
                        <p class="alert alert-danger">{{ $message }}</p> 
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Connect</button>

            </form>
        </div>
    </div>
    
@endsection