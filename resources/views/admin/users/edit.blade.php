@include('partials.errors')

@if (session('message'))
    <div class="">
        {{ session('message') }}
    </div>
@endif

<form method="POST" action="/admin/users/{{ $user->id }}">
    <input name="_method" type="hidden" value="PATCH">
    {!! csrf_field() !!}

    <div>
        @input_maker_label('Email')
        @input_maker_create('email', ['type' => 'string'], $user)
    </div>

    <div>
        @input_maker_label('Name')
        @input_maker_create('name', ['type' => 'string'], $user)
    </div>

    @include('user.meta')

    <div>
        @input_maker_label('Role')
        @input_maker_create('roles', ['type' => 'relationship', 'model' => 'App\Repositories\Role\Role', 'label' => 'label', 'value' => 'name'], $user)
    </div>

    <div>
        <a href="{{ URL::previous() }}">Cancel</a>
        <button type="submit">Save</button>
    </div>
</form>

<a href="/admin/users">Admin</a>