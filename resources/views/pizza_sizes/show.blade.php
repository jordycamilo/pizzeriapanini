@extends('layouts.app')

@section('template_title')
    {{ $pizzaSize->name ?? __('Show') . " " . __('Pizza Size') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pizza Size</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('pizza-sizes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Pizza Id:</strong>
                                    {{ $pizzaSize->pizza_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Size:</strong>
                                    {{ $pizzaSize->size }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Price:</strong>
                                    {{ $pizzaSize->price }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
