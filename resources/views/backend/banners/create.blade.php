@extends('backend.layouts.master')



@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Создание баннеров</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Баннеры</li>
                            <li class="breadcrumb-item active">Создание баннеров</li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form action="{{route('banner.store')}}" method="post">
                                @csrf
                                <div class="row clearfix">

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Название <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Название" name="title" value="{{old('title')}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Фото</label>

                                            <div class="input-group">
                                           <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Выбрать
                                                </a>
                                           </span>
                                                <input id="thumbnail" class="form-control" type="text" name="photo">
                                            </div>

                                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Описание</label>
                                            <textarea id="description" class="form-control" placeholder="Описание" name="description"> {{old('description')}} </textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="">Тип</label>
                                        <select name="condition" class="form-control show-tick">
                                            <option value="">-- Тип --</option>
                                            <option value="banner" {{old('condition'=='banner' ? 'selected': '')}}>Баннер</option>
                                            <option value="promo" {{old('condition'=='promo' ? 'selected': '')}}>Реклама</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <label for="">Статус</label>
                                        <select name="status" class="form-control show-tick">
                                            <option value="">-- Статус --</option>
                                            <option value="active" {{old('status'=='active' ? 'selected': '')}}>Активнен</option>
                                            <option value="inactive" {{old('status'=='inactive' ? 'selected': '')}}>Неактивен</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                    <button type="submit" class="btn btn-outline-secondary">Отменить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script !src="">
        $('#lfm').filemanager('image');
    </script>

    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                  // set focus to editable area after initializing summernote
            });
        });
    </script>
@endsection
