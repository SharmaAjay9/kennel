@extends('layouts.app')

@section('meta_title'){{ $page2->meta_title }}@stop

@section('meta_description'){{ $page2->meta_description }}@stop

@section('meta_keywords'){{ $page2->tags }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $page2->meta_title }}">
    <meta itemprop="description" content="{{ $page2->meta_description }}">
    <meta itemprop="image" content="{{ uploaded_asset($page2->meta_img) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $page2->meta_title }}">
    <meta name="twitter:description" content="{{ $page2->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ uploaded_asset($page2->meta_img) }}">

    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $page2->meta_title }}" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:image" content="{{ uploaded_asset($page2->meta_img) }}" />
    <meta property="og:description" content="{{ $page2->meta_description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
   
@endsection

@section('content')
<section class="mb-4"  style="margin-top:2rem;">
	<div class="container">
        <div class="p-4 bg-white rounded shadow-sm overflow-hidden mw-100 text-left">
		    {!! $page2->content !!}
        </div>
	</div>
</section>
@endsection
