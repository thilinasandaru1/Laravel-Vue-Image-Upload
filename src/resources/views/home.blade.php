@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session("status") }}
                    </div>
                    @endif

                    <div id="app">
                        <div class="container col-lg-offset-4 col-lg-4 pt-5">
                            <div class="row">
                                @if(count($errors)) @foreach($errors->all() as
                                $error)
                                <span class="text-danger">{{ $error }}</span>
                                @endforeach @endif
                                <form
                                    action="{{ route('upload') }}"
                                    enctype="multipart/form-data"
                                    method="POST"
                                >
                                    @csrf
                                    <input
                                        type="file"
                                        class="mb-2"
                                        name="image"
                                    />

                                    @if(auth()->user()->avatar)
                                    <img
                                        src="/storage/{{ auth()->user()->avatar }}"
                                    />
                                    @endif

                                    <input
                                        type="submit"
                                        class="btn btn-success mt-2"
                                        value="upload"
                                    />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
