 @extends('layouts.Adminapp')

 @section('content')
     <main class="flex-grow-1 p-4 bg-light">
         <div class="container-fluid">
             <div class="mb-4">
                 <h2 class="fw-bold mb-1">
                     Edit Home Page
                 </h2>
                 <p class="text-muted mb-0">
                     Manage the content displayed on the public home page.
                 </p>
             </div>


             @if (session('success'))
                 <div class="alert alert-success alert-dismissible fade show">
                     {{ session('success') }}

                     <button type="button" class="btn-close" data-bs-dismiss="alert">
                     </button>
                 </div>
             @endif


             <div class="card border-0 shadow-sm">
                 <div class="card-body p-4">
                     <form action="{{ route('Admin.homeupdate') }}" method="POST">
                         @csrf
                         @method('PUT')


                         <h5 class="fw-bold mb-4">
                             Hero Section
                         </h5>


                         <div class="mb-3">
                             <label class="form-label fw-semibold">
                                 Badge
                             </label>

                             <input type="text" name="badge" class="form-control"
                                 value="{{ old('badge', $home->badge) }}">

                             @error('badge')
                                 <div class="text-danger">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>


                         <div class="row">
                             <div class="col-md-6 mb-3">
                                 <label class="form-label fw-semibold">
                                     Hero Title
                                 </label>

                                 <input type="text" name="hero_title" class="form-control"
                                     value="{{ old('hero_title', $home->hero_title) }}">
                             </div>


                             <div class="col-md-6 mb-3">
                                 <label class="form-label fw-semibold">
                                     Hero Subtitle
                                 </label>
                                 <input type="text" name="hero_subtitle" class="form-control"
                                     value="{{ old('hero_subtitle', $home->hero_subtitle) }}">
                             </div>
                         </div>


                         <div class="mb-4">
                             <label class="form-label fw-semibold">
                                 Hero Description
                             </label>
                             <textarea name="hero_description" rows="4" class="form-control">{{ old('hero_description', $home->hero_description) }}</textarea>
                         </div>



                         <hr>


                         <h5 class="fw-bold my-4">
                             Feature Cards
                         </h5>


                         <div class="row">
                             <div class="col-md-6 mb-3">
                                 <label class="form-label fw-semibold">
                                     Feature 1
                                 </label>
                                 <input type="text" name="feature_1_title" class="form-control"
                                     value="{{ old('feature_1_title', $home->feature_1_title) }}">
                             </div>


                             <div class="col-md-6 mb-3">
                                 <label class="form-label fw-semibold">
                                     Feature 2
                                 </label>

                                 <input type="text" name="feature_2_title" class="form-control"
                                     value="{{ old('feature_2_title', $home->feature_2_title) }}">
                             </div>



                             <div class="col-md-6 mb-3">
                                 <label class="form-label fw-semibold">
                                     Feature 3
                                 </label>

                                 <input type="text" name="feature_3_title" class="form-control"
                                     value="{{ old('feature_3_title', $home->feature_3_title) }}">

                             </div>


                             <div class="col-md-6 mb-3">
                                 <label class="form-label fw-semibold">
                                     Feature 4
                                 </label>
                                 <input type="text" name="feature_4_title" class="form-control"
                                     value="{{ old('feature_4_title', $home->feature_4_title) }}">
                             </div>
                         </div>


                         <hr>


                         <h5 class="fw-bold my-4">
                             How It Works
                         </h5>


                         <div class="mb-4">
                             <label class="form-label fw-semibold">
                                 Section Title
                             </label>
                             <input type="text" name="process_title" class="form-control"
                                 value="{{ old('process_title', $home->process_title) }}">
                         </div>


                         <div class="row">
                             <div class="col-md-6 mb-4">
                                 <div class="card bg-light border-0">
                                     <div class="card-body">
                                         <h6 class="fw-bold">
                                             Step 1
                                         </h6>

                                         <input type="text" name="process_1_title" class="form-control mb-2"
                                             value="{{ old('process_1_title', $home->process_1_title) }}">

                                         <textarea name="process_1_description" class="form-control" rows="3">{{ old('process_1_description', $home->process_1_description) }}</textarea>
                                     </div>
                                 </div>
                             </div>


                             <div class="col-md-6 mb-4">
                                 <div class="card bg-light border-0">
                                     <div class="card-body">
                                         <h6 class="fw-bold">
                                             Step 2
                                         </h6>
                                         <input type="text" name="process_2_title" class="form-control mb-2"
                                             value="{{ old('process_2_title', $home->process_2_title) }}">

                                         <textarea name="process_2_description" class="form-control" rows="3">{{ old('process_2_description', $home->process_2_description) }}</textarea>

                                     </div>
                                 </div>
                             </div>


                             <div class="col-md-6 mb-4">
                                 <div class="card bg-light border-0">
                                     <div class="card-body">
                                         <h6 class="fw-bold">
                                             Step 3
                                         </h6>

                                         <input type="text" name="process_3_title" class="form-control mb-2"
                                             value="{{ old('process_3_title', $home->process_3_title) }}">

                                         <textarea name="process_3_description" class="form-control" rows="3">{{ old('process_3_description', $home->process_3_description) }}</textarea>

                                     </div>
                                 </div>
                             </div>


                             <div class="col-md-6 mb-4">
                                 <div class="card bg-light border-0">
                                     <div class="card-body">
                                         <h6 class="fw-bold">
                                             Step 4
                                         </h6>

                                         <input type="text" name="process_4_title" class="form-control mb-2"
                                             value="{{ old('process_4_title', $home->process_4_title) }}">

                                         <textarea name="process_4_description" class="form-control" rows="3">{{ old('process_4_description', $home->process_4_description) }}</textarea>

                                     </div>
                                 </div>
                             </div>
                         </div>


                         <div class="d-flex gap-2">

                             <button type="submit" class="btn btn-primary">
                                 <i class="bi bi-check-circle me-1"></i>
                                 Update Home Page
                             </button>


                             <a href="{{ route('home') }}" target="_blank" class="btn btn-secondary">
                                 <i class="bi bi-eye me-1"></i>
                                 View Home Page
                             </a>
                         </div>
                     </form>

                 </div>

             </div>

         </div>

     </main>
 @endsection
