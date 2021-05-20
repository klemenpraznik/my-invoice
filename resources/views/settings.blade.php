@extends('layout.default')

@section('content')

@php 
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
                    Nastavitve računa
                </h3>
            </div>
            <form method="POST" action="/settings/{{ $user->id }}" encrypte="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="card-body">
                    <h5 class=" text-dark font-weight-bold mb-10">Podatki za prikaz na računu</h5>
                    {{-- Prva vrsta --}}
                    <div class="form-group row">
                        <div class="col-lg-8">
                            <label for="display_name" class="control-label">Ime in priimek / naziv podjetja</label>
                            <input  id="display_name" 
                                    type="text"
                                    class="form-control @error('display_name') is-invalid @enderror" 
                                    name="display_name" 
                                    placeholder="Vnesite ime in priimek ali ime podjetja" 
                                    value="{{old('display_name') ??  $user->display_name}}"
                                    autofocus>
    
                            @if ($errors->has('display_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('display_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <label for="display_color" class="control-label">Barva podjetja</label>
                            <input  id="display_color" 
                                    type="color"
                                    data-control="hue"
                                    class="form-control" 
                                    name="display_color" 
                                    value="{{old('display_color') ??  $user->display_color}}"
                                    >
                        </div>
                    </div> 
                    {{-- Druga vrsta --}}
                    <div class="form-group row">
                        <div class="col-lg-8">
                            <label for="display_address" class="control-label">Naslov podjetja</label>
                            <input  id="display_address" 
                                    type="text"
                                    class="form-control @error('display_address') is-invalid @enderror" 
                                    name="display_address" 
                                    placeholder="Vnesite naslov podjetja" 
                                    value="{{old('display_address') ??  $user->display_address}}"
                                    autofocus>
    
                            @if ($errors->has('display_address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('display_address') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <label for="display_country" class="control-label">Država</label>
                            <select id="display_country"
                                    name="display_country"
                                    class="form-control"
                                    required>
                                    @foreach ($country_list as $key => $value)
                                        <option value="{{ $value }}" {{ ( $value == $user->display_country) ? 'selected' : '' }}> 
                                            {{ $value }}                             
                                        </option>
                                    @endforeach    
                            </select>
                            @if ($errors->has('display_country'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('display_country') }}</strong>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    $(document).ready(function () {
        $('#display_country').select2();
    });
    
</script>

@endsection
