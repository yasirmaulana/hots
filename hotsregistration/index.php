<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hots Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
  <div id="root">
    <div class="container" style="margin-top: 10px;margin-bottom: 30px">
        <div class="row">
  
            <div class="col-xs-12 col-sm-12 col-lg-3" style="background-color:#26b407; margin-top:20px">
                <h5 style="margin-top:10px">Lupa HotserID???</h5>
                <form style="margin-bottom:10px">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="fill your email here" v-model="vemail">
                    </div>
                    <div><i>or</i></div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="fill your WA Number here" v-model="vwa">
                    </div>
                    <a class="btn btn-warning" type="submit" name="action" @click="getHotserId()">search</a>                    
                </form>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-lg-9">
                <h3>HAFIZH ON THE STREET (HOTS) REGISTRATION</h3>
                <form>
                    <div class="form-group">
                        <label>Nama Lengkap <i style="color: gray">/Name</i>  </label>
                        <input class="form-control" type="text" v-model="newHotser.nama">
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir <i style="color: gray">/Birthplace</i></label>
                        <input class="form-control"  type="text" v-model="newHotser.tempatLahir">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir <i style="color: gray">/Date of birth</i></label>
                        <input class="form-control" type="date" v-model="newHotser.tglLahir">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin  <i style="color: gray">/Gender</i></label><br>
                        <select id="jk" v-model="newHotser.jenisKelamin">
                            <option value="" disabled selected>Choose your gender</option>
                            <option v-for="gender in genders" :value="gender.val">{{gender.tag}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Profesi<i style="color: gray">/Profession</i></label>
                        <input class="form-control" type="text" v-model="newHotser.pekerjaan">
                    </div>
                    <div class="form-group">  
                        <label>Nomor Whatsapp  <i style="color: gray">/Whatsapp Number</i></label>
                        <input class="form-control"  type="text" v-model="newHotser.nomorWA">
                    </div>
                    <div class="form-group">
                        <label>Alamat Email  <i style="color: gray">/Email</i></label>
                        <input class="form-control"  type="text" v-model="newHotser.email">
                    </div>

                    <!-- drop down negara -->
                    {{this.arrPrefix}}
                    <div class="form-group">
                        <label>Negara<i style="color: gray">/Country</i></label><br>
                        <select v-model="newHotser.domisili" @change="ifNegara()">
                            <option value="" disabled selected>Choose your country</option>
                            <option v-for="kode in this.arrPrefix" :value="kode.country_name">{{kode.country_name}}</option>
                        </select>
                    </div>
                    
                    <!-- drop down provinsi -->
                    <div class="from-group">
                        <label>Provinsi<i style="color: gray">/Province</i></label><br>
                        <select v-model="newHotser.provinsi" @change="getKota()" v-if="cekNegara">
                            <option value="" disable selected>Choose your province</option>
                            <option v-for="prov in arrProvinsi" :value="prov.name">{{prov.name}}</option>
                        </select>
                        <input class="form-control" type="text" v-model="newHotser.provinsi" v-if="cekNegara2">
                    </div>

                    <!-- drop down kota -->
                    <br>
                    <div class="form-group">
                        <label>Kota<i style="color: gray">/City</i></label><br>
                        <select v-model="newHotser.kota" @change="getKecamatan()" v-if="cekNegara">
                            <option value="" disable selected>Choose your city</option>
                            <option v-for="kota in arrKota" :value="kota.name">{{kota.name}}</option>
                        </select>
                        <input class="form-control" type="text" v-model="newHotser.kota" v-if="cekNegara2">
                    </div>

                    <!-- drop down kecamatan -->
                    <div class="form-group">
                        <label>Kecamatan <i style="color: gray">/District</i></label><br>
                        <select v-model="newHotser.kecamatan" @change="getKelurahan()" v-if="cekNegara">
                            <option value="" disable selected>Choose your district</option>
                            <option v-for="kec in arrKecamatan" :value="kec.name">{{kec.name}}</option>
                        </select>
                        <input class="form-control"  type="text" v-model="newHotser.kecamatan" v-if="cekNegara2">
                    </div>
                    
                    <!-- drop down kelurahan -->
                    <div class="form-group">
                        <label>Kelurahan <i style="color: gray">/Village</i></label><br>
                        <select v-model="newHotser.kelurahan" v-if="cekNegara">
                            <option value="" disable selected>Choose your Village</option>
                            <option v-for="kel in arrKelurahan" :value="kel.name">{{kel.name}}</option>
                        </select>
                        <input class="form-control"  type="text" v-model="newHotser.kelurahan" v-if="cekNegara2">
                    </div>

                    <div class="form-group">
                        <label>Alamat <i style="color: gray">/Address</i></label>
                        <input class="form-control"  type="text" v-model="newHotser.alamat">
                    </div>
                    <div class="form-group">
                        <label>Program yang akan diikuti? <i style="color: gray">/Which program will be followed?</i></label><br>
                        <input id = "hots" type = "checkbox" class = "filled-in" v-model="newHotser.programHots"/><label for = "hots">Hots</label><br>
                        <input id = "hadits" type = "checkbox" class = "filled-in" v-model="newHotser.programHadist"/><label for = "hadits">Hadits</label><br>
                        <input id = "kids" type = "checkbox" class = "filled-in" v-model="newHotser.programKids"/><label for = "kids">Kids</label>
                    </div>
                    <div class="form-group">
                        <label>Isi Grup WA Hots ( <i>jika sudah bergabung</i>) <i style="color: gray">/Fill Hots WA Group (if you have joined)</i></label>
                        <input class="form-control" type="text" v-model="newHotser.wagHots">
                    </div>
                    <div class="form-group">
                        <label>Isi Grup WA Hadits ( <i>jika sudah bergabung</i>) <i style="color: gray">/Fill Hadits WA Group (if you have joined)</i> </label>
                        <input class="form-control" type="text" v-model="newHotser.wagHadist">
                    </div>
                    <div class="form-group">
                        <label>Isi Grup WA Kids ( <i>jika sudah bergabung</i>) <i style="color: gray">/Fill Kids WA Group (if you have joined)</i> </label>
                        <input class="form-control" type="text" v-model="newHotser.wagKids">
                    </div>          
                    <div class="form-group">
                        <label>Dari mana mengetahui program ini? <i style="color: gray">/Where do you know about this program?</i></label><br>
                        <select multiple v-model="newHotser.sumberInfoProgram">
                        <option value = "" disabled selected>Check your option</option>
                        <option value = "tv">TV</option>
                        <option value = "radio">Radio</option>
                        <option value = "mediaCetak">Media Cetak</option>
                        <option value = "internet">Internet</option>
                        <option value = "medsos">Media Sosial</option>
                        <option value = "bcWA">Broadcast Whatsapp</option>
                        <option value = "wag">Grup Whatsapp</option>
                        <option value = "aksiHots">Hafizh on the street</option>
                        <option value = "usbob">Kajian Ust. Boby</option>
                        <option value = "kerabat">Kerabat</option>
                        <option value = "lainnya">Lainnya...</option>
                        </select> 
                    </div> 

                    <a class="btn btn-success" type="submit" name="action" @click="saveHotser()">Register</a>
                </form>
            </div>
  
        </div>
    </div>
    
  </div>
  
  <script type="text/javascript" src="../sweetalert.js"></script>
  <script type="text/javascript" src="../axios.js"></script>
  <script type="text/javascript" src="../vue.js"></script>
  <script type="text/javascript" src="app.js"></script>
</body>
</html>