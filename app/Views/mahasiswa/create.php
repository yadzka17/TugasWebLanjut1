<?= $this->extend('template')?>
<?= $this->section('content')?>

<form class="mx-5" action="/mahasiswa/store" method="post">
  <div class="form-group">
    <label for="npm">NPM</label>
    <input type="text"  name="npm" class="form-control" id="npm" name="npm">
    
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" name="nama" class="form-control" id="nama" name="nama">
  </div>
  <div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"></textarea>
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?= $this->endSection()?>