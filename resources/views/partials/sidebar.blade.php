<ul class="list-unstyled components mb-5">
    @if (auth()->user()->is_admin)
    <li class="{{ ($title === "Angkot") ? 'active' : '' }}">
        <a href="{{ route('angkot.index') }}"><span class="fa fa-gift mr-3"></span> Angkot</a>
    </li>
    <li class="{{ ($title === "Nama Jalan") ? 'active' : '' }}">
        <a href="{{ route('jalan.index') }}"><span class="fa fa-trophy mr-3"></span> Nama Jalan</a>
    </li>
    <li class="{{ ($title === "Lokasi") ? 'active' : '' }}">
        <a href="{{ route('lokasi.index') }}"><span class="fa fa-cog mr-3"></span> Lokasi</a>
    </li>
    <li class="{{ ($title === "Rute") ? 'active' : '' }}">
        <a href="{{ route('rute.index') }}"><span class="fa fa-support mr-3"></span> Rute</a>
    </li>
    <li class="{{ ($title === "Deskripsi") ? 'active' : '' }}">
        <a href="{{ route('deskripsi.index') }}"><span class="fa fa-support mr-3"></span> Estimasi Harga</a>
    </li>
    <li class="{{ ($title === "Profil") ? 'active' : '' }}">
        <a href="{{ route('adminprofile.index') }}"><span class="fa fa-home mr-3"></span> Profil</a>
    </li>
    <li>
        <a href="{{ route('logout') }}"><span class="fa-solid fa-right-from-bracket mr-3"></span> Log Out</a>
    </li>
    @else
    <li class="{{ ($title === "Token") ? 'active' : '' }}">
        <a href="{{ route('user.token.index') }}"><span class="fa fa-gift mr-3"></span> Token</a>
    </li>
    <li class="{{ ($title === "Profil") ? 'active' : '' }}">
        <a href="{{ route('user.profile.index') }}"><span class="fa fa-home mr-3"></span> Profil</a>
    </li>
    <li>
    <li>
        <a href="{{ route('logout') }}"><span class="fa-solid fa-right-from-bracket mr-3"></span> Log Out</a>
    </li>
    @endif
</ul>