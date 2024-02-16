@extends('layouts.app')

@section('content')
    <div class="flex justify-center align-center items-center">

        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="block">Mail :</label>
                <input type="text" name="email" id="email" class="rounded shadow border-gray-300 w-full">
                @error('email')
                    <p> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="block">Mot de passe :</label>
                <input type="password" name="password" id="password" class="rounded shadow border-gray-300 w-full">
                @error('password')
                    <p> {{ $message }} </p>
                @enderror
            </div>
            <button>Connexion</button>
        
        </form>
    </div>
@endsection
