@extends('layouts.app')

@section('content')
    @auth
        <header class="dashboard-admin-header">
            <div class="container">
                <nav class="dashboard-admin-header__menu">
                    <a href="{{ route( 'home' ) }}" type="button" class="btn btn-success dashboard-admin-header__menu-item">{{ __('All post') }}</a>
                    <a href="{{ route( 'posts.create' ) }}" type="button" class="btn btn-success dashboard-admin-header__menu-item">{{ __('Create post') }}</a>
                    <a href="{{ route( 'profile.index' ) }}" type="button" class="btn btn-success dashboard-admin-header__menu-item">{{ __('Profile') }}</a>
                </nav>
            </div>
        </header>
    @endauth
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @isset($posts)
                <div class="dashboard-posts">
                    @foreach($posts as $post)
                        <div class="dashboard-post">
                            @if( $post->thumbnail )
                            <div class="dashboard-post__image">
                                <img src="{{ asset(Storage::url($post->thumbnail->path)) }}" alt="{{$post->title}}">
                            </div>
                            @endif
                            <h3 class="dashboard-post__title">{{$post->title}}</h3>
                            <p class="dashboard-post__description">{{$post->description}}</p>
                            <div class="dashboard-post__actions">
                                <a href="{{route('posts.show', ['post' => $post->id])}}" class="btn btn-primary dashboard-post__action">{{ __('Read more') }}</a>
                            </div>
                            <div class="dashboard-post__footer">
                                Posted on: {{$post->created_at}}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endisset
        </div>
    </div>
</div>
@endsection
