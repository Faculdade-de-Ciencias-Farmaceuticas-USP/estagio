@extends('laravel-usp-theme::master')

{{-- Blocos do laravel-usp-theme --}}
{{-- Ative ou desative cada bloco --}}

{{-- Target:card-header; class:card-header-sticky --}}
@include('laravel-usp-theme::blocos.sticky')

{{-- Target: button, a; class: btn-spinner, spinner --}}
@include('laravel-usp-theme::blocos.spinner')

{{-- Target: table; class: datatable-simples --}}
@include('laravel-usp-theme::blocos.datatable-simples')

{{-- Fim de blocos do laravel-usp-theme --}}

@section('title')
  @parent 
@endsection

@section('styles')
  @parent
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <style>
    /*seus estilos*/
  </style>
@endsection

@section('javascripts_bottom')
  @parent
  <script>
    // Seu código .js
  </script>
@endsection