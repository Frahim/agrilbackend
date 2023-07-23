@extends ('layouts.admin')

@section('content')
<div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="me-md-3 me-xl-5">
                    @if(session('message'))
                    <h2  class="alert alert-success" role="alert">{{ (session('message') )}},</h2>
                    @endif
                    
                  </div>
                  {{-- <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                    <p class="text-primary mb-0 hover-cursor">Analytics</p>
                  </div> --}}
                </div>
                
              </div>
            </div>
          </div>
@endsection