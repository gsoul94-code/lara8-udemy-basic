<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-gray-800 leading-tight">
            <div class="row">
                <div class="col-lg-6">
                    <a href="{{ route('post-categories') }}" class="btn btn-sm btn-primary"><i class="fa-fw fa-solid fa-arrow-left"></i> Back</a>
                </div>
                <div class="col-lg-6 text-2xl text-right">
                    <i class="fa-fw fa-solid fa-plus-circle"></i> {{ __('Add New Post Category') }}
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="card">
                <div class="row m-2 p-2">
                    <div class="col-lg-12">
                        <form action="{{ route('post-categories.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="category" class="form-label">Post Category</label>
                                <input type="text" class="form-control" id="category" name="category">
                                @error("category")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa-fw fa-solid fa-floppy-disk"></i> Submit</button>
                            <button type="reset" class="btn btn-secondary"><i class="fa-fw fa-solid fa-arrows-rotate"></i> Reset</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
