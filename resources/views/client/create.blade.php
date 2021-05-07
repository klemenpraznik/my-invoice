@extends('layout.default')

@section('content')
<div class="container">
<div class="row col-lg-12">
    <div class="card card-custom col-lg-12">
            <div class="card-header">
                <h3 class="card-title">
                    Dodajanje nove stranke
                </h3>
            </div>
            <form method="POST" action="/client" encrypte="multipart/form-data">
                @csrf
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
                                    value="{{old('name')}}"
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
                                            class="form-control" checked/>
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
                                <option value="Fizicna oseba">Fizična oseba</option>
                                <option value="Pravna oseba">Pravna oseba</option>
                                <option value="s.p.">Samostojni podjetnik</option>
                                <option value="Drugo">Drugo</option>
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
                                    value="{{old('registrationNumber')}}">
    
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
                                    value="{{old('taxNumber')}}">
    
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
                                    value="{{old('address')}}">
    
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
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                    <option>American Samoa</option>
                                    <option>Andorra</option>
                                    <option>Angola</option>
                                    <option>Anguilla</option>
                                    <option>Argentina</option>
                                    <option>Armenia</option>
                                    <option>Aruba</option>
                                    <option>Australia</option>
                                    <option>Austria</option>
                                    <option>Azerbaijan</option>
                                    <option>Bahamas</option>
                                    <option>Bahrain</option>
                                    <option>Bangladesh</option>
                                    <option>Barbados</option>
                                    <option>Belarus</option>
                                    <option>Belgium</option>
                                    <option>Belize</option>
                                    <option>Benin</option>
                                    <option>Bermuda</option>
                                    <option>Bhutan</option>
                                    <option>Bolivia</option>
                                    <option>Bosnia and Herzegowina</option>
                                    <option>Botswana</option>
                                    <option>Bouvet Island</option>
                                    <option>Brazil</option>
                                    <option>British Indian Ocean Territory</option>
                                    <option>Brunei Darussalam</option>
                                    <option>Bulgaria</option>
                                    <option>Burkina Faso</option>
                                    <option>Burundi</option>
                                    <option>Cambodia</option>
                                    <option>Cameroon</option>
                                    <option>Canada</option>
                                    <option>Cape Verde</option>
                                    <option>Cayman Islands</option>
                                    <option>Central African Republic</option>
                                    <option>Chad</option>
                                    <option>Chile</option>
                                    <option>China</option>
                                    <option>Christmas Island</option>
                                    <option>Cocos (Keeling) Islands</option>
                                    <option>Colombia</option>
                                    <option>Comoros</option>
                                    <option>Congo</option>
                                    <option>Congo, the Democratic Republic of the</option>
                                    <option>Cook Islands</option>
                                    <option>Costa Rica</option>
                                    <option>Cote d'Ivoire</option>
                                    <option>Croatia (Hrvatska)</option>
                                    <option>Cuba</option>
                                    <option>Cyprus</option>
                                    <option>Czech Republic</option>
                                    <option>Denmark</option>
                                    <option>Djibouti</option>
                                    <option>Dominica</option>
                                    <option>Dominican Republic</option>
                                    <option>Ecuador</option>
                                    <option>Egypt</option>
                                    <option>El Salvador</option>
                                    <option>Equatorial Guinea</option>
                                    <option>Eritrea</option>
                                    <option>Estonia</option>
                                    <option>Ethiopia</option>
                                    <option>Falkland Islands (Malvinas)</option>
                                    <option>Faroe Islands</option>
                                    <option>Fiji</option>
                                    <option>Finland</option>
                                    <option>France</option>
                                    <option>French Guiana</option>
                                    <option>French Polynesia</option>
                                    <option>French Southern Territories</option>
                                    <option>Gabon</option>
                                    <option>Gambia</option>
                                    <option>Georgia</option>
                                    <option>Germany</option>
                                    <option>Ghana</option>
                                    <option>Gibraltar</option>
                                    <option>Greece</option>
                                    <option>Greenland</option>
                                    <option>Grenada</option>
                                    <option>Guadeloupe</option>
                                    <option>Guam</option>
                                    <option>Guatemala</option>
                                    <option>Guinea</option>
                                    <option>Guinea-Bissau</option>
                                    <option>Guyana</option>
                                    <option>Haiti</option>
                                    <option>Heard and Mc Donald Islands</option>
                                    <option>Holy See (Vatican City State)</option>
                                    <option>Honduras</option>
                                    <option>Hong Kong</option>
                                    <option>Hungary</option>
                                    <option>Iceland</option>
                                    <option>India</option>
                                    <option>Indonesia</option>
                                    <option>Iran (Islamic Republic of)</option>
                                    <option>Iraq</option>
                                    <option>Ireland</option>
                                    <option>Israel</option>
                                    <option>Italy</option>
                                    <option>Jamaica</option>
                                    <option>Japan</option>
                                    <option>Jordan</option>
                                    <option>Kazakhstan</option>
                                    <option>Kenya</option>
                                    <option>Kiribati</option>
                                    <option>Korea, Democratic People's Republic of</option>
                                    <option>Korea, Republic of</option>
                                    <option>Kuwait</option>
                                    <option>Kyrgyzstan</option>
                                    <option>Lao People's Democratic Republic</option>
                                    <option>Latvia</option>
                                    <option>Lebanon</option>
                                    <option>Lesotho</option>
                                    <option>Liberia</option>
                                    <option>Libyan Arab Jamahiriya</option>
                                    <option>Liechtenstein</option>
                                    <option>Lithuania</option>
                                    <option>Luxembourg</option>
                                    <option>Macau</option>
                                    <option>Macedonia, The Former Yugoslav Republic of</option>
                                    <option>Madagascar</option>
                                    <option>Malawi</option>
                                    <option>Malaysia</option>
                                    <option>Maldives</option>
                                    <option>Mali</option>
                                    <option>Malta</option>
                                    <option>Marshall Islands</option>
                                    <option>Martinique</option>
                                    <option>Mauritania</option>
                                    <option>Mauritius</option>
                                    <option>Mayotte</option>
                                    <option>Mexico</option>
                                    <option>Micronesia, Federated States of</option>
                                    <option>Moldova, Republic of</option>
                                    <option>Monaco</option>
                                    <option>Mongolia</option>
                                    <option>Montserrat</option>
                                    <option>Morocco</option>
                                    <option>Mozambique</option>
                                    <option>Myanmar</option>
                                    <option>Namibia</option>
                                    <option>Nauru</option>
                                    <option>Nepal</option>
                                    <option>Netherlands</option>
                                    <option>Netherlands Antilles</option>
                                    <option>New Caledonia</option>
                                    <option>New Zealand</option>
                                    <option>Nicaragua</option>
                                    <option>Niger</option>
                                    <option>Nigeria</option>
                                    <option>Niue</option>
                                    <option>Norfolk Island</option>
                                    <option>Northern Mariana Islands</option>
                                    <option>Norway</option>
                                    <option>Oman</option>
                                    <option>Pakistan</option>
                                    <option>Palau</option>
                                    <option>Panama</option>
                                    <option>Papua New Guinea</option>
                                    <option>Paraguay</option>
                                    <option>Peru</option>
                                    <option>Philippines</option>
                                    <option>Pitcairn</option>
                                    <option>Poland</option>
                                    <option>Portugal</option>
                                    <option>Puerto Rico</option>
                                    <option>Qatar</option>
                                    <option>Reunion</option>
                                    <option>Romania</option>
                                    <option>Russian Federation</option>
                                    <option>Rwanda</option>
                                    <option>Saint Kitts and Nevis</option>
                                    <option>Saint LUCIA</option>
                                    <option>Saint Vincent and the Grenadines</option>
                                    <option>Samoa</option>
                                    <option>San Marino</option>
                                    <option>Sao Tome and Principe</option>
                                    <option>Saudi Arabia</option>
                                    <option>Senegal</option>
                                    <option>Seychelles</option>
                                    <option>Sierra Leone</option>
                                    <option>Singapore</option>
                                    <option>Slovakia (Slovak Republic)</option>
                                    <option selected="selected">Slovenia</option>
                                    <option>Solomon Islands</option>
                                    <option>Somalia</option>
                                    <option>South Africa</option>
                                    <option>South Georgia and the South Sandwich Islands</option>
                                    <option>Spain</option>
                                    <option>Sri Lanka</option>
                                    <option>St. Helena</option>
                                    <option>St. Pierre and Miquelon</option>
                                    <option>Sudan</option>
                                    <option>Suriname</option>
                                    <option>Svalbard and Jan Mayen Islands</option>
                                    <option>Swaziland</option>
                                    <option>Sweden</option>
                                    <option>Switzerland</option>
                                    <option>Syrian Arab Republic</option>
                                    <option>Taiwan, Province of China</option>
                                    <option>Tajikistan</option>
                                    <option>Tanzania, United Republic of</option>
                                    <option>Thailand</option>
                                    <option>Togo</option>
                                    <option>Tokelau</option>
                                    <option>Tonga</option>
                                    <option>Trinidad and Tobago</option>
                                    <option>Tunisia</option>
                                    <option>Turkey</option>
                                    <option>Turkmenistan</option>
                                    <option>Turks and Caicos Islands</option>
                                    <option>Tuvalu</option>
                                    <option>Uganda</option>
                                    <option>Ukraine</option>
                                    <option>United Arab Emirates</option>
                                    <option>United Kingdom</option>
                                    <option>United States</option>
                                    <option>United States Minor Outlying Islands</option>
                                    <option>Uruguay</option>
                                    <option>Uzbekistan</option>
                                    <option>Vanuatu</option>
                                    <option>Venezuela</option>
                                    <option>Viet Nam</option>
                                    <option>Virgin Islands (British)</option>
                                    <option>Virgin Islands (U.S.)</option>
                                    <option>Wallis and Futuna Islands</option>
                                    <option>Western Sahara</option>
                                    <option>Yemen</option>
                                    <option>Zambia</option>
                                    <option>Zimbabwe</option>
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
                                    value="{{old('email')}}">
    
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
                                    value="{{old('phone')}}">
    
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
