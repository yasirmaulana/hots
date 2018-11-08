// var url = "https://kauny.com/hots/hotspusat/model_hotspusat.php?action="
var url = "http://localhost:8080/hots/hotspusat/model_hotspusat.php?action="

var app = new Vue({
  el: "#root",

  data: {
    arrFasil: [],
    arrGrup: [],
    newFasil: {
      nama: "",
      nomorWA: "",
      nomorWA2: "",
    },
    fasilSelected: {}
  },

  mounted: function(){
    this.getFasil()
    this.getGrup()
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
    }


  }

})
