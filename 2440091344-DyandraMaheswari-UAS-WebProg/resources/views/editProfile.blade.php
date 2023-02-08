@if ($errors->any())
    <div class="alert alert-danger mt-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-3 text-black">
    <label for="first_name" class="form-label">{{ __('First Name') }}</label>
    <input type="text" class="form-control bg-light border-1"  id="first_name" name="first_name" placeholder="Enter your first name" value="{{ $item->first_name }}" >
  </div>

<div class="mb-3 text-black">
    <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
    <input type="text" class="form-control bg-light border-1"  id="last_name" name="last_name" placeholder="Enter your last name" value="{{ $item->last_name }}" >
</div>

<div class="mb-3 text-black">
  <label for="email" class="form-label ">Email</label>
  <input type="email" class="form-control bg-light border-1 " id="email" name="email"  placeholder="Enter your email" value="{{ $item->email }}">
</div>

<fieldset disabled>
    <div class="mb-3 text-black">
      <label for="role_id" class="form-label">{{ __('Role') }}</label>
      <select id="role_id" class="form-select">
        <option>{{ $role[0]->role_name }}</option>
      </select>
    </div>
</fieldset>


<div class="mb-3 text-black">
    <label for="gender_id" class="form-label ">{{ __('Gender') }}</label>
    <select class="form-select bg-light border-1"  id="gender_id" name="gender_id">
        <option selected value="{{ $currgender[0]->id }}">{{ $currgender[0]->gender_desc }}</option>
        @foreach ($genders as $gender)
            <option value="{{ $gender->id }}">{{ $gender->gender_desc }}</option>
        @endforeach
    </select>
</div>


<div class="mb-3 text-black">
    <label for="display_picture_link" class="form-label ">{{ __('Display Picture') }}</label>
    <input class="form-control bg-light border-1" type="file" id="display_picture_link" aria-describedby="display_picture_link" name="display_picture_link" value="{{ $item->display_picture_link }}">

</div>

<div class="mb-3 text-black">
  <label for="password" class="form-label">Password</label>
  <input type="password" class="form-control bg-light border-1" id="password" name="password" placeholder="Enter your password">
</div>

<div class="mb-3 text-black">
    <label for="confirm" class="form-label">{{ __('Confirm Password') }}</label>

     <input  type="password" class="form-control bg-light border-1 @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="Confirm your password" id="password">
</div>

<input type="submit" class="btn mt-4  col-12 btn-warning " value="Update">

