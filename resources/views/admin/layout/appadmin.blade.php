<!DOCTYPE html>
<html lang="en">

    @include('admin.layout.top')
    @include('admin.layout.header')
    @include('admin.layout.menu')

    <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                @yield('title') 
              </h3>
              <!-- <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav> -->
            </div>
            
            @yield('content') 

    </div>

    @include('admin.layout.footer')

</html>