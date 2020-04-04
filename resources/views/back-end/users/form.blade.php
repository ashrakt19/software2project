{{csrf_field()}}
                    <div class="row">
              @php
              $input ="name";
              @endphp
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating" >Username</label>
                          <input type="text" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" value="" class="form-control">
                          @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        @php
              $input ="email";
              @endphp 
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating" >Email address</label>
                          <input type="email" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" value="" class="form-control">
                          @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                          @php
                  $input ="password";
                  @endphp
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">password</label>
                          <input type="password" name="{{$input}}" class="form-control  @error($input) is-invalid @enderror">
                          @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                        @php $input = "group"; @endphp
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">video states</label>
                        <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror" style="color:black ">
                            <option value="admin" {{ isset($user) && $user->{$input} == 'admin'? 'selected'  :'' }}>Admin</option>
                            <option value="user" {{ isset($user) && $user->{$input} == 'user' ? 'selected'  :'' }}>user</option>
                        </select>
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                      
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                    </div>