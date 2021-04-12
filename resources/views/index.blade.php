@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-12 col-md-9">
            @foreach ($posts as $post )
                           
            <div class="card mb-4">

                <div class="card-header">
                    <h3 class="card-title mb-0" style="font-weight:bold" >
                    <a href="{{route('post',$post->id)}}"> {{$post->title}}</a>
                    </h3>
                </div>

                <div class="row">
                    <div class="col-9">
                        <div class="card-body">
                            {{Str::limit(strip_tags($post->body),'400')}}
                        </div>

                        <div class="m-4">
                            <a href="{{route('post',$post->id)}}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>

                    <div class="col-3 mt-4 ">
                        @if ($post->media_id)
                             <img src="/storage/{{$post->media->path}}" alt="image" style="max-width: 100%"/>
                        @endif                     
                    </div>
                </div>
            </div> 

            @endforeach

         {{$posts->links()}}

        </div>

        <div class="col-12 col-md-3">
            @include('layouts.categories')
            
        </div>
    </div>


</div>


@endsection