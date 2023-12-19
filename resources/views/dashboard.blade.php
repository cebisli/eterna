<x-app-layout>
    <h2 style="text-align: center; color:blue;" class="p-2">Mail Gönderme Uygulaması</h2>
    <div class="container mt-3">

        <div class="row">
            <div class="col-md-4">
                <div class="nav flex-column nav-pills me-3" aria-orientation="vertical">
                    <a class="btn btn-info text-white mt-2" href="{{ route('aboneler') }}">Aboneler</a>
                    <a class="btn btn-info text-white mt-2" href="{{ route('gonderiler') }}">Gönderiler</a>
                    <a class="btn btn-info text-white mt-2" href="{{ route('postalar') }}">Gönderilen Postalar</a>
                    <a class="btn btn-info text-white mt-2" href="{{ route('logout') }}">Çıkış Yap</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card p-4" style="height: 100%;">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @elseif(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    <h4 style="text-align: center; color:blue;" class="p-2">@yield('baslik')</h4>

                    @yield('icerik')
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
