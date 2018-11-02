// var url = "https://kauny.com/application/hots/HotsRegistration/api.php?action=";
var url = "http://localhost/hots/HotsRegistration/api.php?action=";
var app = new Vue ({
  el: "#root",

  data: {
    newHotser: {
      nama: '',
      tempatLahir: '',
      tglLahir: '',
      jenisKelamin: '',
      pekerjaan: '',
      prefix: '',
      nomorWA: '',
      email: '',
      domisili: '',
      provinsi: '',
      kota: '',
      kecamatan: '',
      kelurahan: '',
      alamat: '',
      programHots: '',
      programHadist: '',
      programKids: '',
      wagHots: '',
      wagHadist: '',
      wagKids: '',
      sumberInfoProgram: '',
      hotserId: ''
    },
    vemail: '',
    vwa: '',
    arrPrefix: [],
    arrProvinsi: [],
    arrKota: [],
    arrKecamatan: [],
    arrKelurahan: [],
    arrHotserId: [],
    genders: [
      {val: 'I', tag: 'Ikhwan (Laki-laki)'},
      {val: 'A', tag: 'Akhwat (Perempuan)'}
    ],
    cekNegara: false,
    cekNegara2: true,
    province_id: 11
  },

  computed: {
    
  },

  methods: {
    getNegara: function () {
      axios.get(url+"readPrefix")
        .then(function(response){
          this.arrPrefix = response.data.prefix
          console.log('ok coy', this.arrPrefix)
        })
        .catch(function(error){
          console.log('error coy')
        })
    },

    ifNegara: function(){
      // const self = this
      if(this.newHotser.domisili === 'Indonesia'){
        this.cekNegara = true
        this.cekNegara2 = false
      } else {
        this.cekNegara = false
        this.cekNegara2 = true
      }
    },

    getProvinsi: function(){
      axios.get(url+"readProvinsi")
        .then(function(response){
          app.arrProvinsi = response.data.provinsi
          // console.log('ok coy', app.arrPrefix)
        })
        .catch(function(error){
          // console.log('error coy')
        })
    },

    getKota: function(){
      // console.log('>>>>>>>>>', this.newHotser.provinsi)
      let formData = new FormData()
      formData.append('provinsi', this.newHotser.provinsi)
      
      axios.post(url+"readKota", formData)
        .then(response => {
          this.arrKota = response.data.kota
          // console.log(this.arrKota)
        })
        .catch(error => {
          // console.log(error)
        })
    },

    getKecamatan: function(){ 
      let formData = new FormData()
      formData.append('kota', this.newHotser.kota)

      axios.post(url+"readKecamatan", formData)
        .then(response => {
          this.arrKecamatan = response.data.kecamatan
          // console.log(this.arrKecamatan)
        })
        .catch(error => {
          // console.log(error)          
        })
    },

    getKelurahan: function(){ 
      let formData = new FormData()
      formData.append('kecamatan', this.newHotser.kecamatan)

      axios.post(url+"readKelurahan", formData)
        .then(response => {
          this.arrKelurahan = response.data.kelurahan
        })
        .catch(error => {
          
        })
    },

    getHotserId: function(){
      if(this.vemail !== ''){
        // alert('kita mau ngejalanin email ')
        let formData = new FormData()
        formData.append('email', app.vemail)
        axios.post(url+"cariHotseridEmail", formData)
          .then(response => {
            this.arrHotserId = response.data.hotserid
            if(this.arrHotserId.length > 0){
              // console.log(this.arrHotserId[0].hotserId)
              swal('Remember...','your HotserID: ' + this.arrHotserId[0].hotserId , )
            } else {
              swal({
                icon: 'error',
                title: 'Oops',
                text: 'email belum terdaftar, pastikan mengisi dengan email yang sama pada saat mendaftar'
              })
            }
          })
          .catch(error => {
            // console.log('errrrrrrr>>>>',error)
          })
      } else if(this.vwa !== ''){
        // alert('kita mau ngejalanain waa number')
        // cariHotseridWA
        let formData = new FormData()
        formData.append('nomorWA', app.vwa)
        axios.post(url+"cariHotseridWA", formData)
          .then(response => {
            this.arrHotserId = response.data.hotserid
            if(this.arrHotserId.length > 0){
              // console.log(this.arrHotserId[0].hotserId)
              swal('Remember...','your HotserID: ' + this.arrHotserId[0].hotserId , )
            } else {
              // console.log(this.arrHotserId)
              swal({
                icon: 'error',
                title: 'Oops',
                text: 'nomor WA belum terdaftar, pastikan mengisi dengan nomor WA yang sama pada saat mendaftar'
              })
            }
          })
          .catch(error => {
            // console.log('errrrrrrr>>>>',error)
          })
      } else {
        swal({
          icon: 'error',
          title: 'Hhmmm...',
          text: 'mohon masukan email atau nomor WA yang terdaftar!!!'
        })
      }
    },

    validasiForm: function () {
      let regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      let cekEmail = regEx.test(String(this.newHotser.email).toLowerCase())
      let cekWA = this.newHotser.nomorWA.match(/[^0-9]/g)
      if (this.newHotser.nama === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Nama wajib diisi'
        })
        return false
      } else if (this.newHotser.tempatLahir === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Tempat Lahir wajib diisi'
        })
        return false
      } else if (this.newHotser.tglLahir === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Tanggal Lahir wajib diisi'
        })
        return false
      } else if (this.newHotser.jenisKelamin === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Jenis Kelamin wajib diisi'
        })
        return false
      } else if (this.newHotser.nomorWA.length < 10) {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'isian nomor Whatsapp minimal 10 digit'
        })
        return false
      } else if (cekWA) {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'isian nomor Whatsapp tidak boleh selain angka'
        })
        return false
      } else if (this.newHotser.email === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Email wajib diisi'
        })
        return false
      } else if (!cekEmail) {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'isian Email salah format'
        })
        return false
      } else if (this.newHotser.domisili === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Negara wajib diisi'
        })
        return false
      } else if (this.newHotser.provinsi === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Provinsi wajib diisi'
        })
        return false
      } else if (this.newHotser.kota === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Kota wajib diisi'
        })
        return false
      } else if (this.newHotser.kecamatan === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Kecamatan wajib diisi'
        })
        return false
      } else if (this.newHotser.kelurahan === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Kelurahan wajib diisi'
        })
        return false
      } else if (this.newHotser.alamat === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Alamat wajib diisi'
        })
        return false
      } else if (this.newHotser.sumberInfoProgram === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Sumber Info Program wajib diisi'
        })
        return false
      } else {
        return true
      }
    },

    saveHotser: function(){
      // var d = new Date()
      // var thn = d.getFullYear().toString().substr(-2)
      // var mth = (d.getMonth() + 1).toString()
      //   if( mth.length === 1 ){ mth = "0" + mth }
      // var day = d.getDate().toString()
      //   if( day.length === 1 ){ day = "0" + day }
      // var jam = d.getHours().toString()
      //   if( jam.length === 1 ){ jam = "0" + jam}
      // var mnt = d.getMinutes().toString()
      //   if( mnt.length === 1 ){ mnt = "0" + mnt}
      // var scn = d.getSeconds().toString()
      //   if( scn.length === 1 ){ scn = "0" + scn}  
      // app.newHotser.hotserId = 'SM'+app.newHotser.jenisKelamin+thn+mth+day+jam+mnt+scn

      let tiga = app.newHotser.nomorWA.substr(app.newHotser.nomorWA.length-3)
      let thn = app.newHotser.tglLahir.substr(2,2)
      let mth = app.newHotser.tglLahir.substr(5,2)
      app.newHotser.hotserId = 'SH' + app.newHotser.jenisKelamin + tiga + mth + thn  

      let cek = this.validasiForm()
      if(cek){
        var formData = this.toFormdata(this.newHotser)
        axios.post(url+"create", formData)
          .then(function(response){
            // console.log('>>>>>>>>>>>>>',response)
            swal('You are registered','your HotserID: ' + app.newHotser.hotserId , 'success')
          })
          .catch(function(error){
            // console.log('++++++++++',error)
            swall({
              icon: 'error',
              title: 'Oops...',
              text: 'input failed...'
            })
          })
      }
    },

    toFormdata: function(obj){
      var form_data = new FormData()
      for(var key in obj){
        form_data.append(key, obj[key])
      }
      return form_data;
    } 
  },

  mounted: function(){
    console.log("test doang ceritanya")
    this.getNegara()
    this.getProvinsi()
  },



})