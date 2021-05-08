@extends('layout.default')

@section('content')

@php
$product_type = array("Izdelek", "Storitev");
$categories = Auth::user()->categories;	
@endphp
<div class="container">
<div class="row col-lg-12">
    <div class="card card-custom col-lg-12">
            <div class="card-header">
                <h3 class="card-title">
                    Urejanje izdelka - {{ old('name')  ??  $product->name }} ({{ old('shortName')  ??  $product->shortName }})
                </h3>
            </div>
            <form method="POST" action="/product/{{ $product-> id }}" encrypte="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="card-body">

                    {{-- Prva vrsta --}}
                    <div class="form-group row">
                        <div class="col-lg-8">
                            <label for="name" class="control-label">Ime izdelka</label>
                            <input  id="name" 
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror" 
                                    name="name" 
                                    placeholder="Vnesite ime izdelka" 
                                    value="{{old('name') ??  $product->name}}"
                                    autofocus>
    
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <label for="shortName" class="control-label">Šifra</label>
                            <input  id="shortName" 
                                    type="text"
                                    class="form-control @error('shortName') is-invalid @enderror" 
                                    name="shortName" 
                                    placeholder="Vnesite šifro izdelka" 
                                    value="{{old('shortName') ??  $product->shortName}}"
                                    >
    
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

					{{-- Druga vrsta --}}
					<div class="form-group row">
						<div class="col-lg-4">
							<label for="brand" class="control-label">Znamka</label>
							<input  id="brand" 
									type="text"
									class="form-control @error('brand') is-invalid @enderror" 
									name="brand" 
									placeholder="Vnesite ime znamke oziroma ponudnika" 
									value="{{old('brand') ??  $product->brand}}"
									>

							@if ($errors->has('brand'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('brand') }}</strong>
								</span>
							@endif
						</div>

						<div class="col-lg-4">
                            <label for="category_id" class="control-label">Kategorija izdelka</label>
                            <select id="category_id"
                                    name="category_id"
                                    class="form-control"
                                    required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ ( $category->id == $product->category_id) ? 'selected' : '' }}> 
                                            {{ $category->name }}                             
                                        </option>
                                    @endforeach    
                            </select>
                            @if ($errors->has('category_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                            @endif
                        </div>

						<div class="col-lg-4">
                            <label for="type" class="control-label">Tip</label>
                            <select id="type"
                                    name="type"
                                    class="form-control"
                                    required>
                                    @foreach ($product_type as $key => $value)
                                        <option value="{{ $value }}" {{ ( $value == $product->type) ? 'selected' : '' }}> 
                                            {{ $value }}                             
                                        </option>
                                    @endforeach    
                            </select>
                            @if ($errors->has('type'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                            @endif
                        </div>
					</div>

                    {{-- Tretja vrsta --}}
					<div class="form-group row">
						<div class="col-lg-4">
							<label for="unitOfMeasure" class="control-label">Enota mere</label>
							<input  id="unitOfMeasure" 
									type="text"
									class="form-control @error('unitOfMeasure') is-invalid @enderror" 
									name="unitOfMeasure" 
									placeholder="Enota mere" 
									value="{{old('unitOfMeasure') ??  $product->unitOfMeasure}}"
									>
							<span class="form-text text-muted">Kos, x, komplet, liter, ...</span>

							@if ($errors->has('unitOfMeasure'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('unitOfMeasure') }}</strong>
								</span>
							@endif
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="purchasePrice" class="control-label">Nabavna cena</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">€</span>
									</div>
									<input  id="purchasePrice" 
											type="number"
											class="form-control @error('purchasePrice') is-invalid @enderror" 
											name="purchasePrice" 
											placeholder="0.00"
											min="0"
											max="9999999"
											step="any"
											value="{{old('purchasePrice') ??  $product->purchasePrice}}"
											>
								</div>
								<span class="form-text text-muted">Brez DDV</span>

								@if ($errors->has('purchasePrice'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('purchasePrice') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="sellingPrice" class="control-label">Prodajna cena</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">€</span>
									</div>
									<input  id="sellingPrice" 
											type="number"
											class="form-control @error('sellingPrice') is-invalid @enderror" 
											name="sellingPrice" 
											min="0"
											max="9999999"
											step="any"
											placeholder="0.00" 
											value="{{old('sellingPrice') ??  $product->sellingPrice}}"
											>
								</div>
								<span class="form-text text-muted">Brez DDV</span>

								@if ($errors->has('sellingPrice'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('sellingPrice') }}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
                </div>
                <div class="card-footer">
                    <button id="kt_login_signin_submit" type="submit" class="btn btn-primary">
                        {{ __('Shrani') }}
                    </button>
                    <a class="btn btn-secondary" href="/clients">Prekliči</a>
                </div>

                
                    </div>
                </div>
            </form>
    </div>
</div>
</div>

<link rel="stylesheet" href="/css/select2-bootstrap.css">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script>
    $(document).ready(function () {
        $('#category_id').select2();
    });
</script>
@endsection
