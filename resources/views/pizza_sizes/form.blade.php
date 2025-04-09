<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="pizza_id" class="form-label">{{ __('Pizza Id') }}</label>
            <input type="text" name="pizza_id" class="form-control @error('pizza_id') is-invalid @enderror" value="{{ old('pizza_id', $pizzaSize?->pizza_id) }}" id="pizza_id" placeholder="Pizza Id">
            {!! $errors->first('pizza_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="size" class="form-label">{{ __('Size') }}</label>
            <input type="text" name="size" class="form-control @error('size') is-invalid @enderror" value="{{ old('size', $pizzaSize?->size) }}" id="size" placeholder="Size">
            {!! $errors->first('size', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="price" class="form-label">{{ __('Price') }}</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $pizzaSize?->price) }}" id="price" placeholder="Price">
            {!! $errors->first('price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>