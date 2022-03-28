@extends('web.common.main')

@section('title', 'Events | NIEDSWET')

@section('customHeader')
<style>
    .header {
        background: url('/web_assets/images/header/team.png');
    }

</style>
@endsection

@section('main')
    {{-- Header --}}
    <section class="header">
        <div class="overlay">
            <div class="path">
                <p><a href="{{route('site.home')}}">Home</a> > Events</p>
            </div>
            <div class="title">
                <h1 class="header_title">Events</h1>
            </div>
        </div>
    </section>
@endsection

@section('customJS')
@endsection