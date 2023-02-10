@extends('admin.layouts.master')

@section('title')
Company Edit
@endsection


@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Company Edit Section</h3>
        <div class="box-tools pull-right">
            <span class="btn btn-box-tool">
                <span class="pull-right"><a href="{{ url('/controlpanel/admin/company/manage') }}"
                        class="label bg-blue color-palette p__8 f__size__13">Back To Company Page <i
                            class="fa fa-mail-reply"></i></a></span>
            </span>
        </div>
    </div>
    <div class="box-body">
        <form action="{{ url('/controlpanel/admin/company/edit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-4">
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="id" value="{{ $company->id }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4">
                    <div class="form-group {{ $errors->has('logo') ? ' has-error':'' }}">
                        <img src="{{ asset($company->logo) }}" alt="" class="image__resize">
                        <input type="file" name="logo" class="file" value="{{ $company->logo }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                            <input type="text" class="form-control" disabled
                                placeholder="Upload Image (Only-jpeg, png)">
                            <span class="input-group-btn">
                                <button class="browse btn btn-success" type="button"><i
                                        class="glyphicon glyphicon-search"></i>
                                    Browse</button>
                            </span>

                        </div>
                    </div>

                    <div class="{{ $errors->has('logo') ? ' has-error':'' }}">
                        @if ($errors->has('logo'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('logo') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('company_name') ? ' has-error':'' }}">
                                <input type="text"
                                    class="form-control {{ $errors->has('company_name') ? ' has-error':'' }} "
                                    id="company_name" name="company_name" value="{{ $company->company_name }}"
                                    placeholder="Company name">
                                <span class="fa fa-building form-control-feedback"></span>
                                @if ($errors->has('company_name'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('company_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('address') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('address') ? ' has-error':'' }} "
                                    id="address" name="address" value="{{ $company->address }}" placeholder="Address">
                                <span class="fa fa-map-marker form-control-feedback"></span>
                                @if ($errors->has('address'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('email') ? ' has-error':'' }} "
                                    id="email" name="email" value="{{ $company->email }}" placeholder="Company Email">
                                <span class="fa fa-phone form-control-feedback"></span>
                                @if ($errors->has('email'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('phone') ? ' has-error':'' }}">
                                <input type="text" class="form-control {{ $errors->has('phone') ? ' has-error':'' }} "
                                    id="phone" name="phone" value="{{ $company->phone }}" placeholder="Contact Number">
                                <span class="fa fa-phone form-control-feedback"></span>
                                @if ($errors->has('phone'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group has-feedback {{ $errors->has('telephone') ? ' has-error':'' }}">
                                <input type="text"
                                    class="form-control {{ $errors->has('telephone') ? ' has-error':'' }} "
                                    id="telephone" name="telephone" value="{{ $company->telephone }}"
                                    placeholder="Telephone Number">
                                <span class="fa fa-phone form-control-feedback"></span>
                                @if ($errors->has('telephone'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('telephone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div
                                class="form-group has-feedback {{ $errors->has('copy_right_text') ? ' has-error':'' }}">
                                <input type="text"
                                    class="form-control {{ $errors->has('copy_right_text') ? ' has-error':'' }} "
                                    id="copy_right_text" name="copy_right_text" value="{{ $company->copy_right_text }}"
                                    placeholder="Copy right text">
                                <span class="fa fa-phone form-control-feedback"></span>
                                @if ($errors->has('copy_right_text'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('copy_right_text') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">

                        </div>
                        <div class="col-lg-12">

                        </div>
                    </div>

                </div>

                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('social_link_icon_1') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('social_link_icon_1') ? ' has-error':'' }} "
                                            id="social_link_icon_1" name="social_link_icon_1"
                                            value="{{ $company->social_link_icon_1 }}" placeholder="Icon 1">
                                        <span class="fa fa-plus-square-o form-control-feedback"></span>
                                        @if ($errors->has('social_link_icon_1'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('social_link_icon_1') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('social_link1') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('social_link1') ? ' has-error':'' }} "
                                            id="social_link1" name="social_link1" value="{{ $company->social_link1 }}"
                                            placeholder="Social Link 1">
                                        <span class="fa fa-link form-control-feedback"></span>
                                        @if ($errors->has('social_link1'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('social_link1') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('social_link_icon_2') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('social_link_icon_2') ? ' has-error':'' }} "
                                            id="social_link_icon_2" name="social_link_icon_2"
                                            value="{{ $company->social_link_icon_2 }}" placeholder="Icon 2">
                                        <span class="fa fa-plus-square-o form-control-feedback"></span>
                                        @if ($errors->has('social_link_icon_2'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('social_link_icon_2') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('social_link2') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('social_link2') ? ' has-error':'' }} "
                                            id="social_link2" name="social_link2" value="{{ $company->social_link2 }}"
                                            placeholder="Social Link 2">
                                        <span class="fa fa-link form-control-feedback"></span>
                                        @if ($errors->has('social_link2'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('social_link2') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('social_link_icon_3') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('social_link_icon_3') ? ' has-error':'' }} "
                                            id="social_link_icon_3" name="social_link_icon_3"
                                            value="{{ $company->social_link_icon_3 }}" placeholder="Icon 3">
                                        <span class="fa fa-plus-square-o form-control-feedback"></span>
                                        @if ($errors->has('social_link_icon_3'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('social_link_icon_3') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('social_link3') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('social_link3') ? ' has-error':'' }} "
                                            id="social_link3" name="social_link3" value="{{ $company->social_link3 }}"
                                            placeholder="Social Link 3">
                                        <span class="fa fa-link form-control-feedback"></span>
                                        @if ($errors->has('social_link3'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('social_link3') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('social_link_icon_4') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('social_link_icon_4') ? ' has-error':'' }} "
                                            id="social_link_icon_4" name="social_link_icon_4"
                                            value="{{ $company->social_link_icon_4 }}" placeholder="Icon 4">
                                        <span class="fa fa-plus-square-o form-control-feedback"></span>
                                        @if ($errors->has('social_link_icon_4'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('social_link_icon_4') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('social_link4') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('social_link4') ? ' has-error':'' }} "
                                            id="social_link4" name="social_link4" value="{{ $company->social_link4 }}"
                                            placeholder="Social Link 4">
                                        <span class="fa fa-link form-control-feedback"></span>
                                        @if ($errors->has('social_link4'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('social_link4') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('social_link_icon_5') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('social_link_icon_5') ? ' has-error':'' }} "
                                            id="social_link_icon_5" name="social_link_icon_5"
                                            value="{{ $company->social_link_icon_5 }}" placeholder="Icon 5">
                                        <span class="fa fa-plus-square-o form-control-feedback"></span>
                                        @if ($errors->has('social_link_icon_5'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('social_link_icon_5') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div
                                        class="form-group has-feedback {{ $errors->has('social_link5') ? ' has-error':'' }}">
                                        <input type="text"
                                            class="form-control {{ $errors->has('social_link5') ? ' has-error':'' }} "
                                            id="social_link5" name="social_link5" value="{{ $company->social_link5 }}"
                                            placeholder="Social Link 5">
                                        <span class="fa fa-link form-control-feedback"></span>
                                        @if ($errors->has('social_link5'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('social_link5') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12"></div>
                        <div class="col-lg-12"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="form-group">Map Setting <a href="https://www.latlong.net/"
                            target="_blank">https://www.latlong.net/</a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group has-feedback {{ $errors->has('latitude') ? ' has-error':'' }}">
                        <input type="text" class="form-control {{ $errors->has('latitude') ? ' has-error':'' }} "
                            id="latitude" name="latitude" value="{{ $company->latitude }}" placeholder="Latitude">
                        <span class="fa fa-map-marker form-control-feedback"></span>
                        @if ($errors->has('latitude'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('latitude') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="form-group has-feedback {{ $errors->has('longitude') ? ' has-error':'' }}">
                        <input type="text" class="form-control {{ $errors->has('longitude') ? ' has-error':'' }} "
                            id="longitude" name="longitude" value="{{ $company->longitude }}" placeholder="Longitude">
                        <span class="fa fa-map-marker form-control-feedback"></span>
                        @if ($errors->has('longitude'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('longitude') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group has-feedback {{ $errors->has('map_content') ? ' has-error':'' }}">
                        <input type="text" class="form-control {{ $errors->has('map_content') ? ' has-error':'' }} "
                            id="map_content" name="map_content" value="{{ $company->map_content }}"
                            placeholder="Ma Content">
                        <span class="fa fa-text form-control-feedback"></span>
                        @if ($errors->has('map_content'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('map_content') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-3">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
