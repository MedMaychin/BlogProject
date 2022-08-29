@extends('dashboard.layouts.layout')


@section('body')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">خانه</li>
        <li class="breadcrumb-item"><a href="#">مدیریت</a>
        </li>
        <li class="breadcrumb-item active">داشبرد</li>

        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <a class="btn btn-secondary" href="#"><i class="icon-speech"></i></a>
                <a class="btn btn-secondary" href="./"><i class="icon-graph"></i> &nbsp;داشبرد</a>
                <a class="btn btn-secondary" href="#"><i class="icon-settings"></i> &nbsp;تنظیمات</a>
            </div>
        </li>
    </ol>


    {{-- main --}}

    <div class="container-fluid">
        <div class="animated fadeIn">
            <form action="{{ Route('dashboard.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('words.settings') }}</strong>
                        </div>
                        <div class="card-block">
                            <form action="" method="post">
                                <div class="form-group col-md-6">
                                    <label>{{ __('words.logo') }}</label>
                                    <img src="{{asset($setting->logo)}}" alt="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('words.favicon') }}</label>
                                    <img src="{{asset($setting->favicon)}}" alt="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('words.logo') }}</label>
                                    <input type="file" id="" name="logo" class="form-control"
                                        placeholder="Enter File..">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('words.favicon') }}</label>
                                    <input type="file" id="" name="logo" class="form-control"
                                        placeholder="{{ __('words.favicon') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('words.facebook') }}</label>
                                    <input type="text" id="" name="facebook" class="form-control"
                                        placeholder="{{ __('words.facebook') }}" value="{{ $setting->facebook }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('words.instagram') }}</label>
                                    <input type="text" id="" name="instagram" class="form-control"
                                        placeholder="{{ __('words.instagram') }}" value="{{ $setting->instagram }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>{{ __('words.phone') }}</label>
                                    <input type="text" id="" name="phone" class="form-control"
                                        placeholder="{{ __('words.phone') }}" value="{{ $setting->phone }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>{{ __('words.email') }}</label>
                                    <input type="text" id="" name="email" class="form-control"
                                        placeholder="{{ __('words.phone') }}" value="{{ $setting->email }}">
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('words.translation') }}</strong>
                        </div>
                        <div class="card-block">

                            <ol class="nav nav-tabs" id="myTab" role="tablsit">

                                @foreach (config('app.languages') as $key => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($loop->index == 0) active @endif"
                                            href="#{{ $key }}" id="home-tab" data-toggle="tab" role="tab"
                                            aria-controls="home" aria-selected="true">
                                            {{ $lang }}
                                        </a>
                                    </li>
                                @endforeach


                            </ol>

                            <div class="tab-content" id="myTabContent">

                                @foreach (config('app.languages') as $key => $lang)
                                    <div class="tab-pane fade 
                                        @if ($loop->index == 0) show active in @endif"
                                        id="{{ $key }}" role="tabpanel" aria-labelledby="home-tab">

                                        <div class="form-group mt-3 col-md-12">
                                            <label>
                                                {{ __('words.title') }} - {{ $lang }}
                                            </label>
                                            <input class="form-control" type="text" name="{{ $key }}[title]"
                                                placeholder="{{ __('words.title') }} "
                                                value="{{ $setting->translate($key)->title }}">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>
                                                {{ __('words.content') }}
                                            </label>
                                            <textarea name="{{ $key }}[content]" id="" cols="30" rows="10" class="form-control">
                                                {{ $setting->translate($key)->content }}
                                            </textarea>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>
                                                {{ __('words.address') }}
                                            </label>
                                            <input class="form-control" type="text"
                                                value="{{ $setting->translate($key)->address }}"
                                                name="{{ $key }}[address]" id="">
                                        </div>
                                    </div>
                                @endforeach

                            </div>


                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                            Submit</button>
                        <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.conainer-fluid -->
@endsection
