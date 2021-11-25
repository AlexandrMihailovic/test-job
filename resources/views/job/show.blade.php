@extends('layouts.app')
@section('content')
    <h1 class="text-4xl text-center">Jobs: {{ $job->title }}</h1>
    <div class="my-4">
        <div class="flex flex-wrap">
            <div class="w-1/4 py-4">Company:</div>
            <div class="w-3/4 py-4">{{ $job->company }}</div>
            <div class="w-1/4 py-4">Location:</div>
            <div class="w-3/4 py-4">{{ $job->location }}</div>
            <div class="w-1/4 py-4">Description:</div>
            <div class="w-3/4 py-4">{!! $job->description !!}</div>
        </div>
    </div>
    <div class="my-4">
        <h2>CV list:</h2>
        @forelse ($cv as $item)
            <div class="flex flex-wrap bg-purple-600 bg-opacity-50 p-2 m-1 ring-4">
                <div class="w-1/4 py-4"> Name: </div>
                <div class="w-3/4 py-4"> {{ $item->name }}</div>
                <div class="w-1/4 py-4">Phone: </div>
                <div class="w-3/4 py-4"> {{ $item->phone }}</div>
                <div class="w-1/4 py-4">Address: </div>
                <div class="w-3/4 py-4"> {{ $item->address }}</div>
                <div class="w-1/4 py-4">Education: </div>
                <div class="w-3/4 py-4"> {{ $item->education }}</div>
                <div class="w-1/4 py-4">Work: </div>
                <div class="w-3/4 py-4"> {{ $item->work }}</div>
                <div class="w-1/4 py-4">Experience: </div>
                <div class="w-3/4 py-4"> {{ $item->experience }}</div>
            </div>
        @empty
            <h3>Not CV</h3>
        @endforelse
    </div>
@endsection
