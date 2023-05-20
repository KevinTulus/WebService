<ul class="list-unstyled components mb-5">
        <li class="{{ ($title === "Profil") ? 'active' : '' }}">
          <a href="/adminprofile"><span class="fa fa-home mr-3"></span> Profil</a>
        </li>
        <li class="{{ ($title === "Angkot") ? 'active' : '' }}">
          <a href="/angkot"><span class="fa fa-gift mr-3"></span> Angkot</a>
        </li>
        <li class="{{ ($title === "Nama Jalan") ? 'active' : '' }}">
          <a href="/namajalan"><span class="fa fa-trophy mr-3"></span> Nama Jalan</a>
        </li>
        <li class="{{ ($title === "Lokasi") ? 'active' : '' }}">
          <a href="/lokasi"><span class="fa fa-cog mr-3"></span> Lokasi</a>
        </li>
        <li class="{{ ($title === "Rute") ? 'active' : '' }}">
          <a href="/rute"><span class="fa fa-support mr-3"></span> Rute</a>
        </li>
        <li class="{{ ($title === "Deskripsi") ? 'active' : '' }}">
          <a href="/deskripsi"><span class="fa fa-support mr-3"></span> Deskripsi</a>
        </li>
        <li>
          <a href="#"><span class="fa-solid fa-right-from-bracket mr-3"></span> Log Out</a>
        </li>
      </ul>