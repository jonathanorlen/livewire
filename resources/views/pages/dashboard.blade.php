@extends('layouts.app')
@section('title', 'laravel')
@section('content')
<div class="section-body">
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>About</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item active">About</div>
                </div>
            </div>
            <div class="section-body">
                <div class="col-12 col-md-12 col-lg-12">
                    <livewire:contact-index>

                    </livewire:contact-index>
                </div>
            </div>
        </section>
    </div>
</div>
</div>

@endsection

@push('page-scripts')

@endpush
