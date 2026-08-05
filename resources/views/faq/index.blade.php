@extends('layouts.app')
@section('title', 'Faq')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/faq.css') }}?v=20260805-1">
@endpush

@section('content')
    <section class="faq-hero" style="background-image: url('{{ $bannerImage }}');">
        <div class="faq-hero__overlay"></div>
        <div class="faq-hero__content">
            <h1>Faqs</h1>
            <div class="faq-hero__breadcrumb">
                <a href="{{ url('/') }}">HOME</a>
                <span aria-hidden="true">//</span>
                <span aria-current="page">FAQS</span>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <div class="faq-container">
            <div class="faq-intro">
                <span class="faq-intro__eyebrow">HELP CENTER</span>
                <h2>Everything You Need to Know</h2>
                <p>Find answers to common questions about XTechMart, website information, content accessibility, privacy, and how visitors can use the platform for technology-related resources.</p>
                <div class="faq-intro__summary">
                    <strong>{{ count($faqs) }}</strong>
                    <span>Common questions answered in one place</span>
                </div>
            </div>

            <div class="faq-accordion" id="faqAccordion">
                @foreach ($faqs as $faq)
                    <div class="faq-item">
                        <button class="faq-question {{ $loop->first ? '' : 'collapsed' }}" type="button" data-faq-target="#faq-{{ $loop->iteration }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="faq-{{ $loop->iteration }}">
                            <span class="faq-question__text"><strong>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</strong> {{ $faq['question'] }}</span>
                            <span class="faq-question__icon" aria-hidden="true"></span>
                        </button>
                        <div id="faq-{{ $loop->iteration }}" class="collapse {{ $loop->first ? 'show' : '' }}">
                            <div class="faq-answer">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.faq-question').forEach(function (button) {
                button.addEventListener('click', function () {
                    var target = document.querySelector(button.getAttribute('data-faq-target'));

                    if (!target) {
                        return;
                    }

                    var isOpen = target.classList.contains('show');

                    target.classList.toggle('show', !isOpen);
                    button.classList.toggle('collapsed', isOpen);
                    button.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
                });
            });
        });
    </script>
@endpush
