<div class="form-group">
  <label for="name">Nama Event</label>
  <input type="text" name="name" value="{{ old('name') ?? $detail->name }}" class="form-control mb-2" id="name" autocomplete="off" required placeholder="contoh : Olimpiade Sains Tingkat SMA Surabaya" autofocus>
  @error('name')
      <div class="text-danger">
        {{ $message }}
      </div>
  @enderror
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="logo">Logo</label>
      <input type="file" name="logo" class="form-control-file mb-2" id="logo">
      @error('logo')
          <div class="text-danger">
            {{ $message }}
          </div>
      @enderror
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="organizer">Penyelenggara</label>
      <input type="text" name="organizer" value="{{ old('organizer') ?? $detail->organizer }}" class="form-control mb-2" id="organizer" placeholder="contoh : Universitas Negeri Surabaya" autocomplete="off">
      @error('organizer')
          <div class="text-danger">
            {{ $message }}
          </div>
      @enderror
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">

    <div class="form-group">
      <label for="date">Tanggal</label>
      <input type="date" required name="date" value="{{ old('date') ?? $detail->date }}" class="form-control mb-2" id="date" autocomplete="off">
      @error('date')
          <div class="text-danger">
            {{ $message }}
          </div>
      @enderror
    </div>

  </div>
  <div class="col-md-6">

    <div class="form-group">
      <label for="time">Waktu</label>
      <input type="time" name="time" value="{{ old('time') ?? $detail->time }}" class="form-control mb-2" id="time" autocomplete="off">
      @error('time')
          <div class="text-danger">
            {{ $message }}
          </div>
      @enderror
    </div>

  </div>
</div>

<div class="form-group">
  <label for="location">Lokasi</label>
  <input type="text" name="location" required value="{{ old('location') ?? $detail->location }}" class="form-control mb-2" id="location" autocomplete="off" placeholder="contoh : Gedung FMIPA Universitas Negeri Surabaya">
  @error('location')
      <div class="text-danger">
        {{ $message }}
      </div>
  @enderror
</div>

<h4 class="mt-5"> Data Peserta</h4>

<div class="form-group">
  <label for="quantity">Jumlah Peserta</label>
  <input type="number" required name="quantity" value="{{ old('quantity') ?? $detail->quantity }}" class="form-control mb-2" id="quantity" autocomplete="off">
  @error('quantity')
      <div class="text-danger">
        {{ $message }}
      </div>
  @enderror
</div>

<div class="form-group">
  <label>Detail Nama Peserta</label>
  <small class="text-danger">(Pilih satu metode)</small>
  <div class="row">

    <div class="col-md-6">
      <small><label class="text-secondary" for="participant_manual">Manual</label></small>
      <textarea name="participant_manual" id="participant_manual" class="form-control mb-2" cols="30" rows="6" placeholder="{!! $participant !!}">{{ old('participant_manual') ?? $detail->participant_manual }}</textarea>
      @error('participant_manual')
        <div class="text-danger">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="col-md-6">
      <small><label class="text-secondary" for="participant_auto">File (.xls)</label></small>
      <input type="file" name="participant_auto" id="participant-auto">
      @error('participant_auto')
        <div class="text-danger mt-1">
          wajib file dengan ekstensi .xls
        </div>
      @enderror
    </div>

  </div>
</div>

<div class="form-group mt-5">
  <label for="name">Catatan untuk kami</label>
  <textarea name="notes" id="notes" class="form-control" cols="30" rows="3">{{ old('name') ?? $detail->notes }}</textarea>
  @error('name')
      <div class="text-danger">
        {{ $message }}
      </div>
  @enderror
</div>

<div class="form-group">
  <label for="format">Format file</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="format" id="format1" value="pdf" checked>
    <label class="form-check-label" for="format1">PDF</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="format" id="format2" value="jpg">
    <label class="form-check-label" for="format2">JPG</label>
  </div>
  @error('format')
      <div class="text-danger">
        {{ $message }}
      </div>
  @enderror
</div>

<div class="form-group">
  <label for="destination">Pengiriman Soft File</label>
  <input type="text" class="form-control" required name="destination" id="destination" value="{{ old('destination') ?? $detail->destination }}" placeholder="contoh : dimasatria10@gmail.com">
  @error('destination')
      <div class="text-danger">
        {{ $message }}
      </div>
  @enderror
</div>

<button type="submit" class="btn btn-primary">Simpan</button>