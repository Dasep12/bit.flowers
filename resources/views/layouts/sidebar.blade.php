<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

$sidebar = DB::table('vw_menu')
  ->select('*')
  ->where('role_id', session()->get('role_id'))
  ->where('user_id', session()->get('user_id'))
  ->get();

$url = request()->segment(1);
$active = "";
$actives = "";
$show = "";

?>

<!-- partial:../../partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="profile-image">
          <img src="{{ asset('assets/images/faces/face5.jpg')}}" alt="image" />
        </div>
        <div class="profile-name">
          <p class="name">
            Welcome {{ ucwords(strtolower(session()->get("fullname"))) }}
          </p>
          <p class="designation">
            {{ ucwords(strtolower(session()->get("roleName"))) }}
          </p>
        </div>
      </div>
    </li>
    <?php
    foreach ($sidebar as $sd) : ?>

      @if($sd->MenuLevel == 0)
      <li class="nav-item <?= $sd->MenuUrl == $url  ? 'active' : ''  ?>"">
        <a class=" nav-link" href="{{ url($sd->MenuUrl) }}">
        <i class="{{ $sd->MenuIcon }} menu-icon"></i>
        <span class="menu-title">{{ $sd->MenuName }}</span>
        </a>
      </li>
      @endif
      <?php
      $cekUrl = DB::table('vw_menu')
        ->where('MenuUrl', $url)
        ->where('ParentMenu', $sd->menu_id)
        ->where('MenuLevel', 2)
        ->where('role_id', session()->get('role_id'))
        ->where('user_id', session()->get('user_id'))
        ->select('*')
        ->get();
      $active = $cekUrl->count() > 0 ? 'active' : '';
      $show = $cekUrl->count() > 0 ? 'show' : '';
      ?>
      @if($sd->MenuLevel == 1)
      <li class="nav-item {{ $active }}">
        <a class="nav-link" data-toggle="collapse" href="#{{ $sd->menu_id }}" aria-expanded="false" aria-controls="{{ $sd->menu_id }}">
          <i class="{{ $sd->MenuIcon }} menu-icon"></i>
          <span class="menu-title">{{ $sd->MenuName }}</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="{{ $sd->menu_id }}">
          <ul class="nav flex-column sub-menu">
            <?php
            $childMenu = DB::table('vw_menu')
              ->where('ParentMenu', $sd->menu_id)
              ->where('role_id', session()->get('role_id'))
              ->where('user_id', session()->get('user_id'))
              ->select('*')
              ->get();
            ?>
            <?php
            foreach ($childMenu as $ch) :
              $cekUrls = DB::table('vw_menu')
                ->where('MenuUrl', $url)
                ->where('MenuName', $ch->MenuName)
                ->select('*')
                ->get();
              $actives = $cekUrls->count() > 0 ? 'active' : '';
            ?>
              <li class="nav-item">
                <a class="nav-link" href="{{ url($ch->MenuUrl) }}">{{ $ch->MenuName }}</a>
              </li>
            <?php endforeach ?>

          </ul>
        </div>
      </li>
      @endif
    <?php endforeach; ?>
  </ul>
</nav>
<!-- partial -->