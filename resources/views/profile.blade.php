@extends('layouts.main')

@section('page_name', __('site_names.profile'))

@section('content')
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('site_names.edit_profile')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="edit-form" action="/edit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="usernameInput" class="form-label">{{__('validation.attributes.username')}}</label>
                    <input type="text" class="form-control" name="username" id="usernameInput" value="{{Auth::user()->username}}" required/>
                </div>
                <div class="mb-3">
                    <label for="fileInput" class="form-label">{{__('site_names.avatar')}}</label>
                    <input type="file" id="fileInput" name="avatar" class="form-control"/>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('site_names.close')}}</button>
          <button type="submit" form="edit-form" class="btn btn-primary">{{__('site_names.save')}}</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="addWork" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('site_names.add work')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="add-form" action="/works/add" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nameInput" class="form-label">{{__('site_names.title')}}</label>
                    <input type="text" class="form-control" name="name" id="nameInput" required/>
                </div>
                <div class="mb-3">
                    <label for="descriptionInput" class="form-label">{{__('site_names.description')}}</label>
                    <input type="text" class="form-control" name="description" id="descriptionInput" />
                </div>
                <div class="mb-3">
                    <label for="fileInput" class="form-label">{{__('site_names.picture')}}</label>
                    <input type="file" id="fileInput" name="image" class="form-control"/>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('site_names.close')}}</button>
          <button type="submit" form="add-form" class="btn btn-primary">{{__('site_names.add work')}}</button>
        </div>
      </div>
    </div>
  </div>
<div class="row">
    <div class="col-md-2">
        <img class="img-thumbnail" src="{{!Auth::user()->avatar ? '/images/icon-avatar-default.png' : Storage::url(Auth::user()->avatar)}}"/>
        <h1 class="text-center">{{Auth::user()->username}}</h1>
        <p class="text-center">{{Auth::user()->email}}</p>
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
              </svg>
        </button>
    </div>
    <div class="col-md-6">
        <h1>{{__('site_names.works')}}</h1>


    <div id="carouselExampleCaptions" class="carousel carousel-dark slide mb-3" data-bs-ride="carousel">
        <div class="carousel-indicators">
        @foreach( $works as $work )
            <button class="{{ $loop->first ? 'active' : '' }} type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}" ></button>
        @endforeach
        </div>

        <div class="carousel-inner">
        @foreach( $works as $work )
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img class="d-block img-fluid" src="{{ Storage::url($work->image) }}" alt="{{ $work->name }}">
                    <div class="carousel-caption d-none d-md-block">
                    <h3>{{ $work->name }}</h3>
                    <p>{{ $work->description }}</p>
                    </div>
            </div>
        @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
    </div>

        <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addWork">{{__('site_names.add work')}}</div>
    </div>
</div>
@endsection
