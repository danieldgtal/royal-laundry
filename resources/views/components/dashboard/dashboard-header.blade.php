@php
    $url = url()->current();
    $page = Str::ucfirst(basename(parse_url($url, PHP_URL_PATH)));
@endphp
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">
                            @if (Auth::user()->user_type == '0')
                                {{ 'User' }}
                            @elseif (Auth::user()->user_type == '1')
                                {{ 'Staff' }}
                            @else
                                {{ 'Admin' }}
                            @endif
                        </a>
                    </li>
                    <li class="breadcrumb-item active">{{ $page }}</li>
                </ol>
            </div>
            <h4 class="page-title">{{ $page }} </h4>
        </div>
    </div>
</div>
