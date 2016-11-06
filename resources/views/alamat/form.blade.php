@inject('region', 'App\Http\Utilities\Region')

<template id="alamat-form">
    <form id="form-alamat" method="POST" :action="action">

        {{csrf_field()}}
        @{{{ method }}}

        <h3>Alamat</h3>
        <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <v-select :value.sync="alamat.provinsi" name="provinsi" justified
                      search placeholder="Pilih Provinsi" :options="provinsi" required>
            </v-select>
        </div>
        <div class="form-group">
            <label for="kota">Kota</label>
            <v-select :value.sync="alamat.kota" name="kota" :parent="alamat.provinsi"
                      search placeholder="Pilih Kota" :options="kota" required justified>
            </v-select>
        </div>
        <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <v-select :value.sync="alamat.kecamatan" name="kecamatan" :parent="alamat.kota"
                      search placeholder="Pilih Kecamatan" :options="kecamatan" required justified>
            </v-select>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea placeholder="Detail alamat" name="alamat" class="form-control" rows="4"
                      v-model="alamat.alamat"></textarea>
        </div>

        <h3>Data Alamat</h3>
        <div class="form-group">
            <label for="nama_penerima">Nama Penerima</label>
            <input class="form-control" id="nama_penerima" name="nama_penerima" type="text" placeholder=""
                   v-model="alamat.nama_penerima" required>
        </div>
        <div class="form-group">
            <label for="no_telp">No Telp</label>
            <input class="form-control" id="no_telp" name="no_telp" type="text" placeholder=""
                   v-model="alamat.no_telp" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="4"
                      placeholder="Penjelasan opsional mengenai lokasi" v-model="alamat.keterangan"
            ></textarea>
        </div>
        <div class="form-group">
            <label for="nama_alamat">Simpan alamat sebagai</label>
            <input class="form-control" id="nama_alamat" name="nama_alamat" type="text"
                   placeholder="contoh: rumah ayah, kos, rumah heru" required
                   v-model="alamat.nama_alamat">
        </div>
        <checkbox :checked.sync="alamat.defaulted_to_user_id" value="true" name="set_default">Simpan sebagai alamat
            utama
        </checkbox>

        <br>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Submit</button>
        </div>
    </form>

    @include('layouts.errors')
</template>

<script>
    Vue.component('alamat-form', {
        template: "#alamat-form",
        components: {
            vSelect: VueStrap.select,
            vOption: VueStrap.option,
            checkbox: VueStrap.checkbox
        },
        props: {
            alamat: {
                twoWay: true
            },
        },
        data() {
            return {
                provinsi: {!! $region->json_provinces() !!}
                kota: [],
                kecamatan: [],
            }
        },
        computed: {
            action(){
                return this.alamat.id ? '/alamat/' + this.alamat.id : '/alamat'
            },
            method(){
                return this.alamat.id ? '{{method_field('PUT')}}' : '{{method_field('POST')}}'
            }
        },
        methods: {
            getDistricts() {
                this.$http.get('/api/region/districts/' + this.alamat.kota).then((response) = > {
                    this.kecamatan = JSON.parse(response.body);
                })
            },
            getCities() {
                this.$http.get('/api/region/cities/' + this.alamat.provinsi).then((response) = > {
                    this.kota = JSON.parse(response.body);
                })
            }
        },
        created() {
            this.getDistricts();
            this.getCities();
        },
        watch: {
            'alamat.provinsi': function () {
                this.getCities();
            },
            'alamat.kota': function () {
                this.getDistricts();
            }
        }
    })
</script>