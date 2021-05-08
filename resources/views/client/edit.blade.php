@extends('layout.default')

@section('content')

@php 
$client_type = array("Fizicna oseba" => "Fizična oseba", "Pravna oseba" => "Pravna oseba", "s.p." => "Samostojni podjetnik", "Drugo" => "Drugo");
$country_list = array(
		"Afghanistan",
		"Albania",
		"Algeria",
		"Andorra",
		"Angola",
		"Antigua and Barbuda",
		"Argentina",
		"Armenia",
		"Australia",
		"Austria",
		"Azerbaijan",
		"Bahamas",
		"Bahrain",
		"Bangladesh",
		"Barbados",
		"Belarus",
		"Belgium",
		"Belize",
		"Benin",
		"Bhutan",
		"Bolivia",
		"Bosnia and Herzegovina",
		"Botswana",
		"Brazil",
		"Brunei",
		"Bulgaria",
		"Burkina Faso",
		"Burundi",
		"Cambodia",
		"Cameroon",
		"Canada",
		"Cape Verde",
		"Central African Republic",
		"Chad",
		"Chile",
		"China",
		"Colombi",
		"Comoros",
		"Congo (Brazzaville)",
		"Congo",
		"Costa Rica",
		"Cote d'Ivoire",
		"Croatia",
		"Cuba",
		"Cyprus",
		"Czech Republic",
		"Denmark",
		"Djibouti",
		"Dominica",
		"Dominican Republic",
		"East Timor (Timor Timur)",
		"Ecuador",
		"Egypt",
		"El Salvador",
		"Equatorial Guinea",
		"Eritrea",
		"Estonia",
		"Ethiopia",
		"Fiji",
		"Finland",
		"France",
		"Gabon",
		"Gambia, The",
		"Georgia",
		"Germany",
		"Ghana",
		"Greece",
		"Grenada",
		"Guatemala",
		"Guinea",
		"Guinea-Bissau",
		"Guyana",
		"Haiti",
		"Honduras",
		"Hungary",
		"Iceland",
		"India",
		"Indonesia",
		"Iran",
		"Iraq",
		"Ireland",
		"Israel",
		"Italy",
		"Jamaica",
		"Japan",
		"Jordan",
		"Kazakhstan",
		"Kenya",
		"Kiribati",
		"Korea, North",
		"Korea, South",
		"Kuwait",
		"Kyrgyzstan",
		"Laos",
		"Latvia",
		"Lebanon",
		"Lesotho",
		"Liberia",
		"Libya",
		"Liechtenstein",
		"Lithuania",
		"Luxembourg",
		"Macedonia",
		"Madagascar",
		"Malawi",
		"Malaysia",
		"Maldives",
		"Mali",
		"Malta",
		"Marshall Islands",
		"Mauritania",
		"Mauritius",
		"Mexico",
		"Micronesia",
		"Moldova",
		"Monaco",
		"Mongolia",
		"Morocco",
		"Mozambique",
		"Myanmar",
		"Namibia",
		"Nauru",
		"Nepal",
		"Netherlands",
		"New Zealand",
		"Nicaragua",
		"Niger",
		"Nigeria",
		"Norway",
		"Oman",
		"Pakistan",
		"Palau",
		"Panama",
		"Papua New Guinea",
		"Paraguay",
		"Peru",
		"Philippines",
		"Poland",
		"Portugal",
		"Qatar",
		"Romania",
		"Russia",
		"Rwanda",
		"Saint Kitts and Nevis",
		"Saint Lucia",
		"Saint Vincent",
		"Samoa",
		"San Marino",
		"Sao Tome and Principe",
		"Saudi Arabia",
		"Senegal",
		"Serbia and Montenegro",
		"Seychelles",
		"Sierra Leone",
		"Singapore",
		"Slovakia",
		"Slovenia",
		"Solomon Islands",
		"Somalia",
		"South Africa",
		"Spain",
		"Sri Lanka",
		"Sudan",
		"Suriname",
		"Swaziland",
		"Sweden",
		"Switzerland",
		"Syria",
		"Taiwan",
		"Tajikistan",
		"Tanzania",
		"Thailand",
		"Togo",
		"Tonga",
		"Trinidad and Tobago",
		"Tunisia",
		"Turkey",
		"Turkmenistan",
		"Tuvalu",
		"Uganda",
		"Ukraine",
		"United Arab Emirates",
		"United Kingdom",
		"United States",
		"Uruguay",
		"Uzbekistan",
		"Vanuatu",
		"Vatican City",
		"Venezuela",
		"Vietnam",
		"Yemen",
		"Zambia",
		"Zimbabwe"
	);




@endphp
<div class="container">
<div class="row col-lg-12">
    <div class="card card-custom col-lg-12">
            <div class="card-header">
                <h3 class="card-title">
                    Urejanje stranke - {{ $client->name }}
                </h3>
            </div>
            <form method="POST" action="/client/{{ $client-> id }}" encrypte="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="card-body">

                    {{-- Prva vrsta --}}
                    <div class="form-group row">
                        <div class="col-lg-11">
                            <label for="name" class="control-label">Ime in priimek / naziv</label>
                            <input  id="name" 
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror" 
                                    name="name" 
                                    placeholder="Vnesite ime in priimek stranke ali ime podjetja" 
                                    value="{{old('name') ??  $client->name}}"
                                    autofocus>
    
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-1">
                            <label for="taxPayer" class="control-label">Dav. zav.</label>
                            <span class="switch">
                                <label>
                                    <input  id="taxPayer"
                                            name="taxPayer"
                                            type="checkbox"                     
                                            class="form-control" 
                                            {{ ($client->taxPayer) ? "checked" : "" }}/>
                                    <span></span>
                                </label>
                            </span>
                        </div> 
                    </div>

                    {{-- Druga vrsta --}}
                    <div class="form-group row">

                        <div class="col-lg-3">
                            <label for="type" class="control-label">Tip stranke</label>
                            <select id="type"
                                    name="type"
                                    class="form-control"
                                    required>
                                    @foreach ($client_type as $key => $value)
                                        <option value="{{ $key }}" {{ ( $key == $client->type) ? 'selected' : '' }}> 
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

                        <div class="col-lg-3">
                            <label for="registrationNumber" class="control-label">Matična številka (EMŠO)</label>
                            <input  id="registrationNumber" 
                                    type="text"
                                    class="form-control @error('registrationNumber') is-invalid @enderror" 
                                    name="registrationNumber" 
                                    value="{{old('registrationNumber') ??  $client->registrationNumber}}">
    
                            @if ($errors->has('registrationNumber'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('registrationNumber') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-lg-6">
                            <label for="taxNumber" class="control-label">Davčna številka</label>
                            <input  id="taxNumber" 
                                    type="text"
                                    class="form-control @error('taxNumber') is-invalid @enderror" 
                                    name="taxNumber"
                                    value="{{old('taxNumber')  ??  $client->taxNumber}}">
    
                            @if ($errors->has('taxNumber'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('taxNumber') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Tretja vrsta --}}
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="address" class="control-label">Naslov</label>
                            <input  id="address" 
                                    type="text"
                                    class="form-control @error('address') is-invalid @enderror" 
                                    name="address" 
                                    placeholder="Slovenska cesta 1, 1000 Ljubljana"
                                    value="{{old('address')  ??  $client->address}}">
    
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-lg-6">
                            <label for="country" class="control-label">Država</label>
                            <select id="country"
                                    name="country"
                                    class="form-control"
                                    required>
                                    @foreach ($country_list as $key => $value)
                                        <option value="{{ $value }}" {{ ( $value == $client->country) ? 'selected' : '' }}> 
                                            {{ $value }}                             
                                        </option>
                                    @endforeach    
                            </select>
                            @if ($errors->has('country'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Tretja vrsta --}}
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="email" class="control-label">Email</label>
                            <input  id="email" 
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" 
                                    placeholder="naslov@mail.com"
                                    value="{{old('email')  ??  $client->email}}">
    
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-lg-6">
                            <label for="phone" class="control-label">Telefonska številka</label>
                            <input  id="phone" 
                                    type="text"
                                    class="form-control @error('phone') is-invalid @enderror" 
                                    name="phone" 
                                    placeholder="040 111 222"
                                    value="{{old('phone')  ??  $client->phone}}">
    
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
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
        $('#country').select2();

        if ($('#taxPayer').prop("checked") == false) {
            $('#taxNumber').prop("disabled", true);
        };
        $("#taxPayer").click(function () {
            console.log("click");
            if ($(this).prop("checked") == true) {
                $('#taxNumber').prop("disabled", false);
            }
            else if ($(this).prop("checked") == false) {
                $('#taxNumber').val("");
                $('#taxNumber').prop("disabled", true);
            }
        });
    });
</script>
@endsection
