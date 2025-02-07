@extends('frontend.layouts.master')

@section('content')

<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="row g-0">
            <!-- Book Cover -->
            <div class="col-md-4 d-flex align-items-center justify-content-center p-4" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                <img src="{{ $book->cover_image ?? 'https://via.placeholder.com/300x400' }}"
                     alt="{{ $book->title }}"
                     class="img-fluid rounded shadow-lg" style="max-height: 400px;">
            </div>

            <!-- Book Details -->
            <div class="col-md-8 p-5 bg-white">
                <h1 class="fw-bold text-dark">{{ $book->title }}</h1>
                <p class="text-muted fs-5">by <strong>{{ $book->author }}</strong></p>
               <div class="d-flex gap-2">
                <p class="text-muted">{{ $book->bookCategory->name }}</p>
                <p class="text-muted">{{ $book->semester->title }}</p>
               </div>
                <span class="badge bg-gradient-primary fs-6 px-3 py-2">{{ $book->bookCategory->name }}</span>

                <p class="mt-4 text-secondary fs-5">{{ $book->description }}</p>

                <!-- Action Buttons -->
                <div class="mt-4 d-flex">
                    <a href="{{ $book->file }}" target="_blank" class="btn btn-dark btn-lg me-3 d-flex align-items-center">
                        <i class="fas fa-file-pdf me-2"></i> View PDF
                    </a>
                    <a href="{{ $book->file }}" download class="btn btn-primary btn-lg d-flex align-items-center">
                        <i class="fas fa-download me-2"></i> Download PDF
                    </a>
                </div>
            </div>
        </div>

        <!-- PDF Viewer Section -->
        {{-- <div class="p-5 bg-light rounded-bottom">
            <h4 class="text-center text-secondary fw-bold mb-4">📖 Book Preview</h4>
            <div class="d-flex justify-content-center">
                <iframe class="rounded shadow border"
                        height="600" width="80%"
                        src="{{ $book->file }}"
                        frameborder="0">
                </iframe>
            </div>
        </div> --}}
    </div>
</div>

@endsection
