@extends('layouts.front.app' ,['page_title' => $profile->biodata->nama, 'page' => $profile->username])

@section('content')
    <section class="overflow-hidden why-us-half-image-wrapper">
        <div class="why-us-half-image-content">
            <div class="section-title text-left">
                <h3>@{{user.biodata.nama}}</h3>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="row mb-40">
                        <div class="col-sm-4">
                            <img class="img img-responsive" :src="user.biodata.avatar || '/images/user/default.jpg'"
                                 alt="avatar-@{{user.username}}">
                        </div>
                        <div class="col-sm-8">
                            <div class="info">
                                <label>Bio</label>
                                <p class="deskripsi pre-text"> @{{user.biodata.bio || '-'}} </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <tabs>
                            <tab header="Biodata">
                                <dl class="dl-horizontal" style="font-size: 13pt">
                                    <dt><label>Nama : </label></dt>
                                    <dd>@{{ user.biodata.nama }}</dd>
                                    <dt><label>No Telp : </label></dt>
                                    <dd>@{{ user.biodata.no_telp }}</dd>
                                    <dt><label>Tanggal Lahir : </label></dt>
                                    <dd>@{{ user.biodata.birthday.substr(0,10) }}</dd>
                                    <dt><label>Jenis Kelamin : </label></dt>
                                    <dd>@{{ user.biodata.jenis_kelamin == 'l' ? "Laki Laki" : user.biodata.jenis_kelamin == 'p' ? "Perempuan" :'-' }}</dd>
                                </dl>
                            </tab>
                            @if($user->id === $profile->id)
                                <tab header="Edit Biodata">
                                    <a name="edit-bio"></a>
                                    <dl class="dl-horizontal" style="font-size: 12pt">
                                        <dd><a href="/password/change"> Ubah Password</a><br></dd>
                                        <form method="post" enctype="multipart/form-data" action="/profile">
                                            {{csrf_field()}}
                                            <dt><label>Avatar : </label></dt>
                                            <dd>
                                                <div class="form-group">
                                                    <div class="input-group" v-if="upload">
                                                        <input class="form-control" name="avatar-file" type="file">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-primary" type="button"
                                                            @click="upload = false">Input URL</button>
                                                        </div>
                                                    </div>
                                                    <div class="input-group" v-else>
                                                        <input class="form-control" name="avatar" type="text"
                                                               :value="user.biodata.avatar">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-primary" type="button"
                                                            @click="upload = true">Upload File</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </dd>
                                            <dd>
                                                <hr>
                                            </dd>
                                            <dt><label>Nama : </label></dt>
                                            <dd>
                                                <div class="form-group">
                                                    <input class="form-control" id="nama" name="nama" type="text"
                                                           :value="user.biodata.nama">
                                                </div>
                                            </dd>
                                            <dt><label>Username : </label></dt>
                                            <dd>
                                                <div class="form-group">
                                                    <input class="form-control" id="username" name="username"
                                                           type="text"
                                                           :value="user.username">
                                                </div>
                                            </dd>
                                            <dt><label>Email : </label></dt>
                                            <dd>
                                                <div class="form-group">
                                                    <input class="form-control" id="email" name="email" type="text"
                                                           :value="user.email">
                                                </div>
                                            </dd>
                                            <dd>
                                                <hr>
                                            </dd>
                                            <dt><label>No Telp : </label></dt>
                                            <dd>
                                                <div class="form-group">
                                                    <input class="form-control" id="no_telp" name="no_telp" type="text"
                                                           :value="user.biodata.no_telp">
                                                </div>
                                            </dd>
                                            <dt><label>Tanggal Lahir : </label></dt>
                                            <dd>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xs-3 pr-5">
                                                            <select class="form-control" name="bday_dd" id="sel-date"
                                                                    :value="user.biodata.birthday.substr(8, 2)">
                                                                <option value="" disabled>Tanggal</option>
                                                                <option value="01">1</option>
                                                                <option value="02">2</option>
                                                                <option value="03">3</option>
                                                                <option value="04">4</option>
                                                                <option value="05">5</option>
                                                                <option value="06">6</option>
                                                                <option value="07">7</option>
                                                                <option value="08">8</option>
                                                                <option value="09">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                <option value="13">13</option>
                                                                <option value="14">14</option>
                                                                <option value="15">15</option>
                                                                <option value="16">16</option>
                                                                <option value="17">17</option>
                                                                <option value="18">18</option>
                                                                <option value="19">19</option>
                                                                <option value="20">20</option>
                                                                <option value="21">21</option>
                                                                <option value="22">22</option>
                                                                <option value="23">23</option>
                                                                <option value="24">24</option>
                                                                <option value="25">25</option>
                                                                <option value="26">26</option>
                                                                <option value="27">27</option>
                                                                <option value="28">28</option>
                                                                <option value="29">29</option>
                                                                <option value="30">30</option>
                                                                <option value="31">31</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-4 pl-5 pr-5">
                                                            <select class="form-control" name="bday_mm" id="sel-month"
                                                                    :value="user.biodata.birthday.substr(5, 2)">
                                                                <option value="" disabled>Bulan</option>
                                                                <option value="01">January</option>
                                                                <option value="02">February</option>
                                                                <option value="03">March</option>
                                                                <option value="04">April</option>
                                                                <option value="05">May</option>
                                                                <option value="06">June</option>
                                                                <option value="07">July</option>
                                                                <option value="08">August</option>
                                                                <option value="09">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-3 pl-5">
                                                            <select class="form-control" name="bday_yy" id="sel-year"
                                                                    :value="user.biodata.birthday.substr(0, 4)">
                                                                <option value="" disabled>Tahun</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2004">2004</option>
                                                                <option value="2003">2003</option>
                                                                <option value="2002">2002</option>
                                                                <option value="2001">2001</option>
                                                                <option value="2000">2000</option>
                                                                <option value="1999">1999</option>
                                                                <option value="1998">1998</option>
                                                                <option value="1997">1997</option>
                                                                <option value="1996">1996</option>
                                                                <option value="1995">1995</option>
                                                                <option value="1994">1994</option>
                                                                <option value="1993">1993</option>
                                                                <option value="1992">1992</option>
                                                                <option value="1991">1991</option>
                                                                <option value="1990">1990</option>
                                                                <option value="1989">1989</option>
                                                                <option value="1988">1988</option>
                                                                <option value="1987">1987</option>
                                                                <option value="1986">1986</option>
                                                                <option value="1985">1985</option>
                                                                <option value="1984">1984</option>
                                                                <option value="1983">1983</option>
                                                                <option value="1982">1982</option>
                                                                <option value="1981">1981</option>
                                                                <option value="1980">1980</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </dd>
                                            <dt><label>Jenis Kelamin : </label></dt>
                                            <dd>
                                                <div class="form-group">
                                                    <input type="radio" name="jenis_kelamin" id="gender-p" value="p"
                                                           :checked="user.biodata.jenis_kelamin == 'p'">
                                                    <label for="gender-p" class="mr-20">Perempuan</label>
                                                    <input type="radio" name="jenis_kelamin" id="gender-l" value="l"
                                                           :checked="user.biodata.jenis_kelamin == 'l'">
                                                    <label for="gender-l">Laki-laki</label>
                                                </div>
                                            </dd>
                                            <dd>
                                                <hr>
                                            </dd>
                                            <dt><label>Bio : </label></dt>
                                            <dd>
                                                <div class="form-group">
                                                <textarea name="bio" id="bio" rows="4" class="form-control"
                                                          :value="user.biodata.bio"></textarea>
                                                </div>
                                            </dd>
                                            <dd>
                                                <br>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">Simpan
                                                    </button>
                                                </div>
                                            </dd>
                                        </form>
                                    </dl>
                                </tab>
                                <tab header="Data Alamat">
                                    <v-select :value.sync="alamat.id" name="alamat_id" placeholder="Pilih Alamat"
                                              v-if="alamats.length">
                                        <v-option v-for="item in alamats"
                                                  :value="item.id">@{{item.nama_alamat}}</v-option>
                                    </v-select>
                                    <button class="btn btn-default" @click="alamat.id = 0" type="button">Buat Alamat
                                    Baru</button>
                                    <alamat-form :alamat.sync="alamat"></alamat-form>
                                </tab>
                            @endif
                        </tabs>

                        @include('layouts.errors')

                    </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    @parent
    @include('alamat.form')

    <script>
        const vue = new Vue({
            el: 'body',
            mixins: [store],
            data: {
                //edit biodata
                upload: false,
                user: {!! $profile !!},

                @if($user->id === $profile->id)
                //data alamat
                alamats: {!! $profile->alamats !!},
                alamat: {!! isset($profile->alamat) ? $profile->alamat : "{
                    nama_penerima: '".$profile->biodata->nama."',
                    no_telp: '".$profile->biodata->no_telp."',
                }" !!}
                @endif
            },
            components: {
                vSelect: VueStrap.select,
                vOption: VueStrap.option,
                tabs: VueStrap.tabset,
                tab: VueStrap.tab
            },
            watch: {
                'alamat.id': function(val) {
                    if (val) {
                        var alamat = this.alamats.filter(function(item) {
                            return item.id == val;
                        });
                        this.alamat = jQuery.extend(true, {}, alamat[0]); //clone the object
                    } else {
                        this.alamat = {
                            nama_penerima: '{{$profile->biodata->nama}}',
                            no_telp: '{{$profile->biodata->no_telp}}'
                        }
                    }
                }
            }
        });
    </script>
@endsection