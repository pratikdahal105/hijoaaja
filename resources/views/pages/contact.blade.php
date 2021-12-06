@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row pt-5">
            <h5>Lets Get in Touch!</h5>
            <div class="col-md-8 col-lg-8 col-xl-8">
                @include('layouts.message')
                <form class="form" action="{{route('contact')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="check" />
{{--                    <!-- Name input-->--}}
{{--                    <div class="form-floating mb-3">--}}
{{--                        <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." required />--}}
{{--                        <label for="name">Full Name</label>--}}
{{--                    </div>--}}
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" required />
                        <label for="email">Email</label>
                    </div>
{{--                    <!-- Phone number input-->--}}
{{--                    <div class="form-floating mb-3">--}}
{{--                        <input class="form-control" id="phone" name="phone" type="tel" placeholder="(123) 456-7890" required />--}}
{{--                        <label for="phone">Contact</label>--}}
{{--                    </div>--}}
                    <!-- Subject input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="subject" name="subject" type="text" placeholder="Subject" required />
                        <label for="subject">Subject</label>
                    </div>
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="message" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem" required></textarea>
                        <label for="message">Message</label>
                    </div>
                    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Send <i class="fa fa-paper-plane"></i></button></div>
                </form>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4">
                <p>Contact Details:</p>
            </div>
        </div>
    </div>

@endsection
