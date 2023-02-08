

<div class="mb-3 text-black">
    <label for="role_id" class="form-label ">Role</label>
    <select class="form-select bg-light border-1"  id="role_id" name="role_id">
        <option selected value="{{ $item->rid }}">{{ $item->role_name }}</option>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
        @endforeach
    </select>
</div>

<input type="submit" class="btn mt-4  col-12 btn-warning " value="Update">

