@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="panel panel-default">
        <div class="panel-heading">Example Form with Validation</div>
        <div class="panel-body">
          <!-- Form component -->
          <form-request inline-template>
            <div class="form-container">
              <div class="alert alert-success" v-if="submitted" v-cloak>
                Post created!
              </div>
              <form method="POST" action="{{ route('forms.store') }}" enctype="multipart/form-data" @submit.prevent="sendRequest">
                {{ csrf_field() }}
                <div class="form-group" :class="{ 'has-error': errors.email }">
                  <label for="inputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="inputEmail1" placeholder="Email" value="{{ old('email') }}" v-model="models.email">
                  <form-error v-if="errors.email" :errors="errors" v-cloak>
                    @{{ _.head(errors.email) }}
                  </form-error>
                </div>
                <div class="form-group" :class="{ 'has-error': errors.password }">
                  <label for="inputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="inputPassword1" placeholder="Password" v-model="models.password">
                  <form-error v-if="errors.password" :errors="errors" v-cloak>
                    @{{ _.head(errors.password) }}
                  </form-error>
                </div>
                <div class="form-group" :class="{ 'has-error': errors.userfile }">
                  <label for="inputFile">File input</label>
                  <input type="file" name="userfile" id="inputFile">
                  <p class="help-block" v-show="! errors.userfile">Help text here.</p>
                  <form-error v-if="errors.userfile" :errors="errors" v-cloak>
                    @{{ _.head(errors.userfile) }}
                  </form-error>
                </div>
                <div class="checkbox" :class="{ 'has-error': errors.agree }">
                  <label>
                    <input type="checkbox" name="agree" value="1" v-model="models.agree" {{ old('agree') ? 'checked="checked"' : '' }}> Check me out
                  </label>
                  <form-error v-if="errors.agree" :errors="errors" v-cloak>
                    @{{ _.head(errors.agree) }}
                  </form-error>
                </div>
                <button type="submit" class="btn btn-default">Send Request</button>
                <a href="javascript:void(0)" @click.prevent="callbackTo('foo')">Call Me</a>
              </form>
            </div>
          </form-request>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
