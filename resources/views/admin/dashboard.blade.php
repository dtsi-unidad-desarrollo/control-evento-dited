@extends('layouts.app')

@section('title', 'Registrar inscripción')


@section('content')
    @if (session('mensaje'))
        @include('partials.alert')
    @endif
    <div id="alert"></div>

    <div class="container">
        <section class="section register d-flex flex-column align-items-center justify-content-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class=" col-sm-12 d-flex flex-column align-items-center justify-content-center">

                     
                                <h1>Bienvenido al sistema de control de eventos</h1>
                                <br>
                                <br>
                                <img src="{{ asset('assets/img/mundoo.gif') }}  " alt="logo" id="logo">

                           
                      

                    </div>
                </div>
            </div>

        </section>
    @endsection
