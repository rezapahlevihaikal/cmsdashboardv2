@extends('layouts.app')

@section('content')
@include('layouts.headers.header')
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="card-body">
                <form class="" action="{{ route('ads_slot.update', $dataAdsSlot->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col">
                            <label for="demo_overview_minimal">Website</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="website_id" value="" selected="">
                                @foreach ($dataWebsite as $item)
                                    <option value="{{ $item->id }}" {{$dataAdsSlot->website_id == $item->id  ? 'selected' : ''}}>{{ $item->website_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Mobile Top</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="mob_top" required>
                                <option value="">MOBILE TOP</option>
                                @foreach ($dataPartner as $item)
                                  <option value="{{ $item->id }}" {{$dataAdsSlot->mob_top == $item->id  ? 'selected' : ''}}>{{ $item->name}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="formGroupExampleInput2">Mobile in Article 1</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="mob_in_article1" required>
                                <option value="">MOBILE IN ARTICLE 1</option>
                                @foreach ($dataPartner as $item)
                                  <option value="{{ $item->id }}" {{$dataAdsSlot->mob_in_article1 == $item->id  ? 'selected' : ''}}>{{ $item->name}}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Mobile in Article 2</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="mob_in_article2" required>
                                <option value="">MOBILE IN ARTICLE 2</option>
                                @foreach ($dataPartner as $item)
                                  <option value="{{ $item->id }}" {{$dataAdsSlot->mob_in_article2 == $item->id  ? 'selected' : ''}}>{{ $item->name}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="formGroupExampleInput2">Mobile in Article 3</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="mob_in_article3" required>
                                <option value="">MOBILE IN ARTICLE 3</option>
                                @foreach ($dataPartner as $item)
                                  <option value="{{ $item->id }}" {{$dataAdsSlot->mob_in_article3 == $item->id  ? 'selected' : ''}}>{{ $item->name}}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Mobile Sticky Bottom</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="mob_sticky_bottom" required>
                                <option value="">MOBILE STICKY BOTTOM</option>
                                @foreach ($dataPartner as $item)
                                  <option value="{{ $item->id }}" {{$dataAdsSlot->mob_sticky_bottom == $item->id  ? 'selected' : ''}}>{{ $item->name}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="formGroupExampleInput2">Mobile in Image Banner</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="mob_in_imagebanner" required>
                                <option value="">MOBILE IN IMAGE BANNER</option>
                                @foreach ($dataPartner as $item)
                                  <option value="{{ $item->id }}" {{$dataAdsSlot->mob_in_imagebanner == $item->id  ? 'selected' : ''}}>{{ $item->name}}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Mobile NativeAds</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="mob_nativead" required>
                                <option value="">MOBILE NATIVE ADS</option>
                                @foreach ($dataPartner as $item)
                                  <option value="{{ $item->id }}" {{$dataAdsSlot->mob_nativead == $item->id  ? 'selected' : ''}}>{{ $item->name}}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Mobile Video</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="mob_video" required>
                                <option value="">MOBILE VIDEO</option>
                                @foreach ($dataPartner as $item)
                                  <option value="{{ $item->id }}" {{$dataAdsSlot->mob_video == $item->id  ? 'selected' : ''}}>{{ $item->name}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success" onclick="window.location='{{url('/ads_slot')}}'" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Update Data</button>
                  </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection