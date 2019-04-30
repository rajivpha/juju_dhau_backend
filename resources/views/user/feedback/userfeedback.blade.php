
@extends('user.includes.userlayout')

@section('content')
    <section class="site-section pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h1>Send Feedback</h1>
                <div class="card-body">
                    @if(session()->has('success_message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="icon-remove"></i>
                            </button>
                            {{session()->get('success_message')}}
                        </div>
                    @endif



                    <form action="{{route('user.feedback.submit')}}" method="POST">
                        @csrf
                        <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text"  name="subject" placeholder="Subject" class="col-xs-10 col-sm-12" />
                                    </div>
                                </div>

                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Send Message" class="btn btn-primary btn-lg">
                                    </div>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>

    @endsection