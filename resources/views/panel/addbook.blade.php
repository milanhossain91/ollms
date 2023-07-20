@extends('layout.index')

@section('custom_top_script')
@stop

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>Add Books</h3>
        </div>
        <div class="module-body">
            <form class="form-horizontal row-fluid" id="formvalidation" method="post" enctype="multipart/form-data">
                @csrf <!-- Add CSRF token field -->
                <div class="control-group">
                    <label class="control-label">Title Of Book</label>
                    <div class="controls">
                        <input type="text" id="title" data-form-field="title" placeholder="Enter the title of the book here..." class="span8">
                        <input type="hidden"  data-form-field="token"  value="{{ csrf_token() }}">
                        <input type="hidden"  data-form-field="auth_user"  value="{{ auth()->user()->id }}">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Author Name</label>
                    <div class="controls">
                        <input type="text" id="author" data-form-field="author" placeholder="Enter the name of author for the book here..." class="span8">
                    </div>
                    @error('author')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Description of Book</label>
                    <div class="controls">
                        <textarea class="span8" id="description" data-form-field="description" rows="5" placeholder="Enter few lines about the book here"></textarea>
                    </div>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Category</label>
                    <div class="controls">
                        <select tabindex="1" id="category" data-form-field="category" data-placeholder="Select category.." class="span8">
                            @foreach($categories_list as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="control-group">
                    <label class="control-label">Number of issues</label>
                    <div class="controls">
                        <input type="number" id="number" data-form-field="number" placeholder="How many issues are there?" class="span8">
                    </div>
                    @error('number')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="control-group">
                    <label class="control-label">Photo</label>
                    <div class="controls">
                        <input type="file" data-form-field="photo" id="photo" placeholder="Photo" value="">
                    </div>
                    <br>
                    @error('photo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="control-group">
                    <label class="control-label">Attachment</label>
                    <div class="controls">
                        <input data-form-field="attachment" type="file" id="attachment" placeholder="Attachment" value="">
                    </div>
                    <br>
                    @error('attachment')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Other form fields are kept unchanged -->

                <div class="control-group">
                    <div class="controls">
                        <button type="button" class="btn btn-inverse" id="addbooks">Add Books</button>
                    </div>
                </div>
            </form>
        </div>
    </div>    
</div>
@stop

@section('custom_bottom_script')
    <script type="text/javascript" src="{{ asset('static/custom/js/script.addbook.js') }}"></script>
@stop

