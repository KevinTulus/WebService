<div class="img bg-wrap text-center py-4" style="background-image: url({{ asset('/') }}assets/picture/bg_1.jpg);">
    <div class="user-logo">
        <div class="img" style="background-image: url({{ asset('/') }}images/angkot1.png); background-size:90px;"></div>
        @if (auth()->user()->is_admin)
            <h3>Admin Angkot Api Dashboard</h3>
        @else
            <h3>Angkot Api Dashboard</h3>
        @endif
    </div>
  </div>
