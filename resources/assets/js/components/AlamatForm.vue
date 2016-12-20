<template>
    <form method="POST" :action="action">
        <input type="hidden" name="_token" value="{{ csrf_token }}">
        <input type="hidden" name="_method" value="{{ method }}">

        <h3>Alamat</h3>
        <div class="form-group">
            <label>Provinsi</label>
            <v-select v-model="alamat.provinsi" name="provinsi" justified
                      search placeholder="Pilih Provinsi" :options="provinsi" required>
            </v-select>
        </div>
        <div class="form-group">
            <label>Kota</label>
            <v-select v-model="alamat.kota" name="kota" :parent="alamat.provinsi"
                      search placeholder="Pilih Kota" :options="kota" required justified>
            </v-select>
        </div>
        <div class="form-group">
            <label>Kecamatan</label>
            <v-select v-model="alamat.kecamatan" name="kecamatan" :parent="alamat.kota"
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
            <label>Nama Penerima</label>
            <input class="form-control" name="nama_penerima" type="text" placeholder=""
                   v-model="alamat.nama_penerima" required>
        </div>
        <div class="form-group">
            <label>No Telp</label>
            <input class="form-control" name="no_telp" type="text" placeholder=""
                   v-model="alamat.no_telp" required>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan" rows="4"
                      placeholder="Penjelasan opsional mengenai lokasi" v-model="alamat.keterangan"
            ></textarea>
        </div>
        <div class="form-group">
            <label>Simpan alamat sebagai</label>
            <input class="form-control" name="nama_alamat" type="text"
                   placeholder="contoh: rumah ayah, kos, rumah heru" required
                   v-model="alamat.nama_alamat">
        </div>

        <br>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Submit</button>
        </div>
    </form>
</template>

<script>
    export default {
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
                provinsi: [],
                kota: [],
                kecamatan: [],
                csrf_token: window.Laravel.csrfToken
            }
        },
        computed: {
            action() {
                return this.alamat.id ? '/alamat/' + this.alamat.id : '/alamat'
            },
            method() {
                return this.alamat.id ? 'PUT' : 'POST'
            }
        },
        methods: {
            getDistricts() {
                this.$http.get('/api/region/districts/' + this.alamat.kota).then(function (response) {
                    this.kecamatan = response.body;
                })
            },
            getCities() {
                this.$http.get('/api/region/cities/' + this.alamat.provinsi).then(function (response) {
                    this.kota = response.body;
                })
            }
        },
        created() {
            this.getDistricts();
            this.getCities();
            this.$http.get('/api/region/provinces').then(function (response) {
                this.provinsi = response.body;
            })
        },
        watch: {
            'alamat.provinsi': function () {
                this.getCities();
            },
            'alamat.kota': function () {
                this.getDistricts();
            }
        }
    }
</script>