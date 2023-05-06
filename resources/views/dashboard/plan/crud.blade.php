@extends('layouts.dashboard.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Добавить категорию</h5>
                </div>
                <form action="{{ route('plan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Фото</label>
                                    <div class="col-12 text-center">
                                        <i data-feather="loader" style="height: 100px; width: 100px"></i>
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="photo" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Все категории</h5>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Фото 1</th>
                            <th scope="col">Фото 2</th>
                            <th scope="col">Название</th>
                            <th scope="col">Описание</th>
                            <th scope="col" class="text-center">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key=>$category)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td><img src="{{ $category->photo1 }}" alt="" style="height: 100px; width: 100px"></td>
                                <td><img src="{{ $category->photo2 }}" alt="" style="height: 100px; width: 100px"></td>
                                <td>{{ $category->name_ru }}</td>
                                <td>{{ $category->description_ru }}</td>
                                <td class="text-center">
                                    <button class="btn btn-xs btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $category->id }}Edit"><i class="bx bx-pencil"></i></button>
                                    <div class="modal fade" id="exampleModalCenter{{ $category->id }}Edit" tabindex="-1" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 50vw">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Изменить</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('dashboard.categories.update', $category) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field('put') }}
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Фото 1</label>
                                                                        <div class="col-12 text-center">

                                                                            <img style="height: 100px; width: 100px" src="{{ $category->photo1 }}">
                                                                        </div>
                                                                        <input class="form-control mt-1" id="exampleFormControlInput1" type="file" name="photo1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Фото 2</label>
                                                                        <div class="col-12 text-center">
                                                                            <img style="height: 100px; width: 100px" src="{{ $category->photo2 }}">
                                                                        </div>
                                                                        <input class="form-control mt-1" id="exampleFormControlInput1" type="file" name="photo2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Название RU</label>
                                                                        <input class="form-control" id="exampleFormControlInput1" type="text" name="name_ru" value="{{ $category->name_ru }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Название UZ</label>
                                                                        <input class="form-control" id="exampleFormControlInput1" type="text" name="name_uz" value="{{ $category->name_uz }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Название EN</label>
                                                                        <input class="form-control" id="exampleFormControlInput1" type="text" name="name_en" value="{{ $category->name_en }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Описание RU</label>
                                                                        <textarea class="form-control" name="description_ru" id="" cols="30" rows="5">{{ $category->description_ru }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Описание UZ</label>
                                                                        <textarea class="form-control" name="description_uz" id="" cols="30" rows="5">{{ $category->description_uz }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Описание EN</label>
                                                                        <textarea class="form-control" name="description_en" id="" cols="30" rows="5">{{ $category->description_en }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer text-end">
                                                            <button class="btn btn-primary" type="submit">Изменить</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $category->id }}"><i class="bx bx-trash"></i></button>
                                    <div class="modal fade" id="exampleModalCenter{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Удалить?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post">
                                                        @csrf
                                                        {{ method_field('delete') }}
                                                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Да</button>
                                                    </form>
                                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Нет</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
    
@endsection
