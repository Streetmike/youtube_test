{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
    {{--<title>Laravel</title>--}}

    {{--<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">--}}

    {{--<style>--}}
        {{--html, body {--}}
            {{--height: 100%;--}}
        {{--}--}}

        {{--body {--}}
            {{--margin: 0;--}}
            {{--padding: 0;--}}
            {{--width: 100%;--}}
            {{--display: table;--}}
            {{--font-weight: 100;--}}
            {{--font-family: 'Lato';--}}
        {{--}--}}

        {{--.container {--}}
            {{--text-align: center;--}}
            {{--display: table-cell;--}}
            {{--vertical-align: middle;--}}
        {{--}--}}

        {{--.content {--}}
            {{--text-align: center;--}}
            {{--display: inline-block;--}}
        {{--}--}}
    {{--</style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
    {{--<div class="content">--}}
        {{--@if(Session::get('msg'))--}}
            {{--<div class="alert alert-success" role="alert"><strong>{{Session::get('msg')}}</strong></div>--}}
        {{--@endif--}}
        {{--@if(isset($errors) && $errors->count())--}}
            {{--<div class="alert alert-danger" role="alert">--}}
                {{--@foreach($errors->all() as $msg)--}}
                    {{--<p>{{trans($msg)}}</p>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--@endif--}}
        {{--<div class="title">Youtube Rank Checker</div>--}}
        {{--<div class="col-md-12 col-lg-12">--}}
            {{--<form action="{{ route('handle') }}" class="form-horizontal" style="display: inherit;" role="form" method="POST" accept-charset="utf-8">--}}
                {{--{{ csrf_field() }}--}}

                {{--<div class="form-group">--}}
                    {{--<div class="col-sm-10">--}}
                        {{--<input type="text" name="url" class="form-control object" placeholder="Insert URL here...">--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--<div class="col-sm-10">--}}
                        {{--<input type="text" name="keywords" class="form-control numeric" autocomplete="off" placeholder="keywords, go, here...">--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--<div class="col-sm-10">--}}
                        {{--<select name="country">--}}
                            {{--@foreach($countries as $item)--}}
                                {{--<option value="{{ $item->alpha2Code }}">{{ $item->name }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group" id="submit-btm">--}}
                    {{--<div class="col-sm-offset-2 col-sm-10">--}}
                        {{--<button type="submit" class="btn btn-success">Find Rank</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}

<!DOCTYPE html>
<html lang="en">
<hea>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/>
    <meta content="ie=edge" http-equiv="x-ua-compatible"/>


    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">-->
    <link rel="stylesheet" href="{{ asset('../assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('../assets/css/main.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('../assets/libs/glyphicons.css') }}" rel="stylesheet"/>

    <title>Rank Checker</title>
</hea>
<body>
<div class="container  mt-5">
    <div class="row ">
        <div class="col-xl-6 offset-xl-3 text-center">
            <div class="row">

                <div class="col-xl-12">
                    <h1 class="h2 text-danger">
                        Youtube Rank Checker
                    </h1>
                </div>
                <div class="col">
                    <p class="font-weight-bold">
                        A simple web-based youtube rank checker tool that you can use to find the ranking of any youtube video.
                    </p>
                </div>
            </div>
            @if(Session::get('msg'))
                <div class="alert alert-success" role="alert"><strong>{{Session::get('msg')}}</strong></div>
            @endif
            @if(isset($errors) && $errors->count())
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $msg)
                        <p>{{trans($msg)}}</p>
                    @endforeach
                </div>
            @endif
            {{--<div class="alert alert-danger mt-2" role="alert">--}}
                {{--This is a danger alert—check it out!--}}
            {{--</div>--}}
            {{--<div class="alert alert-primary mt-2" role="alert">--}}
                {{--This is a primary alert—check it out!--}}
            {{--</div>--}}
            {{--<div class="alert alert-success mt-2" role="alert">--}}
                {{--This is a success alert—check it out!--}}
            {{--</div>--}}
            <div class="row bg-info rounded">
                <form action="{{ route('handle') }}" role="form" method="POST" accept-charset="utf-8">
                    {{ csrf_field() }}
                    <div class="col-xl-12">

                        <div class="col-xl-12 mt-5 ">
                            <div>
                                <input name="url" placeholder="Insert URL here..." class="form-control " type="text">
                            </div>
                            <div class="mt-1 ">
                                <div class="font-weight-normal text-warning">The youtube video link.</div>
                            </div>
                        </div>

                        <div class="col-xl-12 mt-4">
                            <div>
                                <input name="keywords" placeholder="keywords, go, here..." class="form-control " type="text">
                            </div>
                            <div class="pt-2">
                                <div class="font-weight-normal text-warning">The keywords used to check the rank, seperate by a
                                    comma.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 mt-4">

                                <div>
                                    <select class="custom-select font-weight-bold" name="country">
                                        <option disabled="disabled" value="">Most popular:</option>
                                        <option value="US">United States</option>
                                        <option value="FR">France</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="DE">Germany</option>
                                        <option value="PT">Portugal</option>
                                        <option disabled="disabled" value="">All countries:</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia, Plurinational State of</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Côte d'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curaçao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Réunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthélemy</option>
                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="text-center pt-2">
                                    <div class="font-weight-normal text-warning">Each country has a different ranking, choose where most of your traffic is from.</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 my-4">
                            <button type="submit" class="btn btn-lg btn-warning">
                                <i aria-hidden="true"> Start Sort</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="resultados">

                <div class="">
                    @if(isset($result))
                    <div class="container mt-3">
                        <div class="row">
                            <div class="col-xl-4 border border-dark ">
                                <div>
                                    <a href="{{ isset($result['video']) ? 'https://www.youtube.com/watch?v=' . $result['video']->id : '#'}}">
                                        <img src="{{ isset($result['video']) ? $result['video']->snippet->thumbnails->default->url : ''}}">
                                        <p>{{ isset($result['video']) ? $result['video']->snippet->title : ''}}</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-4 ">
                                <div class="border border-dark">
                                    <div class="">
                                        {{ $result['keywords'] }}
                                        <p class="font-weight-bold text-danger text-left">
                                            @if(isset($result['place']))
                                            We searched the keyword {{ $result['keywords'] }} as a {{ $result['country'] }} resident and we found the video on position # {{ $result['place'] }}.
                                            @else
                                            We couldn't find that video when searching {{ $result['keywords'] }} as a {{ $result['country'] }} resident :(
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 ">
                                <div class="border border-dark ">
                                    <div class=" ">
                                        <div class="col-xl-12">
                                            <div class="col-xl-6">
                                                Position {{ isset($result['place']) ? $result['place'] : ':('}}
                                            </div>
                                            <div class="col-xl-6">
                                                Views {{ $result['video']->statistics->viewCount }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <!--    <script src="libs/jquery/jquery.min.js"></script>
            <script src="libs/popper.min.js" type="text/javascript"></script>
            <script src="libs/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->
</body>
</html>

