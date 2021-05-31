<script src="{{ asset('js/Contact.js') }}"></script>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Contact</div>

                <div class="card-body">
                    <form method="POST" action="createContact" id="contactForm">
                        @csrf

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone number</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="addContact">
                                    Add Contact
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Delete Contact</div>
                
                <div style="height:350px;" class="card-body overflow-auto" id="contactsCard">
                    @foreach($contacts as $contact)
                        <div class="row justify-content-center">
                            <p class="col-md-4 mt-2">{{$contact['name']}}</p>
                            <p class="col-md-4 mt-2">{{$contact['phone']}}</p>
                            <button class="btn btn-primary" style="height:40px" id="delete-{{$contact['id']}}">Delete Contact</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
