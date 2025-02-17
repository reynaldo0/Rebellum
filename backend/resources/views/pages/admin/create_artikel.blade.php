@extends('layouts.admin')

@section('title', 'Tambah Artikel')

@section('content')
    <div class="bg-white w-full h-full">
        <form id="formCreate" method="POST" action="{{ route('articles.store') }}" class="p-4 md:p-5"
            enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="image">Thumbnail</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="image" name="image" type="file" accept="image/*">
                </div>
                <div class="col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                    <input type="text" name="title" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Judul artikel" required="">
                </div>
                <div class="col-span-2">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <div id="summernote"></div>
                    <textarea name="description" id="description" class="hidden"></textarea>
                </div>
            </div>

            <div class="flex w-full justify-end">
                <button type="button" id="btnSubmit"
                    class="text-white  justify-end items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Tambah
                </button>
            </div>

        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                placeholder: 'Input deskripsi artikel',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            const form = document.getElementById('formCreate');
            const btn = document.getElementById('btnSubmit');

            console.log(form)

            btn.onclick = function () {
                document.getElementById('description').value = $('#summernote').summernote('code');

                if (form instanceof HTMLFormElement) {
                    form.submit();
                } else {
                    console.error('formCreate bukan elemen form:', form);
                }
            };
        });
    </script>
@endsection
