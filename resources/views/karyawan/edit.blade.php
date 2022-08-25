 <div class="row">
    <div class="col-md-6">
         <input type="hidden" value="{{ $karyawans->id }}" id="id_data" name="id">
        <div class="form-group">
            <label>Jabatan</label>
            <select name="jabatan_id"  class="form-control">
                @foreach ($jabatan_id as $kr)
                        <option value="{{ $kr->id }}">{{ $kr->nama_jabatan}}</option>
                    @endforeach
        </select>
        </div>
        </div>

    </div>

