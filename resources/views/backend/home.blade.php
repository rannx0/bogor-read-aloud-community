@extends('backend.layouts.app')

@section('content')
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" />
        <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" />
    <label for="floatingPassword">Password</label>
    </div>

    <div class="form-floating">
    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;"></textarea>
    <label for="floatingTextarea">Comments</label>
    </div>

    <div class="form-floating">
    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
    <label for="floatingSelect">Works with selects</label>
    </div>

    <div class="row g-2">
    <div class="col-md">
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com" />
            <label for="floatingInputGrid">Email address</label>
        </div>
    </div>
    <div class="col-md">
        <div class="form-floating">
            <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <label for="floatingSelectGrid">Works with selects</label>
        </div>
    </div>
    </div>
@endsection

