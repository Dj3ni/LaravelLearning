@section('content')
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input 
                type="text"
                id="name"
                name="name"
                class ="form-control"
            >
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input 
                type="email"
                id="email"
                name="email"
                pattern="/^[a-zA-Z0–9._%+-]+@[a-zA-Z0–9.-]+\.[a-zA-Z]{2,}$/"   
                class ="form-control"
            >
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input 
                type="password"
                id="password"
                name="password"
                pattern="/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{8,16}$/"
                class ="form-control"
            >
        </div>
        <div class="form-group">
            <label for="passwordConfirmed">Confirm your password</label>
            <input 
                type="password"
                id="passwordConfirmed"
                name="passwordConfirmed"
                pattern="/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{8,16}$/"
                class ="form-control"
            >
        </div>
        <button type="submit" class="btn btn-primary">
            @if($user->id)
                Modify
            @else
                Create
            @endif
        </button>
    </form>
@endsection