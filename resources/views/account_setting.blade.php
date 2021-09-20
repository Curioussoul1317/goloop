@extends('layouts.usersecond')

@section('content')

<script src="{{ asset('UserUi/jquery.min.js') }}"></script>
<div class="container">
    <div class="account-tabs-setting">
        <div class="row">
            <div class="col-lg-3">
                <div class="acc-leftbar">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-acc-tab" data-toggle="tab" href="#nav-acc" role="tab" aria-controls="nav-acc" aria-selected="true"><i class="la la-cogs"></i>Account Setting</a>
                        @if($user->account_of =="")
                        <a class="nav-item nav-link" id="nav-status-tab" data-toggle="tab" href="#nav-status" role="tab" aria-controls="nav-status" aria-selected="false"><i class="fa fa-user"></i>Kids Profile</a>
                        <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false"><i class="fa fa-lock"></i>Change Password</a>
                        @else
                        @endif
                        <!-- <a class="nav-item nav-link" id="nav-notification-tab" data-toggle="tab" href="#nav-notification" role="tab" aria-controls="nav-notification" aria-selected="false"><i class="fa fa-flash"></i>Notifications</a>
								    <a class="nav-item nav-link" id="nav-requests-tab" data-toggle="tab" href="#nav-requests" role="tab" aria-controls="nav-requests" aria-selected="false"><i class="fa fa-group"></i>Requests</a>
								    <a class="nav-item nav-link" id="security-login" data-toggle="tab" href="#security-login" role="tab" aria-controls="security-login" aria-selected="false"><i class="fa fa-user-secret"></i>Security and Login</a>
								    <a class="nav-item nav-link" id="privacy" data-toggle="tab" href="#privacy" role="tab" aria-controls="privacy" aria-selected="false"><i class="fa fa-paw"></i>Privacy</a>
								    <a class="nav-item nav-link" id="blockking" data-toggle="tab" href="#blockking" role="tab" aria-controls="blockking" aria-selected="false"><i class="fa fa-cc-diners-club"></i>Blocking</a>
								    <a class="nav-item nav-link" id="nav-deactivate-tab" data-toggle="tab" href="#nav-deactivate" role="tab" aria-controls="nav-deactivate" aria-selected="false"><i class="fa fa-random"></i>Deactivate Account</a> -->
                    </div>
                </div>
                <!--acc-leftbar end-->
            </div>
            <div class="col-lg-9">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-acc" role="tabpanel" aria-labelledby="nav-acc-tab">
                        <div class="acc-setting">
                            <!-- wall paper  -->
                            <h3>Wall Paper</h3>
                            <form method="POST" action="{{ route('WallPicture.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="cp-field">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <div class="cpp-fiel">
                                                <div class="form-group">
                                                    <style>
                                                        .image-upload>input {
                                                            display: none;
                                                        }
                                                    </style>
                                                    <div class="image-upload">
                                                        <label for="file-input">
                                                            <input type="hidden" name="wall_pic" value="{{$user->wall_pic}}">
                                                            @if ($user->wall_pic =="")
                                                            <img src="{{ asset('defaultimg/upload.png') }}" id="output" width="100%" />
                                                            @else
                                                            <img src="{{ asset('/storage/wallPicture/'.$user->wall_pic) }}" id="output" width="100%" />
                                                            @endif
                                                        </label>
                                                        <input id="file-input" type="file" onchange="loadFile(event)" name="UploadedFile" required />
                                                    </div>
                                                    <script>
                                                        var loadFile = function(event) {
                                                            var output = document.getElementById('output');
                                                            output.src = URL.createObjectURL(event.target.files[0]);
                                                            output.onload = function() {
                                                                URL.revokeObjectURL(output.src) // free memory
                                                            }
                                                        };
                                                    </script>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Add
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <!-- End wall paper  -->
                            <h3>Update Account Information</h3>
                            <form method="POST" action="{{ route('UserAccount.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="cp-field">
                                    <div class="form-group">
                                        <style>
                                            .image-uploadtwo>input {
                                                display: none;
                                            }
                                        </style>
                                        <div class="image-uploadtwo">
                                            <label for="file-inputtwo">
                                                @if ($user->profile_pic =="")
                                                <img src="{{ asset('defaultimg/upload.png') }}" id="outputtwo" width="150" height="150" />
                                                @else
                                                <img src="{{ asset('/storage/ProfilePics/'.$user->profile_pic)}}" id="outputtwo" width="150" height="150" />
                                                @endif
                                            </label>
                                            <input id="file-inputtwo" type="file" onchange="loadFiletwo(event)" name="UploadedFile" />
                                        </div>
                                        <script>
                                            var loadFiletwo = function(event) {
                                                var output = document.getElementById('outputtwo');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function() {
                                                    URL.revokeObjectURL(output.src) // free memory
                                                }
                                            };
                                        </script>
                                    </div>

                                </div>
                                <div class="cp-field">
                                    <div class="row">
                                        <div class="col-xs-8 col-md-8">
                                            <h5>Full Name</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="nick_name" placeholder="nick_name" value="{{$user->nick_name}}" required>
                                            </div>
                                        </div>

                                        <div class="col-xs-4 col-md-4">
                                            <h5>Date of Birth</h5>
                                            <div class="cpp-fiel">
                                                <input type="date" name="dob" value="{{$user->dob}}" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="cp-field">
                                    <div class="row">
                                        <div class="col-xs-6 col-md-6">
                                            <h5>Gender</h5>
                                            <div class="cpp-fiel">
                                                <div class="checky-sec">
                                                    <div class="fgt-sec">
                                                        @if ($user->gender =="male")
                                                        <input type="radio" name="gender" id="male" value="male" checked>
                                                        @else
                                                        <input type="radio" name="gender" id="male" value="male">
                                                        @endif
                                                        <label for="male">
                                                            <span></span>
                                                        </label>
                                                        <small>Male &nbsp; &nbsp;</small>
                                                        @if ($user->gender =="female")
                                                        <input type="radio" name="gender" id="female" value="female" checked>
                                                        @else
                                                        <input type="radio" name="gender" id="female" value="female">
                                                        @endif
                                                        <label for="female">
                                                            <span></span>
                                                        </label>
                                                        <small>Female</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-md-6">
                                            <h5>Country</h5>
                                            <div class="cpp-fiel">
                                                <select id="country" name="country" class="form-select" required>
                                                    @if($user->country !="")
                                                    <option value="{{$user->country}}">{{$user->country}}</option>
                                                    @else
                                                    <option value=" ">Please Select a Country</option>
                                                    @endif
                                                    <option value="Afganistan">Afghanistan</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bonaire">Bonaire</option>
                                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                    <option value="Brunei">Brunei</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Canary Islands">Canary Islands</option>
                                                    <option value="Cape Verde">Cape Verde</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African Republic</option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Channel Islands">Channel Islands</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Christmas Island">Christmas Island</option>
                                                    <option value="Cocos Island">Cocos Island</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Cook Islands">Cook Islands</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Curaco">Curacao</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech Republic">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="East Timor">East Timor</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="French Guiana">French Guiana</option>
                                                    <option value="French Polynesia">French Polynesia</option>
                                                    <option value="French Southern Ter">French Southern Ter</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Great Britain">Great Britain</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Hawaii">Hawaii</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="India">India</option>
                                                    <option value="Iran">Iran</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Isle of Man">Isle of Man</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Korea North">Korea North</option>
                                                    <option value="Korea Sout">Korea South</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Laos">Laos</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libya">Libya</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macau">Macau</option>
                                                    <option value="Macedonia">Macedonia</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Midway Islands">Midway Islands</option>
                                                    <option value="Moldova">Moldova</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Nambia">Nambia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                    <option value="Nevis">Nevis</option>
                                                    <option value="New Caledonia">New Caledonia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau Island">Palau Island</option>
                                                    <option value="Palestine">Palestine</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Phillipines">Philippines</option>
                                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Russia">Russia</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                    <option value="St Eustatius">St Eustatius</option>
                                                    <option value="St Helena">St Helena</option>
                                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                    <option value="St Lucia">St Lucia</option>
                                                    <option value="St Maarten">St Maarten</option>
                                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                    <option value="Saipan">Saipan</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="Samoa American">Samoa American</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Slovakia">Slovakia</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syria">Syria</option>
                                                    <option value="Tahiti">Tahiti</option>
                                                    <option value="Taiwan">Taiwan</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania">Tanzania</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                                    <option value="United States of America">United States of America</option>
                                                    <option value="Uraguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Vatican City State">Vatican City State</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Vietnam">Vietnam</option>
                                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                    <option value="Wake Island">Wake Island</option>
                                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Zaire">Zaire</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cp-field">
                                    <div class="row">
                                        <div class="col-xs-6 col-md-6">
                                            <h5>City</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="city" value="{{$user->city}}" required>
                                            </div>

                                        </div>
                                        <div class="col-xs-6 col-md-6">
                                            <h5>Address</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="address" value="{{$user->address}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="save-stngs pd2">
                                    <ul>
                                        <li><button type="submit">Update</button></li>
                                    </ul>
                                </div>
                                <!--save-stngs end-->

                            </form>
                        </div>
                        <!--acc-setting end-->
                    </div>
                    @if($user->account_of =="")
                    <div class="tab-pane fade" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab">
                        <div class="acc-setting">
                            <h3>New Profile</h3>
                            <form method="POST" action="{{ route('KidsAccount.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="cp-field">
                                    <div class="row">
                                        <div class="col-xs-8 col-md-8">
                                            <h5>NIC / Passport</h5>
                                            <div class="cpp-fiel">
                                                <input id="nic" placeholder="ID Number / Passport" type="text" class="form-control @error('nic') is-invalid @enderror" name="nic" value="{{ old('nic') }}" required autocomplete="nic" autofocus>
                                            </div>

                                            @if ($errors->has('nic'))
                                            <span class="text-danger">{{ $errors->first('nic') }}</span>
                                            @endif
                                        </div>

                                        <div class="col-xs-4 col-md-4">
                                            <h5>Full Name</h5>
                                            <div class="cpp-fiel">
                                                <input type="text" name="full_name" placeholder="Full Name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="cp-field">
                                    <div class="row">

                                        <div class="col-xs-4 col-md-4">
                                            <h5>Date of Birth</h5>
                                            <div class="cpp-fiel">
                                                <input type="date" name="dob" required>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-md-6">
                                            <h5>Gender</h5>
                                            <div class="cpp-fiel">
                                                <div class="checky-sec">
                                                    <div class="fgt-sec">
                                                        <input type="radio" name="gender" id="male" value="male">
                                                        <label for="male">
                                                            <span></span>
                                                        </label>
                                                        <small>Male &nbsp; &nbsp;</small>
                                                        <input type="radio" name="gender" id="female" value="female" checked>
                                                        <label for="female">
                                                            <span></span>
                                                        </label>
                                                        <small>Female</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="save-stngs pd2">
                                    <ul>
                                        <li><button type="submit">Create</button></li>
                                    </ul>
                                </div>
                                <!--save-stngs end-->
                            </form>
                        </div>
                        <!--acc-setting end-->
                    </div>

                    <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                        <div class="acc-setting">
                            <h3>Change Password</h3>
                            <form method="POST" action="{{ route('UserAccount.password') }}">
                                @csrf
                                <div class="cp-field">
                                    <h5>Old Password</h5>
                                    <div class="cpp-fiel">
                                        <input id="old_password" placeholder="Old Password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required>
                                        @if ($errors->has('old_password'))
                                        <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="cp-field">
                                    <h5>New Password</h5>
                                    <div class="cpp-fiel">
                                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="cp-field">
                                    <h5>Repeat Password</h5>
                                    <div class="cpp-fiel">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repeat Password" required>
                                        @error('password-confirm')
                                        <span class="error text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="save-stngs pd2">
                                    <ul>
                                        <li><button type="submit">Save Setting</button></li>
                                        <li><button type="submit">Restore Setting</button></li>
                                    </ul>
                                </div>
                                <!--save-stngs end-->
                            </form>
                        </div>
                        <!--acc-setting end-->
                    </div>
                    @else
                    @endif
                    <div class="tab-pane fade" id="nav-notification" role="tabpanel" aria-labelledby="nav-notification-tab">
                        <div class="acc-setting">
                            <h3>Notifications</h3>
                            <div class="notifications-list">
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                        <span>2 min ago</span>
                                    </div>
                                    <!--notification-info -->
                                </div>
                                <!--notfication-details end-->
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Poonam Verma</a> Bid on your Latest project.</h3>
                                        <span>2 min ago</span>
                                    </div>
                                    <!--notification-info -->
                                </div>
                                <!--notfication-details end-->
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Tonney Dhman</a> Comment on your project.</h3>
                                        <span>2 min ago</span>
                                    </div>
                                    <!--notification-info -->
                                </div>
                                <!--notfication-details end-->
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                        <span>2 min ago</span>
                                    </div>
                                    <!--notification-info -->
                                </div>
                                <!--notfication-details end-->
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                        <span>2 min ago</span>
                                    </div>
                                    <!--notification-info -->
                                </div>
                                <!--notfication-details end-->
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Poonam Verma </a> Bid on your Latest project.</h3>
                                        <span>2 min ago</span>
                                    </div>
                                    <!--notification-info -->
                                </div>
                                <!--notfication-details end-->
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Tonney Dhman</a> Comment on your project</h3>
                                        <span>2 min ago</span>
                                    </div>
                                    <!--notification-info -->
                                </div>
                                <!--notfication-details end-->
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                        <span>2 min ago</span>
                                    </div>
                                    <!--notification-info -->
                                </div>
                                <!--notfication-details end-->
                            </div>
                            <!--notifications-list end-->
                        </div>
                        <!--acc-setting end-->
                    </div>
                    <div class="tab-pane fade" id="nav-requests" role="tabpanel" aria-labelledby="nav-requests-tab">
                        <div class="acc-setting">
                            <h3>Requests</h3>
                            <div class="requests-list">
                                <div class="request-details">
                                    <div class="noty-user-img">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                    </div>
                                    <div class="request-info">
                                        <h3>Jessica William</h3>
                                        <span>Graphic Designer</span>
                                    </div>
                                    <div class="accept-feat">
                                        <ul>
                                            <li><button type="submit" class="accept-req">Accept</button></li>
                                            <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                        </ul>
                                    </div>
                                    <!--accept-feat end-->
                                </div>
                                <!--request-detailse end-->
                                <div class="request-details">
                                    <div class="noty-user-img">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                    </div>
                                    <div class="request-info">
                                        <h3>John Doe</h3>
                                        <span>PHP Developer</span>
                                    </div>
                                    <div class="accept-feat">
                                        <ul>
                                            <li><button type="submit" class="accept-req">Accept</button></li>
                                            <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                        </ul>
                                    </div>
                                    <!--accept-feat end-->
                                </div>
                                <!--request-detailse end-->
                                <div class="request-details">
                                    <div class="noty-user-img">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                    </div>
                                    <div class="request-info">
                                        <h3>Poonam</h3>
                                        <span>Wordpress Developer</span>
                                    </div>
                                    <div class="accept-feat">
                                        <ul>
                                            <li><button type="submit" class="accept-req">Accept</button></li>
                                            <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                        </ul>
                                    </div>
                                    <!--accept-feat end-->
                                </div>
                                <!--request-detailse end-->
                                <div class="request-details">
                                    <div class="noty-user-img">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                    </div>
                                    <div class="request-info">
                                        <h3>Bill Gates</h3>
                                        <span>C & C++ Developer</span>
                                    </div>
                                    <div class="accept-feat">
                                        <ul>
                                            <li><button type="submit" class="accept-req">Accept</button></li>
                                            <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                        </ul>
                                    </div>
                                    <!--accept-feat end-->
                                </div>
                                <!--request-detailse end-->
                                <div class="request-details">
                                    <div class="noty-user-img">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                    </div>
                                    <div class="request-info">
                                        <h3>Jessica William</h3>
                                        <span>Graphic Designer</span>
                                    </div>
                                    <div class="accept-feat">
                                        <ul>
                                            <li><button type="submit" class="accept-req">Accept</button></li>
                                            <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                        </ul>
                                    </div>
                                    <!--accept-feat end-->
                                </div>
                                <!--request-detailse end-->
                                <div class="request-details">
                                    <div class="noty-user-img">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                    </div>
                                    <div class="request-info">
                                        <h3>John Doe</h3>
                                        <span>PHP Developer</span>
                                    </div>
                                    <div class="accept-feat">
                                        <ul>
                                            <li><button type="submit" class="accept-req">Accept</button></li>
                                            <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                        </ul>
                                    </div>
                                    <!--accept-feat end-->
                                </div>
                                <!--request-detailse end-->
                            </div>
                            <!--requests-list end-->
                        </div>
                        <!--acc-setting end-->
                    </div>
                    <div class="tab-pane fade" id="nav-deactivate" role="tabpanel" aria-labelledby="nav-deactivate-tab">
                        <div class="acc-setting">
                            <h3>Deactivate Account</h3>
                            <form>
                                <div class="cp-field">
                                    <h5>Email</h5>
                                    <div class="cpp-fiel">
                                        <input type="text" name="email" placeholder="Email">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="cp-field">
                                    <h5>Password</h5>
                                    <div class="cpp-fiel">
                                        <input type="password" name="password" placeholder="Password">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                                <div class="cp-field">
                                    <h5>Please Explain Further</h5>
                                    <textarea></textarea>
                                </div>
                                <div class="cp-field">
                                    <div class="fgt-sec">
                                        <input type="checkbox" name="cc" id="c4">
                                        <label for="c4">
                                            <span></span>
                                        </label>
                                        <small>Email option out</small>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex euismod, posuere lectus id,</p>
                                </div>
                                <div class="save-stngs pd3">
                                    <ul>
                                        <li><button type="submit">Save Setting</button></li>
                                        <li><button type="submit">Restore Setting</button></li>
                                    </ul>
                                </div>
                                <!--save-stngs end-->
                            </form>
                        </div>
                        <!--acc-setting end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--account-tabs-setting end-->
</div>

@endsection
