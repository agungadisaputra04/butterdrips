<div class="row">
    <div class="col-md-6">
        <input type="hidden" value="{{ $jabatan->id }}" id="id_data" name="id">
        <div class="form-group">
            <label>Nama Jabatan</label>
            <input type="text" name="nama_jabatan" value="{{ $jabatan->nama_jabatan }}"  class="form-control">
           </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label>Gaji Pokok</label>
            <input type="text" name="gaji_pokok" value="{{ $jabatan->gaji_pokok }}" class="form-control">
            
           </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label>Uang Lembur</label>
            <input type="text" name="lembur" value="{{ $jabatan->lembur }}" class="form-control">
            
           </div>
        </div>
    </div>