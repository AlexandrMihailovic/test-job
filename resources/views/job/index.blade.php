@extends('layouts.app')
@section('content')
    <h1 class="text-4xl text-center">Jobs search</h1>
    <div class="my-4">
        <form action="" method="POST">
            @csrf
            <div class="flex justify-center">
                <input class=" px-4 py-3 rounded-full border-gray-500 " type="text" placeholder="Insert search" name="q">
                <button class=" bg-green-500  rounded-full p-3 ml-3">search</button>
            </div>
        </form>
    </div>
    <div id="resault"></div>
@endsection
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            $('form').on('submit', function() {
                $('#resault').empty();
                let data = new FormData(this);
                axios.post("{{ route('job.search') }}", data)
                    .then(function(response) {
                        console.log(response.data.jobs.length);
                        if (response.data.jobs.length > 0) {
                            for (let key in response.data.jobs) {
                                let item = createJobElement(response.data.jobs[key]);
                                $('#resault').append(item);
                            }
                        } else {
                            $('#resault').html('<h4>Not resault</h4>');
                        }

                    })
                    .catch(function(error) {
                        console.log(error);
                    });
                return false;
            })
        })

        function createJobElement(job) {
            let obj = $('<div></div>').append($('<h3></h3>').html(job.title)).addClass('p-2 ring-4 ring-indigo-300 m-3 ');
            $(obj).append($('<p></p>').html(job.company));
            $(obj).append($('<p></p>').html(job.location));
            $(obj).append($('<a></a>').prop('href', "{{ route('job.show', ['']) }}" + "/" + job.id).html('Show').addClass(
                'bg-purple-600 bg-opacity-50 p-2 m-1 ring-4'));
            return obj

        }
    </script>
@endsection
