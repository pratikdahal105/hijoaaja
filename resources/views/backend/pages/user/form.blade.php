<div class="form-row">
    <div class="form-group col-md-12">
        <label class="form-label" for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="@if($user){{$user->name}}@else{{old('name')}}@endif" required/>
    </div>
    <div class="form-group col-md-12">
        <label class="form-label" for="name">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="@if($user){{$user->email}}@else{{old('email')}}@endif" required/>
    </div>
    <div class="form-group col-md-12">
        <label class="form-label" for="name">Password</label>
        <input type="password" class="form-control" id="password" name="password" @if(!$user)required @endif/>
    </div>
    @if(!$user)
    <div class="form-group col-md-12">
        <label class="form-label" for="name">Confirm Password</label>
        <input type="password" class="form-control" id="password" name="password_confirmation" @if(!$user)required @endif/>
    </div>
    @endif
    <div class="form-group col-md-12">
        <label class="form-label" for="name">Role</label>
        <select class="form-control" id="role_id" name="role_id" required>
            @if(!$user)
                <option value="" selected disabled>Please select a role</option>
                @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->role}}</option>
                @endforeach

            @else
                @foreach($roles as $role)
                    @if($role->id == $user->role_id)
                        <option value="{{$role->id}}" selected>{{$role->role}}</option>
                    @else
                        <option value="{{$role->id}}">{{$role->role}}</option>
                    @endif
                @endforeach
            @endif
        </select>
    </div>
</div>
@if($user)
    <button type="submit" class="btn btn-primary">Update</button>
@else
    <button type="submit" class="btn btn-primary">Create</button>
@endif
<a href="{{route('user.list')}}" class="btn btn-danger">Cancel</a>
