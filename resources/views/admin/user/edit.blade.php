@extends('layouts.admin')

@section('content')
    <section class="mt-3 container shadow d-flex justify-content-center p-5">
    <div class="panel panel-danger p-50 w-400 mb-0 ">
      <h5 class="panel-heading text-uppercase text-center">ویرایش کاربر : {{ $user->name }}</h5>
      <br><br>

        <main class="panel-body">
            {{-- {{ dd($user_permissions) }} --}}
            <permission-component user_permissions="{{ $user_permissions }}"></permission-component>
        </main>

    </div>
</section>
@stop
