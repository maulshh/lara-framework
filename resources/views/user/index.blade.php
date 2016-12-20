@extends('layouts.admin', ['page_title' => "User Management", 'page' => 'user'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-{{TMP_COLOR}}">
                <div class="box-header">
                    <div class="box-tools">
                    </div>
                    <h3 class="box-title">Manage User</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-7 form-inline">
                            <div class="form-inline form-group">
                                <label>Search:</label>
                                <input v-model="searchFor" class="form-control" @keyup.enter="setFilter">
                                <button class="btn btn-primary" @click="setFilter">Go</button>
                                <button class="btn btn-default" @click="resetFilter">Reset</button>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-inline form-group pull-right">
                                <label> &nbsp; &nbsp; &nbsp; Per Page: </label>
                                <select class="form-control" v-model="perPage">
                                    <option value=10>10</option>
                                    <option value=15>15</option>
                                    <option value=20>20</option>
                                    <option value=25>25</option>
                                </select>
                            </div>
                            <div class="form-inline form-group pull-right">
                                <label>Role: </label>
                                <select class="form-control" v-model="role">
                                    <option value="all">All</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <vuetable v-ref:vuetable
                                  :api-url="apiUrl"
                                  pagination-path=""
                                  :fields="fields"
                                  :sort-order="sortOrder"
                                  :multi-sort="multiSort"
                                  table-class="table table-bordered table-striped table-hover"
                                  ascending-icon="glyphicon glyphicon-chevron-up"
                                  descending-icon="glyphicon glyphicon-chevron-down"
                                  pagination-class=""
                                  pagination-info-class=""
                                  pagination-component-class=""
                                  :pagination-component="paginationComponent"
                                  :item-actions="itemActions"
                                  :append-params="moreParams"
                                  :per-page="perPage"
                                  wrapper-class="vuetable-wrapper"
                                  table-wrapper=".vuetable-wrapper"
                                  loading-class="loading"
                                  detail-row-component="my-detail-row"
                                  detail-row-id="id"
                                  detail-row-transition="expand"
                                  row-class-callback="rowClassCB"
                                  :pagination-info-template="paginationInfoTemplate"
                        ></vuetable>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script src="/js/vue-table.js"></script>

    <script>
        // fields definition
        var tableColumns = [
            {
                name: '__component:mini-profile',
                title: 'Username',
                sortField: 'username'
            },
            {
                name: 'biodata.nama',
                title: "Nama",
                sortField: 'biodatas.nama'
            },
            {
                name: 'email',
                sortField: 'email',
                callback: 'mailto'
            },
            {
                name: '__component:created-at',
                sortField: 'users.created_at',
                title: 'Member sejak'
            },
            {
                name: 'biodata.jenis_kelamin',
                title: 'Gender',
                callback: 'gender',
                sortField: 'jenis_kelamin'
            },
            {
                name: '__component:roles',
                title: 'Roles'
            },
            {
                name: '__component:custom-action',
                title: "Action",
                titleClass: 'center aligned',
                dataClass: 'center aligned'
            }
        ]

        Vue.component('roles', {
            template: [
                `<ul>
                    <li v-for="role in rowData.roles">
                        <form action="/admin/user/@{{ rowData.id }}/role/@{{ role.name }}"
                              method="POST">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            @{{ role.label }} &nbsp;
                            <a href="#" @click="deleteForm('role', $event)" class="text-red"
                                title="pecat sebagai @{{ role.label }}" v-if="role.name != 'user'">
                                <i class="fa fa-times"></i>
                            </a>
                        </form>
                    </li>
                </ul>`
            ].join(''),
            props: {
                rowData: {
                    type: Object,
                    required: true
                }
            },
            methods: {
                deleteForm(object, e) {
                    if (!confirm("Apa kamu yakin akan menghapus " + object + "?"))
                        e.preventDefault();
                    else if (e.target.tagName == 'A') {
                        e.target.parentNode.submit()
                    } else {
                        e.target.parentNode.parentNode.submit()
                    }
                }
            }
        })

        Vue.component('custom-action', {
            template: [`
                <form action="/admin/user/@{{ rowData.id }}/role/admin" method="POST" v-if="rowData.roles[0].id > {{App\Role::getId('admin')}}">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                    <a href="#" onclick="this.parentNode.submit()" class="text-green"><i class="fa fa-plus"></i> Jadikan Admin</a>
                </form>
                <form action="/admin/user/@{{ rowData.id }}" method="POST" v-if="rowData.status != -1">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <a href="#" @click="deleteForm('user', $event)" class="text-red"> <i class="fa fa-times"></i>
                        Blokir user ini
                    </a>
                </form>
                <form action="/admin/user/@{{ rowData.id }}" method="POST" v-else>
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                    <a href="#" onclick="this.parentNode.submit()" class="text-warning"> <i class="fa fa-check"></i>
                        Aktifkan Kembali
                    </a>
                </form>`
            ].join(''),
            props: {
                rowData: {
                    type: Object,
                    required: true
                }
            },
            methods: {
                deleteForm(object, e) {
                    if (!confirm("Apa kamu yakin akan menghapus " + object + "?"))
                        e.preventDefault();
                    else if (e.target.tagName == 'A') {
                        e.target.parentNode.submit()
                    } else {
                        e.target.parentNode.parentNode.submit()
                    }
                }
            }
        })

        Vue.component('mini-profile', {
            template: [`
                <div>
                    <div class="pull-left" style="padding:4px; min-width:54px;">
                        <img alt="foto" :src="rowData.biodata.avatar || '/images/user/default.jpg'"
                            class="img img-thumbnail" style="height:48px; width:48px">
                        </div>
                    <div style="padding: 2px 6px 6px 6px; font-weight:bold;">
                        <a href="/profile/@{{ rowData.username }}">@{{ rowData.username }}</a>
                    </div>
                </div>`
            ].join(''),
            props: {
                rowData: {
                    type: Object,
                    required: true
                }
            }
        })

        Vue.component('created-at', {
            template: [
                `@{{ rowData.created_at }}<br>
                <small :class="{'text-green': rowData.status != -1, 'text-red': rowData.status == -1}">
                    @{{ rowData.status == -1 ? 'banned' : (rowData.status > 0 ? 'active' : 'new user!') }}
                </small>`
            ].join(''),
            props: {
                rowData: {
                    type: Object,
                    required: true
                }
            }
        })

        const vue = new Vue({
            el: '#vue-container',
            mixins: [store],
            data: {
                role: 'all',
                searchFor: '',
                fields: tableColumns,
                sortOrder: [{
                    field: 'username',
                    direction: 'asc'
                }],
                multiSort: true,
                perPage: 10,
                paginationComponent: 'vuetable-pagination',
                paginationInfoTemplate: 'Menunjukkan {from} sampai {to} dari {total} users',
                moreParams: []
            },
            computed: {
                apiUrl() {
                    return '{{url('/api/users')}}/' + this.role
                }
            },
            watch: {
                perPage() {
                    this.$broadcast('vuetable:refresh')
                },
                role() {
                    this.$broadcast('vuetable:refresh')
                }
            },
            methods: {
                //custom-field
                mailto(value) {
                    return '<a href="mailto:' + value + '">' + value + '</a>'
                },
                gender(value) {
                    return value == 'l'
                            ? '<span class="label label-info"><i class="glyphicon glyphicon-star"></i> Laki-laki</span>'
                            : value == 'p' ?
                            '<span class="label label-success"><i class="glyphicon glyphicon-heart"></i> Perempuan</span>'
                            : '-'
                },
                //other methods
                setFilter() {
                    this.moreParams = [
                        'filter=' + this.searchFor
                    ]
                    this.$nextTick(function () {
                        this.$broadcast('vuetable:refresh')
                    })
                },
                resetFilter() {
                    this.searchFor = ''
                    this.setFilter()
                },
                preg_quote(str) {
                    // http://kevin.vanzonneveld.net
                    // +   original by: booeyOH
                    // +   improved by: Ates Goral (http://magnetiq.com)
                    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
                    // +   bugfixed by: Onno Marsman
                    // *     example 1: preg_quote("$40");
                    // *     returns 1: '\$40'
                    // *     example 2: preg_quote("*RRRING* Hello?");
                    // *     returns 2: '\*RRRING\* Hello\?'
                    // *     example 3: preg_quote("\\.+*?[^]$(){}=!<>|:");
                    // *     returns 3: '\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:'

                    return (str + '').replace(/([\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:])/g, "\\$1");
                },
                highlight(needle, haystack) {
                    return haystack.replace(
                            new RegExp('(' + this.preg_quote(needle) + ')', 'ig'),
                            '<span class="highlight">$1</span>'
                    )
                },
                rowClassCB(data, index) {
                    return (index % 2) === 0 ? 'positive' : ''
                },
                paginationConfig() {
                    this.$broadcast('vuetable-pagination:set-options', {
                        wrapperClass: 'pagination',
                        icons: {first: '', prev: '', next: '', last: ''},
                        activeClass: 'active',
                        linkClass: 'btn btn-default',
                        pageClass: 'btn btn-default'
                    })
                }
            }
        });
    </script>
@endsection