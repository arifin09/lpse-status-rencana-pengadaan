## status-rencana-pengadaan

[![Join the chat at https://gitter.im/status-rencana-pengadaan/Lobby](https://badges.gitter.im/status-rencana-pengadaan/Lobby.svg)](https://gitter.im/status-rencana-pengadaan/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/status-rencana-pengadaan/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/status-rencana-pengadaan/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/status-rencana-pengadaan/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/status-rencana-pengadaan/build-status/master)

Status Rencana Pengadaan (APK)

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/status-rencana-pengadaan:dev-master
```
- Latest release:

```bash
$ composer require bantenprov/status-rencana-pengadaan:v0.1.0
```

## download via github
~~~
bash
$ git clone https://github.com/bantenprov/status-rencana-pengadaan.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\StatusRencanaPengadaan\StatusRencanaPengadaanServiceProvider::class,

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=lpse-status-rencana-pengadaan-assets
$ php artisan vendor:publish --tag=lpse-status-rencana-pengadaan-public
```
#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/lpse-status-rencana-pengadaan',
    components: {
      main: resolve => require(['./components/views/bantenprov/lpse-status-rencana-pengadaan/DashboardStatusRencanaPengadaan.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Status Rencana Pengadaan"
    }
  }
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/lpse-status-rencana-pengadaan',
      components: {
        main: resolve => require(['./components/bantenprov/lpse-status-rencana-pengadaan/StatusRencanaPengadaanAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "Status Rencana Pengadaan"
      }
    }
 //== ...   
  ]
},

```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'Status Rencana Pengadaan',
          link: '/dashboard/lpse-status-rencana-pengadaan',
          icon: 'fa fa-angle-double-right'
        }
  ]
},
//== ...
        {
          name: 'Status Rencana Pengadaan',
          link: '/admin/dashboard/lpse-status-rencana-pengadaan',
          icon: 'fa fa-angle-double-right'
        },
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

import StatusRencanaPengadaan from './components/bantenprov/lpse-status-rencana-pengadaan/StatusRencanaPengadaan.chart.vue';
Vue.component('echarts-lpse-status-rencana-pengadaan', StatusRencanaPengadaan);

import StatusRencanaPengadaanKota from './components/bantenprov/lpse-status-rencana-pengadaan/StatusRencanaPengadaanKota.chart.vue';
Vue.component('echarts-lpse-status-rencana-pengadaan-kota', StatusRencanaPengadaanKota);

import StatusRencanaPengadaanTahun from './components/bantenprov/lpse-status-rencana-pengadaan/StatusRencanaPengadaanTahun.chart.vue';
Vue.component('echarts-lpse-status-rencana-pengadaan-tahun', StatusRencanaPengadaanTahun);

import StatusRencanaPengadaanAdminShow from './components/bantenprov/lpse-status-rencana-pengadaan/StatusRencanaPengadaanAdmin.show.vue';
Vue.component('admin-view-lpse-status-rencana-pengadaan-tahun', StatusRencanaPengadaanAdminShow);

//== Echarts Status Rencana Pengadaan

import StatusRencanaPengadaanBar01 from './components/views/bantenprov/lpse-status-rencana-pengadaan/StatusRencanaPengadaanBar01.vue';
Vue.component('lpse-status-rencana-pengadaan-bar-01', StatusRencanaPengadaanBar01);

import StatusRencanaPengadaanBar02 from './components/views/bantenprov/lpse-status-rencana-pengadaan/StatusRencanaPengadaanBar02.vue';
Vue.component('lpse-status-rencana-pengadaan-bar-02', StatusRencanaPengadaanBar02);

//== mini bar charts
import StatusRencanaPengadaanBar03 from './components/views/bantenprov/lpse-status-rencana-pengadaan/StatusRencanaPengadaanBar03.vue';
Vue.component('lpse-status-rencana-pengadaan-bar-03', StatusRencanaPengadaanBar03);

import StatusRencanaPengadaanPie01 from './components/views/bantenprov/lpse-status-rencana-pengadaan/StatusRencanaPengadaanPie01.vue';
Vue.component('lpse-status-rencana-pengadaan-pie-01', StatusRencanaPengadaanPie01);

import StatusRencanaPengadaanPie02 from './components/views/bantenprov/lpse-status-rencana-pengadaan/StatusRencanaPengadaanPie02.vue';
Vue.component('lpse-status-rencana-pengadaan-pie-02', StatusRencanaPengadaanPie02);

//== mini pie charts
import StatusRencanaPengadaanPie03 from './components/views/bantenprov/lpse-status-rencana-pengadaan/StatusRencanaPengadaanPie03.vue';
Vue.component('lpse-status-rencana-pengadaan-pie-03', StatusRencanaPengadaanPie03);
```