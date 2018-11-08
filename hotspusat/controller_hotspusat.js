// var url = "https://kauny.com/hots/hotspusat/model_hotspusat.php?action="
var url = "http://localhost:8080/hots/hotspusat/model_hotspusat.php?action="

var app = new Vue({
  el: "#root",

  data: {
    arrFasil: [],
    arrGrup: [],
    arrSurah: [],
    newFasil: {
      nama: "",
      nomorWA: "",
      nomorWA2: "",
    },
    fasilSelected: {},
    newGrup: {
      nomorGrup: "",
      idSurah: "",
      idFasil: ""
    },
    grupSelected: {}
  },

  mounted: function(){
    this.getFasil()
    this.getGrup()
    this.getSurah()
  },

  methods: {
    getFasil: function(){
      axios.get(url+"readFasil")
       .then(function(response){
         app.arrFasil = response.data.fasils
        //  console.log('>>>>>>>>>>>>> admin',app.arrFasils)
       })
       .catch(function(error){
        //  console.log('============',error)
       })
    },

    getGrup: function(){
      axios.get(url+"readGrup")
       .then(function(response){
         app.arrGrup = response.data.groups
        //  console.log('>>>>>>>>>>>>>')
       })
       .catch(function(error){
        //  console.log('============',error)
       })
    },

    getSurah: function(){
      axios.get(url+"readSurah")
       .then(function(response){
         app.arrSurah = response.data.surah
        //  console.log('>>>>>>>>>>>>>')
       })
       .catch(function(error){
        //  console.log('============',error)
       })
    },

    validasiForm: function () {
      let cekWA = this.newFasil.nomorWA.match(/[^0-9]/g)
      if (this.newFasil.nama === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'nama wajib diisi'
        })
        return false
      } else if (this.newFasil.nomorWA.length < 10) {
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
      } else {
        return true
      }
    },

    toFormdata: function(obj){
      var form_data = new FormData()
      for(var key in obj){
        form_data.append(key, obj[key])
      }
      return form_data;
    },

    simpanFasil: function(){
      let cek = this.validasiForm()
      if(cek){
        var formData = this.toFormdata(this.newFasil)
        axios.post(url+"simpanFasil", formData)
          .then(function(response){
            swal('Fasil', 'Data Fasil berhasil diinput', 'success')
            // console.log(">>>>>>>>>>>>>",response)
          })
          .catch(function(error){
            swall({
              icon: 'error',
              title: 'Oops...',
              text: 'input failed...'
            })
            // console.log("=============",error)
          })
      }
    },

    getFasilSelected: function(objFasil){
      this.fasilSelected = objFasil
    },

    ubahFasil: function(){
      var formData = this.toFormdata(this.fasilSelected)
      // console.log('>>>>>>>>>>>>>>>',formData)
      axios.post(url+"ubahFasil", formData)
        .then(function(response){
          swal('Fasil', 'Data Fasil Berhasil diperbaharui', 'success')
          // console.log(response)
        })
        .catch(function(error){
          swall({
            icon: 'error',
            title: 'Oops...',
            text: 'Proses update gagal...'
          })
        })
    },

    validasiFormGrup: function () {
      if (this.newGrup.nomorGrup === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Nomor Grup wajib diisi'
        })
        return false
      } else if (this.newGrup.idSurah === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Surah wajib diisi'
        })
        return false
      } else if (this.newGrup.idFasil === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Fasil wajib diisi'
        })
        return false
      } else {
        return true
      }
    },

    simpanGrup: function(){
      let cek = this.validasiFormGrup()
      if(cek){
        // swal('test dulu coy.....')
        var formData = this.toFormdata(this.newGrup)
        axios.post(url+"simpanGrup", formData)
          .then(function(response){
            swal('Grup', 'Data Grup berhasil diinput', 'success')
            // console.log(">>>>>>>>>>>>>",response)
          })
          .catch(function(error){
            swall({
              icon: 'error',
              title: 'Oops...',
              text: 'input failed...'
            })
            // console.log("=============",error)
          })
      }
    },

    getGrupSelected: function(objGrup){
      this.grupSelected = objGrup
    },
  }

})
