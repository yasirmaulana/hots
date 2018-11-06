// var url = "http://hots.kauny.com/hotspusat/model_hotspusat.php?action="
var url = "http://localhost:8080/hots/hotspusat/model_hotspusat.php?action="

var app = new Vue({
  el: "#root",

  data: {
    arrFasil: [],
    arrGrup: [],
    // newReport: {
    //   id_admin: '',
    //   id_grup: '',
    //   memberAktiv: '',
    //   memberPasif: '',
    //   statusGrup: ''
    // },
    // arrStatus: [
    //   {val: 'J', tag: 'Jalan'},
    //   {val: 'P', tag: 'Pasif'},
    //   {val: 'M', tag: 'Merger'}
    // ]
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
      // let formData = new FormData()
      // formData.append('id_admin', this.newReport.id_admin)

      axios.post(url+"readGrup")
       .then(response => {
         this.arrGrup = response.data.groups
        //  console.log('>>>>>>>>>>>>>')
       })
       .catch(error => {
        //  console.log('============',error)
       })
    },

    validasiForm: function () {
      if (this.newReport.id_admin === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Admin wajib diisi'
        })
        return false
      } else if (this.newReport.id_grup === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Grup wajib diisi'
        })
        return false
      } else if (this.newReport.memberAktiv === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Member Aktif wajib diisi'
        })
        return false
      } else if (this.newReport.memberPasif === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Member Pasif wajib diisi'
        })
        return false
      } else if (this.newReport.statusGrup === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Status Grup wajib diisi'
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

    saveLaporan: function(){
      let cek = this.validasiForm()
      if(cek){
        var formData = this.toFormdata(this.newReport)
        axios.post(url+"simpanLaporan", formData)
          .then(function(response){
            swal('Laporan Grup Hots', 'Laporan berhasil diinput', 'success')
            // console.log(response)
          })
          .catch(function(error){
            swall({
              icon: 'error',
              title: 'Oops...',
              text: 'input failed...'
            })
          })
      }
    }


  }

})
