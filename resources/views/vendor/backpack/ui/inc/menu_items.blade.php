{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="Posts" icon="la la-question" :link="backpack_url('post')" />
<x-backpack::menu-item title="Colis" icon="la la-question" :link="backpack_url('colis')" />
<x-backpack::menu-item title="Destinataires" icon="la la-question" :link="backpack_url('destinataire')" />
<x-backpack::menu-item title="Expediteurs" icon="la la-question" :link="backpack_url('expediteur')" />
<x-backpack::menu-item title="Historique colis" icon="la la-question" :link="backpack_url('historique-colis')" />